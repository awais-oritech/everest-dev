<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactUsController extends Controller
{
    public function index()
    {
        return view('site.home.contactus');
    }

    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return back()->with('status','Thank you! We have received your message and will get back to you as soon as possible');
    }
}
