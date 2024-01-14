<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Contact;
use App\Models\Appointment;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::get();
        return view("index", compact('testimonials'));
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
        $testimonials = Testimonial::get();
        return view("classes", compact('testimonials'));
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
        $testimonials = Testimonial::get();
        return view("testimonial", compact('testimonials'));
    }

    public function contactForm(Request $request)
    {
        $messages=$this->messages();
        $data = $request->validate([
            'name'=>'required|string|max:50',
            'email'=>'required|email',
            'subject' => 'required|string|max:100',
            'message' => 'required|string',
        ], $messages);
        Contact::create($data);
        Mail::to('eng_peter_elias@gmail.com')->send(new ContactMail($data));
        return back()->with('success','Email sent sucssefully');
    }

    public function appointmentForm(Request $request)
    {
        $messages=$this->messages();
        $data = $request->validate([
            'guardianName'=>'required|string|max:50',
            'guardianEmail'=>'required|email',
            'childName' => 'required|string|max:50',
            'childAge' => 'required|integer',
            'message' => 'required|string',
        ], $messages);
        Appointment::create($data);
        return back()->with('success','Appointment sat sucssefully');
    }

    public function messages()
    {
        return [
            'image.mimes'=>'Incorrect image type',
            'image.max'=>'Max file size exeeced',
        ];
    }
}
