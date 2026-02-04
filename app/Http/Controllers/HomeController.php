<?php

namespace App\Http\Controllers;

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
