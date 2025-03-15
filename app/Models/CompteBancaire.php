<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompteBancaire extends Model
{
    protected $fillable = ['user_id', 'account_number', 'balance'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
