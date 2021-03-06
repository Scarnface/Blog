<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // SINGLE USER TEST SEEDING
    //
    // $user = User::factory()->create([
    //   'name' => 'Scarnface'
    // ]);

    // Post::factory(5)->create([
    //   'user_id' => $user->id
    // ]);

    Post::factory(30)->create();
  }
}
