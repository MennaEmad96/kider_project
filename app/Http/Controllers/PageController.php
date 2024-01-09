<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view("index");
    }

    // public function error()
    // {
    //     return view("404");
    // }
    public function __invoke()
    {
        return view('404');
    }

    public function about()
    {
        return view("about");
    }
    public function appointment()
    {
        return view("appointment");
    }
    public function callToAction()
    {
        return view("call-to-action");
    }
    public function classes()
    {
        return view("classes");
    }
    public function contact()
    {
        return view("contact");
    }
    public function facility()
    {
        return view("facility");
    }
    public function team()
    {
        return view("team");
    }
    public function testimonial()
    {
        return view("testimonial");
    }
}
