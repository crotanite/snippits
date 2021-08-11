<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Language;
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

    /**
     * Fetch the language this snippet uses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lang(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Language::class, 'language', 'code');
    }

    /**
     * List the tags of this snippet as an array
     * seperated string.
     *
     * @return string
     */
    public function listTags(): string
    {
        return implode(',', $this->tags ?? []);
    }

    /**
     * Fetch all of the tags this snippet has.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getTaggingAttribute(): \Illuminate\Support\Collection
    {
        return collect($this->tags)->map(function($tag) {
            if($tagModel = Tag::where('tag', '=', $tag)->first()) {
                return $tagModel;
            }

            $tagModel = new Tag;
            $tagModel->tag = $tag;
            $tagModel->bg_color = '#aaaaaa';
            $tagModel->text_color = '#ffffff';

            return $tagModel;
        });
    }

    /**
     * Fetch the user this snippet belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
