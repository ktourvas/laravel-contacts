<?php

namespace laravel\contacts\Entities;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'lc_contacts';
    protected $fillable = [ 'name', 'surname', 'email', 'tel', 'msg', 'opt', 'processed' ];
}