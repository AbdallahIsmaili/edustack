<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject_id',
        'title',
        'body',
        'url',
        'views',
        'votes',
        'solved',
        'tags', // Add this line
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


}
