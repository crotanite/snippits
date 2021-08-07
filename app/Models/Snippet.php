<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Snippet extends Model
{
    use HasFactory;
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'tags' => 'array',
    ];

    public function getTaggingAttribute()
    {
        return collect($this->tags)->map(function($tag) {
            return Tag::where('tag', '=', $tag)->first();
        });
    }

    /**
     * Fetch the user who wrote this snippet.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
