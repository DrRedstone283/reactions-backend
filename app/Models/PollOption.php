<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollOption extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'poll_id'];

    public function submits() {
        return $this->hasMany(PollSubmit::class)->with("user");
    }
}
