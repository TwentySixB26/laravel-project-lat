<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        

        User::create([
            'name' => 'Bayu aji' , 
            'username' => 'bayuaji' , 
            'email' => 'bayuaji@gmail.com' , 
            'password' => bcrypt('password')
        ]) ; 

        // User::create([
        //     'name' => 'oniel' , 
        //     'email' => 'oniel@gmail.com' , 
        //     'password' => bcrypt('12345')
        // ]) ; 

        User::factory(3)->create();
        Post::factory(20)->create() ;
        
        Category::create([
            'name' => 'Web Progaming',
            'slug' => 'web-progaming'
        ]) ; 
        
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]) ; 

        
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]) ;

        // Post::create([
        //     'title' => 'judul kesatu',
        //     'slug' => 'judul-kesatu',
        //     'excerpt' => "orem, ipsum dolor sit amet consectetur adipisicing elit. Hic alias dolorem rerum dolore non veniam, deleniti nihil molestiae odio 
        //             ut doloribus ex similique quam libero numquam aperiam reprehenderit eligendi ratione soluta",
        //     'body' => "<p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic alias dolorem rerum dolore non veniam, deleniti nihil molestiae 
        //             odio ut doloribus ex similique quam libero numquam aperiam reprehenderit eligendi ratione soluta id. </p> <p>Vel sint facilis in 
        //             ullam nihil corrupti maxime, laboriosam deserunt. Non tempora, repellat temporibus quisquam quam accusantium sint maiores aperiam
        //             itaque adipisci sapiente dolor aliquam sit fugiat exercitationem deleniti esse! Cumque in ipsam rem nisi aspernatur? 
        //             Similique temporibus repellendus ducimus magnam magni dicta vel dolor beatae eum ex, sapiente provident facilis velit atque 
        //             deserunt incidunt amet, mollitia numquam tempore </p> <p> voluptates qui. Perspiciatis eos placeat distinctio rem saepe 
        //             voluptatem provident dolorem, ea ad qui in ut alias quo facere iure facilis laudantium vel ullam illo libero officia explicabo 
        //             maxime praesentium eum! Nam dolore accusantium iusto est molestias hic corrupti.</p>",
        //     'category_id' => 1 , 
        //     'user_id' => 1
        // ]) ; 
        
        // Post::create([
        //     'title' => 'judul kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => "orem, ipsum dolor sit amet consectetur adipisicing elit. Hic alias dolorem rerum dolore non veniam, deleniti nihil molestiae odio 
        //             ut doloribus ex similique quam libero numquam aperiam reprehenderit eligendi ratione soluta",
        //     'body' => "<p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic alias dolorem rerum dolore non veniam, deleniti nihil molestiae 
        //             odio ut doloribus ex similique quam libero numquam aperiam reprehenderit eligendi ratione soluta id. </p> <p>Vel sint facilis in 
        //             ullam nihil corrupti maxime, laboriosam deserunt. Non tempora, repellat temporibus quisquam quam accusantium sint maiores aperiam
        //             itaque adipisci sapiente dolor aliquam sit fugiat exercitationem deleniti esse! Cumque in ipsam rem nisi aspernatur? 
        //             Similique temporibus repellendus ducimus magnam magni dicta vel dolor beatae eum ex, sapiente provident facilis velit atque 
        //             deserunt incidunt amet, mollitia numquam tempore </p> <p> voluptates qui. Perspiciatis eos placeat distinctio rem saepe 
        //             voluptatem provident dolorem, ea ad qui in ut alias quo facere iure facilis laudantium vel ullam illo libero officia explicabo 
        //             maxime praesentium eum! Nam dolore accusantium iusto est molestias hic corrupti.</p>",
        //     'category_id' => 1 , 
        //     'user_id' => 1
        // ]) ; 
        
        // Post::create([
        //     'title' => 'judul ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => "orem, ipsum dolor sit amet consectetur adipisicing elit. Hic alias dolorem rerum dolore non veniam, deleniti nihil molestiae odio 
        //             ut doloribus ex similique quam libero numquam aperiam reprehenderit eligendi ratione soluta",
        //     'body' => "<p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic alias dolorem rerum dolore non veniam, deleniti nihil molestiae 
        //             odio ut doloribus ex similique quam libero numquam aperiam reprehenderit eligendi ratione soluta id. </p> <p>Vel sint facilis in 
        //             ullam nihil corrupti maxime, laboriosam deserunt. Non tempora, repellat temporibus quisquam quam accusantium sint maiores aperiam
        //             itaque adipisci sapiente dolor aliquam sit fugiat exercitationem deleniti esse! Cumque in ipsam rem nisi aspernatur? 
        //             Similique temporibus repellendus ducimus magnam magni dicta vel dolor beatae eum ex, sapiente provident facilis velit atque 
        //             deserunt incidunt amet, mollitia numquam tempore </p> <p> voluptates qui. Perspiciatis eos placeat distinctio rem saepe 
        //             voluptatem provident dolorem, ea ad qui in ut alias quo facere iure facilis laudantium vel ullam illo libero officia explicabo 
        //             maxime praesentium eum! Nam dolore accusantium iusto est molestias hic corrupti.</p>",
        //     'category_id' => 2 , 
        //     'user_id' => 2
        // ]) ; 

        // Post::create([
        //     'title' => 'judul keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => "orem, ipsum dolor sit amet consectetur adipisicing elit. Hic alias dolorem rerum dolore non veniam, deleniti nihil molestiae odio 
        //             ut doloribus ex similique quam libero numquam aperiam reprehenderit eligendi ratione soluta",
        //     'body' => "<p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic alias dolorem rerum dolore non veniam, deleniti nihil molestiae 
        //             odio ut doloribus ex similique quam libero numquam aperiam reprehenderit eligendi ratione soluta id. </p> <p>Vel sint facilis in 
        //             ullam nihil corrupti maxime, laboriosam deserunt. Non tempora, repellat temporibus quisquam quam accusantium sint maiores aperiam
        //             itaque adipisci sapiente dolor aliquam sit fugiat exercitationem deleniti esse! Cumque in ipsam rem nisi aspernatur? 
        //             Similique temporibus repellendus ducimus magnam magni dicta vel dolor beatae eum ex, sapiente provident facilis velit atque 
        //             deserunt incidunt amet, mollitia numquam tempore </p> <p> voluptates qui. Perspiciatis eos placeat distinctio rem saepe 
        //             voluptatem provident dolorem, ea ad qui in ut alias quo facere iure facilis laudantium vel ullam illo libero officia explicabo 
        //             maxime praesentium eum! Nam dolore accusantium iusto est molestias hic corrupti.</p>",
        //     'category_id' => 3 , 
        //     'user_id' => 2
        // ]) ; 
        
        


    } 

}
