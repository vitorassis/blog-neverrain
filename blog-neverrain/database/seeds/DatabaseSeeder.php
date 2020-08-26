<?php

use Illuminate\Database\Seeder;
use App\Jogo;
use App\Midia;
use App\Noticia;
use App\User;
use App\Tag;
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
        $this->call("NoticiasTableSeeder");
        $this->command->info('Noticias table seeded!');
        $this->call("TagsTableSeeder");
        $this->command->info('Tags table seeded!');
        $this->call("TagsDaNoticiaTableSeeder");
        $this->command->info('Tags da Noticia table seeded!');
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

class NoticiasTableSeeder extends Seeder{
    public function run(){
        Noticia::create(['data_publicacao'=> '2020-05-24']);
    }
}

class TagsTableSeeder extends Seeder{
    public function run(){
        Tag::create(['nome'=>'Tag 1', 'cor'=>'yellow']);
        Tag::create(['nome'=>'Tag 2', 'cor'=>'#ccc']);
    }
}

class TagsDaNoticiaTableSeeder extends Seeder{
    public function run(){
        DB::insert('insert into tagsdanoticia (tag_id, noticia_id) values (?, ?)', [1, 1]);
        DB::insert('insert into tagsdanoticia (tag_id, noticia_id) values (?, ?)', [2, 1]);
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

        Midia::create(['noticia_id'=>1, 'tipo'=>'head_pic', 'link'=>'img/blog_img2.png', 'alt'=>'Capa']);
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
        
        Texto::create(['noticia_id'=>1, 'tipo'=>'titulo', 'lang'=>'pt', 'texto'=>'Titulo Teste']);
        Texto::create(['noticia_id'=>1, 'tipo'=>'titulo', 'lang'=>'en', 'texto'=>'Test name']);
        Texto::create(['noticia_id'=>1, 'tipo'=>'titulo', 'lang'=>'es', 'texto'=>'Titulo Teste']);
        Texto::create(['noticia_id'=>1, 'tipo'=>'corpo', 'lang'=>'pt', 'texto'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et enim vel purus hendrerit efficitur eget mattis dui. Etiam molestie nulla sed felis varius lobortis. Proin iaculis lacus sed neque vestibulum, non venenatis turpis porta. Duis varius felis volutpat justo tempus, eu mollis mi maximus. Nunc et mauris at tortor malesuada dapibus eu at odio. Donec laoreet ligula sed pharetra pellentesque. Quisque pharetra consectetur mauris vel sollicitudin. Vestibulum in laoreet felis, sed molestie elit. Nulla ut dolor efficitur, commodo ligula non, pharetra velit. Nullam sed velit lorem. Phasellus rutrum massa eu facilisis bibendum. Vestibulum tempus tincidunt est, quis iaculis urna pellentesque id. Aliquam erat volutpat.

        Aenean gravida sit amet diam et lacinia. Phasellus dictum ac ipsum non luctus. Nulla suscipit lectus vel magna molestie semper. Ut ac egestas massa, in auctor orci. Fusce suscipit tincidunt lacinia. Suspendisse potenti. Suspendisse potenti. Suspendisse eleifend augue condimentum mi auctor, eu dapibus sapien scelerisque. Donec feugiat cursus nibh nec ullamcorper. Integer rhoncus laoreet ornare. Vivamus congue ornare dignissim. Nullam semper placerat ante non aliquet.
        
        Nullam tortor dui, aliquet vel ipsum sit amet, tincidunt ultricies tortor. Aliquam ac sapien lobortis eros sodales aliquet nec vel mi. Sed feugiat, arcu in lacinia viverra, felis mauris tristique orci, id egestas felis justo eget enim. Pellentesque pretium dictum gravida. Phasellus elementum sapien sit amet ultricies mollis. Donec vestibulum urna nulla, a pellentesque felis vulputate nec. Mauris sodales fringilla dolor in vehicula. Ut massa ligula, varius ut sodales ut, scelerisque posuere nisl. Maecenas odio mi, viverra non porta sit amet, faucibus eu dolor. Mauris interdum tempus quam at fringilla. Quisque diam metus, elementum sed faucibus in, porttitor volutpat nisi. Nulla facilisi. Morbi iaculis pellentesque dui sit amet auctor. Mauris posuere sed ipsum quis lobortis.']);
        Texto::create(['noticia_id'=>1, 'tipo'=>'corpo', 'lang'=>'en', 'texto'=>'Phasellus convallis elementum lacus quis accumsan. Praesent porttitor odio in ex vestibulum semper. Nullam nulla augue, sagittis id posuere placerat, vehicula et dui. In tempus, leo non interdum sagittis, lectus justo dapibus sem, nec elementum ipsum sapien nec lectus. Proin arcu purus, tincidunt vel tempus et, condimentum vel nibh. Sed hendrerit arcu eget mi tincidunt, id euismod velit imperdiet. Nulla commodo pharetra bibendum. Integer sem risus, mollis quis tincidunt eu, aliquet id quam. Vivamus id hendrerit justo. Nullam vulputate, elit et semper rutrum, urna mauris varius odio, luctus bibendum est neque ac tellus. Donec vitae accumsan lorem.

        Vestibulum dictum velit vel nulla laoreet fringilla. Ut vitae arcu maximus, commodo mauris et, malesuada nisl. Cras nec nisi quis libero scelerisque fringilla. Donec maximus sem quis justo laoreet egestas. Praesent pulvinar iaculis consequat. Quisque non dui tincidunt, posuere sem vel, hendrerit nibh. Pellentesque ut ligula ac augue tempor ultricies. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus sed molestie odio, a interdum elit. Nullam posuere faucibus semper. Suspendisse rutrum, turpis sed semper dictum, mi felis pellentesque leo, sed porttitor urna justo eu metus. Donec cursus auctor augue, facilisis vehicula enim scelerisque ac. Integer massa lectus, pulvinar quis ex nec, ultrices tempus nunc. Curabitur rutrum mattis lacinia. Duis tempor sagittis augue, sit amet gravida odio commodo quis. Vestibulum volutpat nulla eu justo volutpat, id rhoncus purus pellentesque.']);
        Texto::create(['noticia_id'=>1, 'tipo'=>'corpo', 'lang'=>'es', 'texto'=>'Nullam tortor dui, aliquet vel ipsum sit amet, tincidunt ultricies tortor. Aliquam ac sapien lobortis eros sodales aliquet nec vel mi. Sed feugiat, arcu in lacinia viverra, felis mauris tristique orci, id egestas felis justo eget enim. Pellentesque pretium dictum gravida. Phasellus elementum sapien sit amet ultricies mollis. Donec vestibulum urna nulla, a pellentesque felis vulputate nec. Mauris sodales fringilla dolor in vehicula. Ut massa ligula, varius ut sodales ut, scelerisque posuere nisl. Maecenas odio mi, viverra non porta sit amet, faucibus eu dolor. Mauris interdum tempus quam at fringilla. Quisque diam metus, elementum sed faucibus in, porttitor volutpat nisi. Nulla facilisi. Morbi iaculis pellentesque dui sit amet auctor. Mauris posuere sed ipsum quis lobortis.']);
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
