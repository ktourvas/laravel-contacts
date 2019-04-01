<?php

namespace laravel\contacts;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable = [ 'name', 'surname', 'email', 'tel', 'msg', 'opt', 'processed' ];

}