<?php

namespace laravel\contacts\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use laravel\contacts\Contact;

class LaravelContactsController extends Controller {

    /**
     * Manage the contact form post submission.
     *
     * @return void
     */
    public function submit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'surname' => 'required|max:200',
            'email' => 'required|email',
            'msg' => 'required|max:1000',
            'opt' => 'required|accepted',
        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'tel' => $request->tel,
            'msg' => $request->msg,
            'opt' => $request->opt == 'on' ? 1 : 0,
        ]);

        return [ 'success' => true ];
    }

}