<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Inventory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'verify' => '1'
        ]);

        Category::create([
            'name' => 'Novel',
            'slug' => 'novel'
        ]);

        Category::create([
            'name' => 'Komik',
            'slug' => 'komik'
        ]);

        Inventory::create([
            'title' => 'Laskar Pelangi',
            'slug' => 'laskar-pelangi',
            'category_id' => 1,
            'penulis' => 'Andrea Hirata',
            'pendek' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id quisquam maiores velit inventore. Asperiores, corporis.',
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id quisquam maiores velit inventore. Asperiores, corporis. Deserunt, praesentium incidunt animi, totam dignissimos maiores numquam perferendis dolores eaque vero voluptatum iure vel odio in dolorem ipsum ratione repellendus necessitatibus ad nemo magni officia cumque facilis? Quia, non quos neque fugiat inventore tempora!',
            'link' => 'https://urlis.net/mazpy'
        ]);
        Inventory::create([
            'title' => 'Bumi Manusia',
            'slug' => 'bumi-manusia',
            'category_id' => 1,
            'penulis' => 'Pramoedya Ananta Toer',
            'pendek' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id quisquam maiores velit inventore. Asperiores, corporis.',
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id quisquam maiores velit inventore. Asperiores, corporis. Deserunt, praesentium incidunt animi, totam dignissimos maiores numquam perferendis dolores eaque vero voluptatum iure vel odio in dolorem ipsum ratione repellendus necessitatibus ad nemo magni officia cumque facilis? Quia, non quos neque fugiat inventore tempora!',
            'link' => 'https://urlis.net/4r24m'
        ]);
        Inventory::create([
            'title' => 'Negeri 5 Menara',
            'slug' => 'negeri-5-menara',
            'category_id' => 1,
            'penulis' => 'A. Fuadi',
            'pendek' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id quisquam maiores velit inventore. Asperiores, corporis.',
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id quisquam maiores velit inventore. Asperiores, corporis. Deserunt, praesentium incidunt animi, totam dignissimos maiores numquam perferendis dolores eaque vero voluptatum iure vel odio in dolorem ipsum ratione repellendus necessitatibus ad nemo magni officia cumque facilis? Quia, non quos neque fugiat inventore tempora!',
            'link' => 'https://urlis.net/nek2k'
        ]);
        Inventory::create([
            'title' => 'Doraemon Vol 1',
            'slug' => 'doraemon-vol-1',
            'category_id' => 2,
            'penulis' => 'Fujiko Fujio',
            'pendek' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id quisquam maiores velit inventore. Asperiores, corporis.',
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id quisquam maiores velit inventore. Asperiores, corporis. Deserunt, praesentium incidunt animi, totam dignissimos maiores numquam perferendis dolores eaque vero voluptatum iure vel odio in dolorem ipsum ratione repellendus necessitatibus ad nemo magni officia cumque facilis? Quia, non quos neque fugiat inventore tempora!',
            'link' => 'https://urlis.net/7s4jo'
        ]);
        Inventory::create([
            'title' => 'Doraemon Vol 2',
            'slug' => 'doraemon-vol-2',
            'category_id' => 2,
            'penulis' => 'Fujiko Fujio',
            'pendek' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id quisquam maiores velit inventore. Asperiores, corporis.',
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id quisquam maiores velit inventore. Asperiores, corporis. Deserunt, praesentium incidunt animi, totam dignissimos maiores numquam perferendis dolores eaque vero voluptatum iure vel odio in dolorem ipsum ratione repellendus necessitatibus ad nemo magni officia cumque facilis? Quia, non quos neque fugiat inventore tempora!',
            'link' => 'https://urlis.net/9edrp'
        ]);
    }
}
