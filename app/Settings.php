<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = ['province', 'district', 'sector', 'user_id', 'id_number', 'phone'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
