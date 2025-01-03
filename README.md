# A Laravel 11 implementation of Eloquent Relationships

This repo shows a Laravel 11 implementation of the [Eloquent Relationships course](https://laracasts.com/series/eloquent-relationships) from [Laracasts](https://laracasts.com/).
I highly recommend watching the original videos and using this repository as a supplementary resource.

The following sections will summarize the differences between original video and Laravel 11 implementation.

## One to One

- You can use `$table->foreignIdFor(User::class)` to specify foreign id key in [migration table](database/migrations/2025_01_03_013940_create_profiles_table.php), which is very useful.

## One to Many

- Use `User::factory()->create()` instead of `factory(User::class)->create()`.
- Use `fake()->sentence` instead of `$faker->sentence`. See [PostFactory](database/factories/PostFactory.php).
- You can use `'user_id' => User::factory()` instead of `'user_id'=>function(){...}`. See [PostFactory](database/factories/PostFactory.php).

## Many to Many

- Use `$table->foreignIdFor(Post::class)->constrained()->cascadeOnDelete();` instead of `$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade')`. See [create_post_tag_table](database/migrations/2025_01_03_041312_create_post_tag_table.php).

## Has Many Through

- This is outside the scope of this course, but I wrote [DatabaseSeeder](database/seeders/DatabaseSeeder.php). This would save your time. You can seed the database with `php artisan migrate:fresh --seed`.

## Polymorphic Relations

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
