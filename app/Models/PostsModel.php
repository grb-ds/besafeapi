<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsModel extends Model
{
    use HasFactory;

    protected $table = "posts";
    
    protected $fillable = [
	    'id', 
        'userId', 
        'title', 
        'content', 
        'type', 
        'created_at', 
        'updated_at',  
    ];
    
}
