# A Laravel 11 implementation of Eloquent Relationships

This repo show a Laravel 11 implementation of the [Eloquent Relationships course](https://laracasts.com/series/eloquent-relationships) from [Laracasts](https://laracasts.com/).
I highly recommend watching the original videos and using this repository as a supplementary resource.

The following sections will summarize the differences between original video and Laravel 11 implementation.

## One to One

- You can use `$table->foreignIdFor(User::class)` to specify foreign id key in [migration table](database/migrations/2025_01_03_013940_create_profiles_table.php), which is very useful.

## One to Many

- Use `User::factory()->create()` instead of `factory(User::class)->create()`.
- Use `fake()->sentence` instead of `$faker->sentence`. See (PostFactory)[database/factories/PostFactory.php].
- You can use `'user_id' => User::factory()` instead of `'user_id'=>function(){...}`. See (PostFactory)[database/factories/PostFactory.php].
