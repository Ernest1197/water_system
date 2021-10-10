<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'previous_reading', 'present_reading', 'consumption','price','bill_amount','client_id'
    ];

    public function client() {
        return $this->belongsTo('App\User', 'client_id');
    }
}
 