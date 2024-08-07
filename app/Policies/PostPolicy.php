<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    public function edit(User $user, Post $post): bool
    {
        return $post->user->is($user);
    }
}
