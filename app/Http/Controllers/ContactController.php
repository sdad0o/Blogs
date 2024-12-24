<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(storeContactRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();
        Contact::create($data);
        return back()->with('status-message', 'Your message sent Successfully');
    }
}
