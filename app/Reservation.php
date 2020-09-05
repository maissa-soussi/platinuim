<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{
    protected $fillable = [
        'cinclient', 'imma_v', 'date_deb', 'date_fin', 'montant', 'paiement', 'recuperation',
    ];
}
