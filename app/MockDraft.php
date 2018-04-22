<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MockDraft extends Model
{
    protected $fillable = ['user_id', 'year', 'name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function selections()
    {
    	return $this->hasMany(MockDraftSelection::class);
    }
}
