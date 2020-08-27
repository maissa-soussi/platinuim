<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'nom', 'num_permis', 'cin', 'email', 'phone_nb', 'adresse', 'date_nais', 'status',
    ];
}
