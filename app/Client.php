<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = ['id'];
    
    protected $fillable = [
    	'nom',
    	'prenom',
    ];
    
    public $timestamps = false;
    
    public function materiels()
    {
        return $this->belongsToMany(Materiel::class);
    }

}