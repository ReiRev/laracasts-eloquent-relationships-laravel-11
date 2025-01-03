<?php

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return auth()::class;
});

Route::get('/', function () {
    // run php artisan migrate:fresh --seed to create a user
    $user = User::find(1);
    $post = $user->posts()->create([
        'title' => 'foo bar',
        'body' => 'lorem ipsum'
    ]);
    $tag = Tag::create([
        'name' => 'person'
    ]);
    $post->tags()->attach($tag);
    return view('welcome');
});
