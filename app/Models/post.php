<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description','user_id'];//thw second method to store data need this line
    public function user(){//this function use to connect between to files user and post
        return $this->belongsTo(related:user::class);
    }
}
