<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Publish;
use Faker\Generator;

class PublishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $autors =User::get();
        factory(Publish::class,20)->create()->each(function($publish) use ($autors){
        
        $autors_random = $autors->random( rand(5,15) );
        $publish->autors()->sync($autors_random);

        });
    }
}
