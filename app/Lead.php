<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $filllable = [
        'name_contacts',
        'lastname_contacts',
        'email_contact',
        'textarea_contacts'
    ];
}
