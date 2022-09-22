<?php

namespace Database\Seeders;


use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        User::truncate();
        Post::truncate();
        Category::truncate();

         $user = User::factory()->create();

         $personal = Category::create([
             'name' => 'Personal',
             'slug' => 'personal'
         ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My family post',
            'slug' => 'my-first-post',
            'excerpt' => '<p>Lorem ipsum dolar sit amet.</p>',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat sem nec mauris tristique, ut varius leo imperdiet. Sed ut ligula placerat, porta elit et, pellentesque urna. Nullam dignissim finibus augue sit amet condimentum. Nunc sit amet mattis lectus. Aenean ut convallis ante. Aenean rhoncus rutrum nisi a egestas. Integer nisl eros, rhoncus ac pharetra ac, commodo sed arcu. Morbi ut lacus nec arcu mattis ultrices. Nulla a porta erat, a finibus eros. Pellentesque eu ante malesuada, pharetra nisi non, fringilla massa. Curabitur molestie, ligula laoreet molestie suscipit, nunc augue accumsan dui, nec mattis diam sapien sit amet augue. Phasellus lacinia turpis sit amet urna laoreet commodo.</p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My work post',
            'slug' => 'my-second-post',
            'excerpt' => '<p>Lorem ipsum dolar sit amet.</p>',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat sem nec mauris tristique, ut varius leo imperdiet. Sed ut ligula placerat, porta elit et, pellentesque urna. Nullam dignissim finibus augue sit amet condimentum. Nunc sit amet mattis lectus. Aenean ut convallis ante. Aenean rhoncus rutrum nisi a egestas. Integer nisl eros, rhoncus ac pharetra ac, commodo sed arcu. Morbi ut lacus nec arcu mattis ultrices. Nulla a porta erat, a finibus eros. Pellentesque eu ante malesuada, pharetra nisi non, fringilla massa. Curabitur molestie, ligula laoreet molestie suscipit, nunc augue accumsan dui, nec mattis diam sapien sit amet augue. Phasellus lacinia turpis sit amet urna laoreet commodo.</p>'
        ]);
    }
}
