<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['compte_bancaire_id', 'type', 'amount', 'description'];

    public function compteBancaire()
    {
        return $this->belongsTo(CompteBancaire::class);
    }
}
