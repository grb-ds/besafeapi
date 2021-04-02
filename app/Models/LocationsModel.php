<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationsModel extends Model
{
    use HasFactory;

    protected $table = "locations";
	public $timestamps = false;
    
    protected $fillable = [
	    'id', 
        'city', 
        'state', 
        'zipcode', 
        'country', 
        'latitude', 
        'longitude', 
        'created_at',
        'created_at', 
    ];
}
