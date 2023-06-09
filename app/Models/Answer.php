<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'question_id',
        'body',
        'url',
        'up_votes',
        'down_votes',
        'accepted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function upvotes()
    {
        return $this->hasMany(Upvote::class);
    }

    public function downvotes()
    {
        return $this->hasMany(Downvote::class);
    }


}
