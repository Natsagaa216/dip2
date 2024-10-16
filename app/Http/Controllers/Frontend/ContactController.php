<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    //
    public function index()
    {
        return view('frontend.contact-requests');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        if (Auth::id()) {
            $user = Auth::user();

            $validatedData = $request->validate([
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|email',
                'phone_number' => 'required|numeric|digits:8',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
            ]);


                ContactRequests::where('user_id', $user->id)->delete();
                return redirect()->route('index')->with('success','Check your order, the purchase is successful');

                $contacts = ContactRequests::create([
                    'user_id' => $user->id,
                    'firstname' => $validatedData['firstname'],
                    'lastname' => $validatedData['lastname'],
                    'email' => $validatedData['email'],
                    'phone_number' => $validatedData['phone_number'],
                    'title' => $validatedData['title'],
                    'description' => $validatedData['description'],
                ]);


                foreach ($user->contacts as $contact) {
                    ContactRequests::create([
                        'user_id' => $user->id,
                        'firstname' => $contact->firstname,
                        'lastname' => $contact->lastname,
                        'email' => $contact->email,
                        'phone_number' => $contact->phone_number,
                        'title' => $contact->title,
                        'description' => $contact->description,
                    ]);
                }

                ContactRequests::where('user_id', $user->id)->delete();

                return redirect()->route('index')->with('success','Check your order, the purchase is successful');

    }
}

}
