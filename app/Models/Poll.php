<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    protected $fillable = ['topic', 'multi_select', 'info_id', 'user_id'];

    public function options() {
        return $this->hasMany(PollOption::class)->with("submits");
    }
}
