<?php

namespace laravel\contacts\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use laravel\contacts\Entities\Contact;


class LaravelContactsAdminController extends Controller {

    public function __construct(){}

    public function index(Request $request)
    {

        return view('lc::admin.index', [

            'q' => $request->q,

            'contacts' => Contact::where(function($q) use ($request) {
                if(!empty($request->q)) {
                    $q->where('name', 'LIKE', '%'.$request->q.'%')
                        ->orWhere('surname', 'LIKE', '%'.$request->q.'%')
                        ->orWhere('email', 'LIKE', '%'.$request->q.'%')
                        ->orWhere('tel', 'LIKE', '%'.$request->q.'%')
                    ;
                }
            })

                ->orderBy('processed', 'ASC')

                ->orderBy('created_at', 'ASC')

                ->paginate(15)
        ]);

    }

    public function processed(Request $request, Contact $contact) {
        return response([
            'status' => $contact->update([
                'processed' => 1
            ])
        ]);
    }

    public function delete(Request $request, Contact $contact) {
        return response([
            'status' => $contact->delete()
        ]);
    }

}
