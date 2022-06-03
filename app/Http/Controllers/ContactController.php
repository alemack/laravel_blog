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
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('home')->with('success', 'Сообщение было добавлено');
    }

    public function allData() {
        # $contact = new Contact;
        # dd($contact->all());

        // ещё один вариант написаение аналогичного функционала
        # $contact = Contact::all();
        # dd($contact);
        // можно ещё сократить
        # dd(Contact::all());

        $contact = new Contact();
        // выводит запись с id=2
        # return view('messages', ['data'=>$contact->find(2)]);

        // выбирает случайным образом заданное количество записей,
        // в данном случае get() выводит все записи
        # return view('messages', ['data'=>$contact->inRandomOrder()->get()]);

        // возращает отсортированные по заданному параметру (id) по возрастанию (asc) или убыванию (desc), 
        // а также количество записей 2, потому что мы попросили (take) 2 записи
        # return view('messages', ['data'=>$contact->orderBy('id', 'desc')->take(2)->get()]);

        // возращает отсортированные по заданному параметру (id) по возрастанию (asc) или убыванию (desc), 
        // а пропускает первую запись
        # return view('messages', ['data'=>$contact->orderBy('id', 'desc')->skip(1)->get()]);

        // вернёт все записи, где email равно iki@wdw.com
        # return view('messages', ['data'=>$contact->where('email', '=', 'miki@wdw.com')->get()]);

        // вернёт все значения
        return view('messages', ['data'=>Contact::all()]);
    }

    public function showOneMessage($id) {
        $contact = new Contact();
        return view('one-message', ['data'=>$contact->find($id)]);
    }

    public function updateMessage($id) {
        $contact = new Contact();
        return view('update-message', ['data'=>$contact->find($id)]);
    }

    public function updateMessageSubmit($id, ContactRequest $req) {

        $contact = Contact::find($id);
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('contact-data-one', $id)->with('success', 'Сообщение было обновлено');
    }

    public function deleteMessage($id) {
        Contact::find($id)->delete();
        return redirect()->route('contact-data')->with('success', 'Сообщение было удалено');
    }
}