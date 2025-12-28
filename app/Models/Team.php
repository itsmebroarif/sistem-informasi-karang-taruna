<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name'];

    public function members()
    {
        return $this->belongsToMany(Member::class, 'team_members')
                    ->withPivot('id', 'position') // wajib ada pivot->id
                    ->withTimestamps()
                    ->orderBy('pivot_position');
    }
}
