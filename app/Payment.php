<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'description', 'amount', 'method', 'bill_id', 'client_id'
    ];

    public function bill()
    {
        return $this->belongsTo('App\Bill', 'bill_id');
    }

    public function client()
    {
        return $this->belongsTo('App\User', 'client_id');
    }
}
