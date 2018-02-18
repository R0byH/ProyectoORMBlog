<?php

use Illuminate\Database\Seeder;
use App\Models\Posts; 
use App\Models\Publishes; 
use App\Models\User; 
use Faker\Generator;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $posts =  Post::get();
        factory(Photo::class,20)->create()->each(function($photo) use ($posts,$faker){
        $posts_random = $posts->random( rand(0,10) );

        for ($i=0;$i<count($posts_random);$i++)
        {
            $registro[]=array(
                    'posts_id'=>$posts_random[$i]['id'],
                    'use'=>$faker->word,
                    'order'=>  $i+1,
                    );
        }
         if (count($posts_random)>1) 
        {$photo->posts()->sync($registro);}

        });
    }
}
