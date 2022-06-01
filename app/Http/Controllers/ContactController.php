<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use PhpParser\Node\Expr\AssignOp\Concat;

class ContactController extends Controller {
    
    public function submit(ContactRequest $req) {

        $contact = New Contact();
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('name');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('home')->with('success', 'Сообщение было добавлено');
    }
}