<?php

namespace App\Models;

use App\Traits\Likable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory, Likable;

    public function post(): BelongsTo
    {
        return $this->belongsTo(Comment::class);
    }
}
