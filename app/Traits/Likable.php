<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Auth;

trait Likable
{

    public function like(?User $user = null)
    {
        $user = $user ?: Auth::user();
        return $this->likes()->attach($user);
    }

    public function likes(): MorphToMany
    {
        return $this->morphToMany(User::class, 'likable')->withTimestamps();
    }
}
