<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MockDraft extends Model
{
    protected $fillable = ['user_id', 'draft_slot_id', 'player_id'];
}
