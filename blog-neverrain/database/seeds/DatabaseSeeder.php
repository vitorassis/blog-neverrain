<?php

use Illuminate\Database\Seeder;
use App\Jogo;
use App\Midia;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call("JogosTableSeeder");
        $this->command->info('Jogos table seeded!');
        $this->call("MidiasTableSeeder");
        $this->command->info('Midias table seeded!');
        $this->call("UserTableSeeder");
        $this->command->info('User table seeded!');

    }
}

class JogosTableSeeder extends Seeder
{
    public function run(){

        Jogo::create(['nome'=>'TV man', 
            'titulo_empolgante'=>json_encode([
                'pt'=>'Jogue TV man!',
                'en'=>'Play TV man!',
                'es'=>'Juegalo TV man!'
            ]), 
            'descricao_empolgante' => json_encode([
                'pt'=>'TV man é foda!',
                'en'=>'TV man is so motherfucking!',
                'es'=>'¡TV man és fueda!'
            ]), 
            'descricao'=> json_encode([
                'pt'=>'Joga aí, consagrado!',
                'en'=>'Play there, holyguy!',
                'es'=>'¡Juegalo ahi, consagrado!'
            ])
        ]);
        Jogo::create(['nome'=>'Realm Racers', 
            'titulo_empolgante'=>json_encode([
                'pt'=>'Jooj de corrida',
                'en'=>'racing Gaag',
                'es'=>'Jueuj de carritos'
            ]), 
            'descricao_empolgante' => json_encode([
                'pt'=>'Não nos responsabilizamos por essa bosta!',
                'en'=>'This shit is not under our responsibility',
                'es'=>'Yo no hablo español, foda-se'
            ]), 
            'descricao'=> json_encode([
                'pt'=>'TopTop',
                'en'=>'Looks awful',
                'es'=>'Una caquita'
            ])]);
    }
}

class MidiasTableSeeder extends Seeder
{
    public function run(){

        Midia::create(['jogo_id'=>1, 'tipo'=>'head_pic', 'link'=>'img/blog_img2.png', 'alt'=>'Imagem ilustrativa']);
        Midia::create(['jogo_id'=>1, 'tipo'=>'carousel_pic', 'link'=>'img/pb-beer-1513436-1600.jpg', 'alt'=>'Imagem ilustrativa']);
        Midia::create(['jogo_id'=>1, 'tipo'=>'carousel_pic', 'link'=>'img/pb-beer-1513436-1600.jpg', 'alt'=>'Imagem ilustrativa']);
        Midia::create(['jogo_id'=>1, 'tipo'=>'empolg_pic', 'link'=>'img/recent_up.png', 'alt'=>'Imagem empolgante']);
        Midia::create(['jogo_id'=>1, 'tipo'=>'trailer_vid', 'link'=>'https://www.youtube.com/embed/5VhyRJRkJzY', 'alt'=>'']);
        Midia::create(['jogo_id'=>1, 'tipo'=>'embed_lnk', 'link'=>'https://store.steampowered.com/app/620', 'alt'=>'button', 'miscellanea'=>'btn-steam']);
        Midia::create(['jogo_id'=>1, 'tipo'=>'embed_lnk', 'link'=>'https://itch.io/embed/508094?dark=true', 'alt'=>'embed']);

        Midia::create(['jogo_id'=>2, 'tipo'=>'head_pic', 'link'=>'img/gallery_img2.png', 'alt'=>'Imagem ilustrativa']);
        Midia::create(['jogo_id'=>2, 'tipo'=>'carousel_pic', 'link'=>'img/pb-beer-1513436-1600.jpg', 'alt'=>'Imagem ilustrativa']);
        Midia::create(['jogo_id'=>2, 'tipo'=>'carousel_pic', 'link'=>'img/pb-beer-1513436-1600.jpg', 'alt'=>'Imagem ilustrativa']);
        Midia::create(['jogo_id'=>2, 'tipo'=>'empolg_pic', 'link'=>'img/recent_up.png', 'alt'=>'Imagem empolgante']);
        Midia::create(['jogo_id'=>2, 'tipo'=>'trailer_vid', 'link'=>'https://www.youtube.com/embed/5VhyRJRkJzY', 'alt'=>'']);
        Midia::create(['jogo_id'=>2, 'tipo'=>'embed_lnk', 'link'=>'https://store.steampowered.com/app/620', 'alt'=>'button', 'miscellanea'=>'btn-steam']);
        Midia::create(['jogo_id'=>2, 'tipo'=>'embed_lnk', 'link'=>'https://itch.io/embed/508094?dark=true', 'alt'=>'embed']);
    }
}

class UserTableSeeder extends Seeder
{
    public function run(){
        User::create([
            'name' => 'admin',
            'email' => 'admin@nvrn.com',
            'password' => bcrypt('%nvr%2020'),
        ]);
    }
}