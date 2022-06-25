<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\File;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $users =  \App\Models\User::factory(10)->make(['avatar'=>1])->each(function ($user){
            $avatar = File::create(['system_name'=>'avt1.jpg','real_name'=>'avt1.jpg','types'=>'avatar']);
            $user->avatar = $avatar->id;
            $user->save();
        });

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        $categories = Category::factory(10)->create();
        $types = Type::factory(4)->create();
        Product::factory(25)->make(['category_id'=>1,'type_id'=>1])->each(function ($product) use($categories,$types){
            $product->category_id = $categories->random()->id;
            $product->type_id = $types->random()->id;
            $file_id = File::create(['system_name'=>'img1.jpg','real_name'=>'img1.jpg','types'=>'file_id']);
            $image_id = File::create(['system_name'=>'img2.jpg','real_name'=>'img2.jpg','types'=>'image_id']);
            $product->image_id = $image_id->id;
            $product->file_id = $file_id->id;
            $product->save();
        });
    }
}
