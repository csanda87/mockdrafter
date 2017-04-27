<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MockDraft extends Model
{
    protected $fillable = ['user_id', 'draft_slot_id', 'player_id'];

    public function player()
    {
    	return $this->belongsTo(Player::class);
    }

    public function draftSlot()
    {
    	return $this->belongsTo(DraftSlot::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
