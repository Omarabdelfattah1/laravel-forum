<?php

use Illuminate\Database\Seeder;
use App\Channel;
class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	Channel::create([
     		'name'=>'laravel',
     		'slug'=>str_slug('laravel'),
     	]);

     	Channel::create([
     		'name'=>'Node js',
     		'slug'=>str_slug('Node js'),
     	]);

     	Channel::create([
     		'name'=>'Rupy',
     		'slug'=>str_slug('Rupy'),
     	]); 

     	Channel::create([
     		'name'=>'django',
     		'slug'=>str_slug('django'),
     	]);   
    }
}
