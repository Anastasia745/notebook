<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::get();
        return view('index', compact('contacts'));
    }
}
