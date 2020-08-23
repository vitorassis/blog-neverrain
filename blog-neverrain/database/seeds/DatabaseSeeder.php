<?php

use Illuminate\Database\Seeder;
use App\Jogo;
use App\Midia;
use App\User;
use App\Texto;
use App\Plataforma;
use App\PlataformaDisponivel;

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
        $this->call("TextosTableSeeder");
        $this->command->info('Textos table seeded!');
        $this->call("PlataformasTableSeeder");
        $this->command->info('Plataformas table seeded!');
        $this->call("PlataformasDisponiveisTableSeeder");
        $this->command->info('Plataformas Disponíveis table seeded!');

    }
}

class JogosTableSeeder extends Seeder
{
    public function run(){

        Jogo::create(['nome'=>'TV man', 'data_lancamento'=>'2019-10-31']);
        Jogo::create(['nome'=>'Corollavirus', 'data_lancamento'=>'2018-8-29']);
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
        Midia::create(['jogo_id'=>1, 'tipo'=>'bkgd_vid', 'link'=>'https://player.vimeo.com/video/76979871?background=1&muted=1', 'alt'=>'bkgd']);

        Midia::create(['jogo_id'=>2, 'tipo'=>'head_pic', 'link'=>'img/gallery_img2.png', 'alt'=>'Imagem ilustrativa']);
        Midia::create(['jogo_id'=>2, 'tipo'=>'carousel_pic', 'link'=>'img/pb-beer-1513436-1600.jpg', 'alt'=>'Imagem ilustrativa']);
        Midia::create(['jogo_id'=>2, 'tipo'=>'carousel_pic', 'link'=>'img/pb-beer-1513436-1600.jpg', 'alt'=>'Imagem ilustrativa']);
        Midia::create(['jogo_id'=>2, 'tipo'=>'empolg_pic', 'link'=>'img/recent_up.png', 'alt'=>'Imagem empolgante']);
        Midia::create(['jogo_id'=>2, 'tipo'=>'trailer_vid', 'link'=>'https://www.youtube.com/embed/5VhyRJRkJzY', 'alt'=>'']);
        Midia::create(['jogo_id'=>2, 'tipo'=>'embed_lnk', 'link'=>'https://store.steampowered.com/app/620', 'alt'=>'button', 'miscellanea'=>'btn-steam']);
        Midia::create(['jogo_id'=>2, 'tipo'=>'embed_lnk', 'link'=>'https://itch.io/embed/508094?dark=true', 'alt'=>'embed']);
        Midia::create(['jogo_id'=>2, 'tipo'=>'bkgd_vid', 'link'=>'https://player.vimeo.com/video/76979871?background=1&muted=1', 'alt'=>'bkgd']);
    }
}

class TextosTableSeeder extends Seeder{
    public function run(){
        Texto::create(['jogo_id'=>1, 'tipo'=>'titulo_empolg', 'lang'=>'pt', 'texto'=>'Destrua todas as TVs!']);
        Texto::create(['jogo_id'=>1, 'tipo'=>'titulo_empolg', 'lang'=>'en', 'texto'=>'Destroy all TVs!']);
        Texto::create(['jogo_id'=>1, 'tipo'=>'titulo_empolg', 'lang'=>'es', 'texto'=>'Destrua todas as TVs!']);
        Texto::create(['jogo_id'=>1, 'tipo'=>'descricao_empolg', 'lang'=>'pt', 'texto'=>'Paçoca']);
        Texto::create(['jogo_id'=>1, 'tipo'=>'descricao_empolg', 'lang'=>'en', 'texto'=>'Tosuck']);
        Texto::create(['jogo_id'=>1, 'tipo'=>'descricao_empolg', 'lang'=>'es', 'texto'=>'Paçoquita']);
        Texto::create(['jogo_id'=>1, 'tipo'=>'descricao', 'lang'=>'pt', 'texto'=>'Descrição babaca']);
        Texto::create(['jogo_id'=>1, 'tipo'=>'descricao', 'lang'=>'en', 'texto'=>'babaca description']);
        Texto::create(['jogo_id'=>1, 'tipo'=>'descricao', 'lang'=>'es', 'texto'=>'Odeio espanhol']);

        Texto::create(['jogo_id'=>2, 'tipo'=>'titulo_empolg', 'lang'=>'pt', 'texto'=>'Jogo do Ygor!']);
        Texto::create(['jogo_id'=>2, 'tipo'=>'titulo_empolg', 'lang'=>'en', 'texto'=>'Ygor\'s game!']);
        Texto::create(['jogo_id'=>2, 'tipo'=>'titulo_empolg', 'lang'=>'es', 'texto'=>'Juego del Ygor!']);
        Texto::create(['jogo_id'=>2, 'tipo'=>'descricao_empolg', 'lang'=>'pt', 'texto'=>'sei não']);
        Texto::create(['jogo_id'=>2, 'tipo'=>'descricao_empolg', 'lang'=>'en', 'texto'=>'I don\' know']);
        Texto::create(['jogo_id'=>2, 'tipo'=>'descricao_empolg', 'lang'=>'es', 'texto'=>'Yo no sei']);
        Texto::create(['jogo_id'=>2, 'tipo'=>'descricao', 'lang'=>'pt', 'texto'=>'Descrição babaca']);
        Texto::create(['jogo_id'=>2, 'tipo'=>'descricao', 'lang'=>'en', 'texto'=>'babaca description']);
        Texto::create(['jogo_id'=>2, 'tipo'=>'descricao', 'lang'=>'es', 'texto'=>'Odeio espanhol']);
    }
}

class PlataformasTableSeeder extends Seeder{
    public function run(){
        Plataforma::create(['nome'=>'PC', 'link'=>'']);
    }
}

class PlataformasDisponiveisTableSeeder extends Seeder{
    public function run(){
        DB::insert('insert into plataformasdisponiveis (jogo_id, plataforma_id) values (?, ?)', [1, 1]);
        DB::insert('insert into plataformasdisponiveis (jogo_id, plataforma_id) values (?, ?)', [2, 1]);
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