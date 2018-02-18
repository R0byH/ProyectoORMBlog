<?php

use Illuminate\Database\Seeder;
use App\Modules\Post;
use App\Modules\User;
use Faker\Generator;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $autors=User::get();
        $posts=Post::get();
        $faker = Faker\Factory::create();
        foreach($posts as $post)
        {
            $autors_random = $autors->random( rand(2,9) );       
            for ($i=0;$i<count($autors_random);$i++)
            {
            $registro[]=array(
                    'autor_id'=>$autors_random[$i]['id'],
                    'comment'=>$faker->text(rand(20, 150)),
                    );
            }
            $post->autors()->sync($registro);
            unset($registro);
        }
        
    }
}