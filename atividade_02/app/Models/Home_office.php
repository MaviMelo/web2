<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home_office extends Model
{
    protected $fillable = ['collaborator', 'address', 'date_of_birth', 'function', 'salary'];
}


/*
            $table-> string('collaborator', 150);
            $table-> string('address', 300);
            $table-> date('date_of_birth');
            $table-> text('function');
            $table-> double('salary');

*/