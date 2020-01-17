<?php

namespace laravel\contacts\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use laravel\contacts\Entities\Contact;
use laravel\contacts\Events\ContactSubmitted;

class LaravelContactsController extends Controller {

    public function __construct()
    {

        $this->rules = !empty(config('laravel-contacts.submit.rules')) ? config('laravel-contacts.submit.rules') : [
            'name' => 'required|max:200',
            'surname' => 'required|max:200',
            'email' => 'required|email',
            'msg' => 'required|max:1000',
        ];

//        $this->authorizeResource(Contact::class);
    }

    /**
     * Manage the contact form post submission.
     *
     * @return array
     */
    public function submit(Request $request)
    {
        $this->validate(
            $request,
            $this->rules,
            config('laravel-contacts.submit.messages') ?? []
        );

        $contact = Contact::create([
            'name' => !empty($request->name) ? $request->name : '',
            'surname' => !empty($request->surname) ? $request->surname : '',
            'email' => !empty($request->email) ? $request->email : '',
            'tel' => !empty($request->tel) ? $request->tel : '',
            'msg' => $request->msg
        ]);

        if( !empty($contact) ) {
            event( new ContactSubmitted($contact) );
        }

        return $request->ajax() ? [ 'success' => !empty($contact) ] : redirect()->back()->with('status', 'Η επικοινωνία σου έχει αποσταλεί! ');
    }

    public function processed(Request $request, Contact $contact) {
        return response([
            'status' => $contact->update([
                'processed' => 1
            ])
        ]);
    }

}
