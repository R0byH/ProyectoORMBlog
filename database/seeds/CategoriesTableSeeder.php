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
        
        $zh=Language::create([
            'label' => 'Chinese',
            'iso6391'=>'zh'
        ]);
        
        $cs=Language::create([
            'label' => 'Czech',
            'iso6391'=>'cs'
        ]);
        
        $da=Language::create([
            'label' => 'Danish',
            'iso6391'=>'da'
        ]);
        
        $he=Language::create([
            'label' => 'Hebrew',
            'iso6391'=>'he'
        ]);
        
        $ga=Language::create([
            'label' => 'Irish',
            'iso6391'=>'ga'
        ]);
        
        $ja=Language::create([
            'label' => 'Japanese',
            'iso6391'=>'ja'
        ]);
        
        $ko=Language::create([
            'label' => 'Korean',
            'iso6391'=>'ko'
        ]);
        
        $no=Language::create([
            'label' => 'Norwegian',
            'iso6391'=>'no'
        ]);
        
        $pt=Language::create([
            'label' => 'Portuguese',
            'iso6391'=>'pt'
        ]);
        
        $sv=Language::create([
            'label' => 'Swedish',
            'iso6391'=>'sv'
        ]);
        
        $languages =Language::get();
        factory(Category::class,20)->create()->each(function($category) use ($languages,$faker){
        
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
