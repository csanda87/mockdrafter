<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MockDraftSelection extends Model
{
    protected $fillable = ['mock_draft_id', 'draft_slot_id', 'player_id'];

    public function player()
    {
    	return $this->belongsTo(Player::class);
    }

    public function draftSlot()
    {
    	return $this->belongsTo(DraftSlot::class);
    }

    public function mockDraft()
    {
    	return $this->belongsTo(MockDraft::class);
    }
}
