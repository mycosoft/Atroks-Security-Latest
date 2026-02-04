<?php

namespace App\Http\Controllers;

use App\Models\SafeKeepingRecord;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SafeKeepingController extends Controller
{
    public function index()
    {
        $records = SafeKeepingRecord::with('client')->latest()->get();

        return view('safe_keeping.index', compact('records'));
    }

    public function create()
    {
        $clients = \App\Models\Client::orderBy('name')->get();

        return view('safe_keeping.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'shipper_name' => 'nullable|string|max:255',
            'item_description' => 'required|string',
            'weight' => 'required|string',
            'stored_at' => 'required|date',
        ]);

        $record = SafeKeepingRecord::create($validated);

        return redirect()->route('safe-keeping.show', $record->id)->with('success', 'Record created successfully!');
    }

    public function show(SafeKeepingRecord $record)
    {
        $record->load('client');

        // Generate QR Code content
        $clientName = $record->client ? $record->client->name : 'No Client';
        $qrContent = 'Ref: '.$record->reference_number."\nClient: ".$clientName."\nItem: ".$record->item_description;

        $qrCode = QrCode::size(100)->generate($qrContent);

        return view('safe_keeping.show', compact('record', 'qrCode'));
    }

    public function edit(SafeKeepingRecord $record)
    {
        $clients = \App\Models\Client::orderBy('name')->get();

        return view('safe_keeping.edit', compact('record', 'clients'));
    }

    public function update(Request $request, SafeKeepingRecord $record)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'shipper_name' => 'nullable|string|max:255',
            'item_description' => 'required|string',
            'weight' => 'required|string',
            'stored_at' => 'required|date',
        ]);

        $record->update($validated);

        return redirect()->route('safe-keeping.index')->with('success', 'Record updated successfully!');
    }

    public function destroy(SafeKeepingRecord $record)
    {
        try {
            $record->delete();
            return redirect()->route('safe-keeping.index')->with('success', 'Record deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('safe-keeping.index')->with('error', 'Failed to delete record. Please try again.');
        }
    }

    public function sendEmail(Request $request, SafeKeepingRecord $record)
    {
        $validated = $request->validate([
            'email' => 'required|email',
        ]);

        try {
            \Mail::to($validated['email'])->send(new \App\Mail\SafeKeepingReceipt($record));
            
            return back()->with('success', 'Receipt sent successfully to ' . $validated['email']);
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send email. Please check your email settings. Error: ' . $e->getMessage());
        }
    }

    public function addStatus(Request $request, SafeKeepingRecord $record)
    {
        $validated = $request->validate([
            'status' => 'required|string|max:255',
            'description' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        try {
            $record->statusUpdates()->create([
                'status' => $validated['status'],
                'description' => $validated['description'] ?? null,
                'notes' => $validated['notes'] ?? null,
                'updated_by' => auth()->id(),
            ]);

            // Update the main record status
            $record->update(['status' => $validated['status']]);

            return back()->with('success', 'Status updated successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update status. Please try again.');
        }
    }
}
