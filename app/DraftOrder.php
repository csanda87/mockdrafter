<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DraftOrder extends Model
{
    protected $fillable = ['year','round','pick','team_id','notes'];

    public function team()
    {
    	return $this->hasOne(Team::class, 'id', 'team_id');
    }
}
