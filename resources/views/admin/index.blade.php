@extends('mma::layouts.main')

@section('content')

    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul><li><a href="/admin">Dashboard</a></li><li><a href="#">Site Contacts</a></li></ul>
    </nav>

    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-item">
            <form action="" method="get">
                <div class="field">
                    <div class="control">
                        <input name="q" class="input" type="text" placeholder="Αναζήτηση" value="{{ $q }}">
                    </div>
                </div>
            </form>
        </div>
    </nav>


    @foreach($contacts as $contact)
        <contact-item
                id="{{ $contact->id }}"
                name="{{ $contact->name }}"
                surname="{{ $contact->surname }}"
                email="{{ $contact->email }}"
                created_at="{{ $contact->created_at }}"
                msg="{{ $contact->msg }}"
                processed="{!! $contact->processed === 1 ? true : false !!}"
        ></contact-item>
    @endforeach

    {{ $contacts->links('mma::partials.pagination') }}

@endsection

@section('js')

@stop