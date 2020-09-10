<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('brand')->insert([
//            'brand_name'=>str::random(10),
//            'brand_url'=>str::random(10).'@gmail.com',
//            'brand_logo'=>"http://img.2001.com/upload/NmdUpIiBoCuUFg2yPSIpiw0Iva5NpTYVJPkJ1TYZ.jpeg",
//            'brand_desc'=>bcrypt('secret'),
//            'created_at'=>date('Y-m-d H:i:s',time()),
//            'updated_at'=>date('Y-m-d H:i:s',time()),
       // ]);
        // factory(App\Model\Brand::class,10)->create()->each(function($brand){
        //     $brand->posts()->save(factory(App\Post::class)->make());
           
        //});
          factory(App\Model\Brand::class,10)->create();
        
    }
}


















