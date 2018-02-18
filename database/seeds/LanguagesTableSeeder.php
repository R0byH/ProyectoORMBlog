<?php

use Illuminate\Database\Seeder;
use App\Models\Language;
use App\Models\Post;
use App\Models\Category;
use Faker\Generator;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts =  Post::get();
        $faker = Faker\Factory::create();
        $categories=Category::get();
        
        foreach ($posts as $post) 
            {
            $category= $categories->random( 1 );
            
            $registro[]=array(
                    'posts_id'=>$post->id,
                    'title'=>$faker->sentence(2),
                    'slug'=>$category[0]->language('es')->first()->pivot->slug,
                    'content'=>$faker->text(rand(200, 250)),
                    );
            $registro2[]=array(
                    'posts_id'=>$post->id,
                    'title'=>$faker->sentence(2),
                    'slug'=>$category[0]->language('en')->first()->pivot->slug,
                    'content'=>$faker->text(rand(200, 250)),
                    );
           /* $registro3[]=array(
                    'posts_id'=>$post->id,
                    'title'=>$faker->sentence(2),
                    'slug'=>$category[0]->language('zh')->first()->pivot->slug,
                    'content'=>$faker->text(rand(200, 250)),
                    );
            $registro4[]=array(
                        'posts_id'=>$post->id,
                        'title'=>$faker->sentence(2),
                        'slug'=>$category[0]->language('cs')->first()->pivot->slug,
                        'content'=>$faker->text(rand(200, 250)),
            );*/
            }
            
       
        
        $es=Language::where('iso6391','es')->first();
        $es->posts()->sync($registro);

        $en=Language::where('iso6391','en')->first();
        $en->posts()->sync($registro2);

/*        $zh=Language::where('iso6391','zh')->first();
        $zh->posts()->sync($registro3);

        $cs=Language::where('iso6391','cs')->first();
        $cs->posts()->sync($registro4);*/
    }
}
