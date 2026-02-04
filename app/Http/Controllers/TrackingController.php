<?php

namespace App\Http\Controllers;

use App\Models\SafeKeepingRecord;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
        return view('tracking.index');
    }

    public function track(Request $request)
    {
        $request->validate([
            'reference_number' => 'required|string',
        ]);

        $record = SafeKeepingRecord::with(['client', 'statusUpdates.updatedByUser'])
            ->where('reference_number', $request->reference_number)
            ->first();

        if (! $record) {
            return back()->with('error', 'No record found with that Reference Number.');
        }

        return view('tracking.result', compact('record'));
    }

    public function adminIndex()
    {
        return view('tracking.admin_index');
    }

    public function adminTrack(Request $request)
    {
        $request->validate([
            'reference_number' => 'required|string',
        ]);

        $record = SafeKeepingRecord::where('reference_number', $request->reference_number)->first();

        if (! $record) {
            return back()->with('error', 'No record found with that Reference Number.');
        }

        return view('tracking.admin_result', compact('record'));
    }
}
