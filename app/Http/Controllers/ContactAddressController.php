<?php

namespace App\Http\Controllers;

use App\ContactAddress;
use Illuminate\Http\Request;

class ContactAddressController extends Controller
{
    public function create($contact)
    {
        $contact_address = new ContactAddress;
        return view('contacts.address.create', compact('contact_address', 'contact'));
    }

    public function store(Request $request)
    {
        $contact_id = $request->contact_id;
        unset($request['_token']);
        unset($request['contact_id']);
        $address = $request->all();

        $contact_address = new ContactAddress();
        $contact_address->contact_id = $contact_id;
        $contact_address->address = $address;
        $contact_address->save();

        return redirect()->back()->with('alert', 'Contact address created!');
    }
}
