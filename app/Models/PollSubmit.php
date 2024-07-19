<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollSubmit extends Model
{
    use HasFactory;

    protected $fillable = ['poll_option_id', 'user_id'];
    
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    
    public function poll() 
    {
        return $this->belongsTo(PollOption::class);
    }
}
