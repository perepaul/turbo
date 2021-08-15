<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::find(1);
        return view('admin.settings.contact', compact('contact'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $valid = $request->validate([
            'notification_email' => 'required|email',
            'support_email' => 'required|email',
            'phone' => 'required',
            'address' => 'required|string',
        ]);

        $contact = Contact::find(1);
        if(is_null($contact))
        {
            Contact::create($valid);
        }else{
            $contact->update($valid);
        }
        session()->flash('Updated contact details');
        return redirect()->route('admin.settings.contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
