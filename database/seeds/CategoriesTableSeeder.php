<?php

use Illuminate\Database\Seeder;
use App\Models\Language;
use App\Models\Category;
use Faker\Generator;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        $es=Language::create([
            'label' => 'Español',
            'iso6391'=>'es'
        ]);

        $en=Language::create([
            'label' => 'English',
            'iso6391'=>'en'
        ]);
        
        $languages =Language::get();
        factory(Category::class,10)->create()->each(function($category) use ($languages,$faker){
        
         foreach ($languages as $language) 
            {
            
            $registro[]=array(
                    'languages_id'=>$language->id,
                    'label'=>$faker->sentence(2),
                    'slug'=>$faker->slug(3),
                    'description'=>$faker->text(rand(10, 15)),
                    );
            }    
        $category->languages()->sync($registro);}); 
    }
}
