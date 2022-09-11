<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function index()
    {
        $contacts = Contact::get();
        return view('index', compact('contacts'));
    }

    public function contact($contact_id)
    {
        $contact = Contact::where('id', $contact_id)->first();
        return view('contact', compact('contact'));
    }

    public function contactAdd(ContactRequest $request)
    {
        if(!is_null($request->photo))
        {
            $path = $request->file('photo')->store('contacts');
            $params = $request->all();
            $params['photo'] = $path;
        }
        else{
            $params = $request->all();
        }
        Contact::create($params);
        return redirect()->route('index');
    }

    public function contactEdit($contact_id)
    {
        $contact = Contact::where('id', $contact_id)->first();
        return view('form', compact('contact'));
    }

    public function contactUpdate(Request $request, $contact_id)
    {
        $contact = Contact::where('id', $contact_id)->first();
        $params = $request->all();
        if(!is_null($request->photo)){
            if(!is_null($contact->photo))
                Storage::delete($contact->photo);
            $path = $request->file('photo')->store('contacts');
            $params['photo'] = $path;
        }
        else{
            $params['photo']=Contact::where('id', $contact->id)->first()->photo;
        }
        if(is_null($request->name))
            $params['name'] = Contact::where('id', $contact->id)->first()->name;
        if(is_null($request->phone))
            $params['phone'] = Contact::where('id', $contact->id)->first()->phone;
        if(is_null($request->email))
            $params['email'] = Contact::where('id', $contact->id)->first()->email;
        $contact->update($params);

        return redirect()->route('index');
    }

    public function contactRemove($contactId)
    {
        $contact = Contact::find($contactId);
        if(!is_null($contact->photo))
            Storage::delete($contact->photo);
        $contact->delete();
        return redirect()->route('index');
    }
}
