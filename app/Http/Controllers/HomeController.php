<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function submitContact()
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        Mail::to('info@atroksservices.com')->send(new ContactForm($validated));

        return redirect()->route('contact')->with('success', 'Thank you for your message! We will get back to you shortly.');
    }

    public function projects()
    {
        return view('frontend.projects');
    }

    public function faqs()
    {
        return view('frontend.faqs');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function quote()
    {
        return view('frontend.quote');
    }

    public function services()
    {
        return view('frontend.services');
    }

    public function comingSoon()
    {
        return view('frontend.coming-soon');
    }
}
