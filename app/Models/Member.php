<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name',
        'role',
        'phone_number',
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_members')
            ->withPivot('position')
            ->withTimestamps();
    }
}
