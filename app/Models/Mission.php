<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'experience_reward'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_missions')->withPivot('completed_at');
    }
}
