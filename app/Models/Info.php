<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'state_react', 'state_com', 'user_id'];

    public function reactions() 
    {
        return $this->hasMany(Reaction::class)->with("user");
    }

    public function comments() 
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc')->with("user");
    }
    
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function poll() {
        return $this->hasOne(Poll::class)->with("options");
    }
}
