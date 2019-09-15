<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['iso','name','nicename','iso3','numcode','phonecode'];

    public function users()
    {
    	return $this->belongsTo(User::class);
    }
}
