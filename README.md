# A Laravel 11 implementation of Eloquent Relationships

This repo shows a Laravel 11 implementation of the [Eloquent Relationships course](https://laracasts.com/series/eloquent-relationships) from [Laracasts](https://laracasts.com/).
I highly recommend watching the original videos and using this repository as a supplementary resource.

Each video is divided into branches, so it would be convenient to check them branch by branch.

The following sections will summarize the differences between original video and Laravel 11 implementation.

## One to One

[branch](https://github.com/ReiRev/laracasts-eloquent-relationships-laravel-11/tree/01-one-to-one)

- You can use `$table->foreignIdFor(User::class)` to specify foreign id key in [migration table](database/migrations/2025_01_03_013940_create_profiles_table.php), which is very useful.

## One to Many

[branch](https://github.com/ReiRev/laracasts-eloquent-relationships-laravel-11/tree/02-one-to-many)

- Use `User::factory()->create()` instead of `factory(User::class)->create()`.
- Use `fake()->sentence` instead of `$faker->sentence`. See [PostFactory](database/factories/PostFactory.php).
- You can use `'user_id' => User::factory()` instead of `'user_id'=>function(){...}`. See [PostFactory](database/factories/PostFactory.php).

## Many to Many

[branch](https://github.com/ReiRev/laracasts-eloquent-relationships-laravel-11/tree/03-many-to-many)

- Use `$table->foreignIdFor(Post::class)->constrained()->cascadeOnDelete();` instead of `$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade')`. See [create_post_tag_table](database/migrations/2025_01_03_041312_create_post_tag_table.php).

## Has Many Through

[branch](https://github.com/ReiRev/laracasts-eloquent-relationships-laravel-11/tree/04-has-many-through)

- This is outside the scope of this course, but I wrote [DatabaseSeeder](database/seeders/DatabaseSeeder.php). This would save your time. You can seed the database with `php artisan migrate:fresh --seed`.

## Polymorphic Relations

[branch](https://github.com/ReiRev/laracasts-eloquent-relationships-laravel-11/tree/05-polymorphic-relations)

- In the video, `watchable_type` was like `App\Series`, but in Laravel 11 it is like `App\Models\Series`
- Again, I created [DatabaseSeeder](database/seeders/DatabaseSeeder.php).
- Note: You can create a new relation between a video and a collection like `$video->parent()->associate($collection)->save()`.
- Note: You can create a new video with the following code.

```php
$video = new Video([
    'title' => 'foo',
    'description' => 'bar',
    'url' => 'https://reirev.net/images/favicon-32x32.png'
]);
$collection = Collection::first();
$video->parent()->associate($collection);
$video->save();
```

## Many to Many Polymorphic Relations

[branch](https://github.com/ReiRev/laracasts-eloquent-relationships-laravel-11/tree/06-many-to-many-polymorphic-relations)

- `auth()->user()` still works in Laravel 11, but in my development environment it shows an error from intelephense. You can use `Illuminate\Support\Facades\Auth::user()` instead of it.
- In Laravel 11, Model files are in `app\Models` instead of `app`, so I change the path of the [Likable trait](app/Traits/Likable.php) to `app\Traits`.
