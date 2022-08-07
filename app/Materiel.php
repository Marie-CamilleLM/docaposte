<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    protected $guarded = ['id'];
    
    protected $fillable = [
    	'nom',
    	'prix',
    ];
    
    public $timestamps = false;
    
    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }
}
