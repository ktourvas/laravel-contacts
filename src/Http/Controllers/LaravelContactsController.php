<?php

namespace laravel\contacts\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use laravel\contacts\Contact;

class LaravelContactsController extends Controller {

    public function __construct()
    {
        $this->rules = !empty(config('laravel-contacts.submit.rules')) ? config('laravel-contacts.submit.rules') : [
            'name' => 'required|max:200',
            'surname' => 'required|max:200',
            'email' => 'required|email',
            'msg' => 'required|max:1000',
        ];
    }

    /**
     * Manage the contact form post submission.
     *
     * @return void
     */
    public function submit(Request $request)
    {
        $this->validate(
            $request,
            $this->rules,
            config('laravel-contacts.submit.messages')
        );

        $contact = Contact::create([
            'name' => !empty($request->name) ? $request->name : '',
            'surname' => !empty($request->surname) ? $request->surname : '',
            'email' => !empty($request->email) ? $request->email : '',
            'tel' => !empty($request->tel) ? $request->tel : '',
            'msg' => $request->msg
        ]);

        return [ 'success' => !empty($contact) ];
    }

    public function processed(Request $request, Contact $contact) {
        return response([
            'status' => $contact->update([
                'processed' => 1
            ])
        ]);
    }

}
