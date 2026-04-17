<?php

namespace App\Models;

use App\Enums\ForumStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Dom\Attr;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'forum_id',
        'user_id',
        'body',
    ];

    public function forum(): BelongsTo
    {
        return $this->belongsTo(Forum::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
