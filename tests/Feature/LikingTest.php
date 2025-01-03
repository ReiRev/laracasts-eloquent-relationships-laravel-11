<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\actingAs;


test('A post can be liked', function () {
    actingAs(User::factory()->create());
    $post = Post::factory()->create();

    $post->like();

    expect($post->likes)->toHaveCount(1);
    expect($post->likes->contains('id', Auth::user()->id))->toBeTrue();
});

test('A comment can be liked', function () {
    actingAs(User::factory()->create());
    $comment = Comment::factory()->create();

    $comment->like();

    expect($comment->likes)->toHaveCount(1);
    expect($comment->likes->contains('id', Auth::user()->id))->toBeTrue();
});
