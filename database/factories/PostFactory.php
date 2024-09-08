<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' =>$this->faker->sentence(mt_rand(2,8)), 
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph() ,
            // 'body' => $this->faker->paragraph(mt_rand(5,10)), 

            //data acak akan diperoleh dari faker->paragraphs dan akan disimpan sebagai array
            //dibuat collect agar menjadi array sakti 
            //map dilakukan untuk melakukan tambahan yaitu menambahkan tag p pada setiap elemen array yang telah diperoleh dari faker 
            //$p merepresentasikan data yang ada di sebuah array yang telah di collect 
            //tapi masih dalam bentuk array,agar menjadi string maka lakukan implode dengan pemisahnya adalah ""
            'body' => collect($this->faker->paragraphs(mt_rand(5,10)))
                                ->map(function($p){
                                    return "<p> $p </p>" ; 
                                }) 
                                ->implode(''),
            'category_id' => mt_rand(1,3) , 
            'user_id' => mt_rand(1,4)
        ];
    }
}
