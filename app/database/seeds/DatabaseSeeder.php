<?php

class DatabaseSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Eloquent::unguard();

    $this->call('UserTableSeeder');
    $this->call('MenusTableSeeder');
    $this->call('ProjectsTableSeeder');
    $this->call('CategoriesTableSeeder');
    $this->call('PostsTableSeeder');
    $this->call('GalleriesTableSeeder');
    $this->call('ImagesTableSeeder');
    $this->command->info('User table seeded!');
  }

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
          'username' => 'trankhanh',
          'email' => 'trankhanh.tk.tk@gmail.com',
          'password' => Hash::make('abcdabcd')));
    }

}

class MenusTableSeeder extends Seeder {

    public function run()
    {
        DB::table('menus')->delete();

        Menu::create(array(
          'id' => '1',
          'title' => 'TRANG CHỦ'));

        Menu::create(array(
          'id' => '2',
          'title' => 'KIẾN THỨC XÂY DỰNG'));

        Menu::create(array(
          'id' => '3',
          'title' => 'VẬT LIỆU HOÀN THIỆN'));

        Menu::create(array(
          'id' => '4',
          'title' => 'SHOP NỘI THẤT'));

        Menu::create(array(
          'id' => '5',
          'title' => 'PHONG THỦY'));

        Menu::create(array(
          'id' => '6',
          'title' => 'GIỚI THIỆU'));
    }

}

class ProjectsTableSeeder extends Seeder {

  public function run()
  {
    DB::table('projects')->delete();

    for($i = 0; $i < 20; $i++) {
      Project::create([
        'id' => $i + 1,
        'name' => 'TÊN DỰ ÁN '.$i,
        'info' => 'Diện tích đất     900 m2',
        'is_featured' => true,
        'image' => '/images/index/img_pj0'.($i % 4 + 1).'.jpg'
      ]);
    }
  }

}


class GalleriesTableSeeder extends Seeder {

  public function run()
  {
    DB::table('galleries')->delete();

    for($i = 0; $i < 20; $i++) {
      Gallery::create([
        'id' => $i + 1,
        'title' => 'Gallery '.$i,
        'project_id' => $i + 1
      ]);
    }
  }

}

class ImagesTableSeeder extends Seeder {

  public function run()
  {
    DB::table('images')->delete();
    for($i = 0; $i < 20; $i++) {
      for ($j = 0; $j < 5; $j++) {
        Image::create([
          'name' => 'Name '.$i,
          'title' => 'title '.$i,
          'url' => '/images/intro/project0' . $i . '/img_0' . $j . '.jpg',
          'thumb_url' => '/images/intro/project0' . $i . '/thumb_0' . $j . '.jpg',
          'gallery_id' => $i + 1,
        ]);
      }
    }

  }

}

class CategoriesTableSeeder extends Seeder {

  public function run()
  {
    DB::table('categories')->delete();

    DB::table('categories')->insert(array(
      array(
        'id' => 1,
        'name' => 'Lập kế hoạch xây nhà',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ),
      array(
        'id' => 2,
        'name' => 'Làm việc với chuyên gia',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ),
      array(
        'id' => 3,
        'name' => 'Chọn vật liệu xây dựng',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ),
      array(
        'id' => 4,
        'name' => 'Xây dựng phần thô',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ),
      array(
        'id' => 5,
        'name' => 'Xây dựng hoàn thiện',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ),
      array(
        'id' => 6,
        'name' => 'Kiểm tra nghiệm thu',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ),
      array(
        'id' => 7,
        'name' => 'Cẩm nang xây nhà',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ),
      array(
        'id' => 8,
        'name' => 'Các lỗi phong thủy thường gặp',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ),
      array(
        'id' => 9,
        'name' => 'Hiểu phong thủy để xây nhà',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ),
      array(
        'id' => 10,
        'name' => 'Màu sắc và ngũ hành',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ),
      array(
        'id' => 11,
        'name' => 'Thước lỗ ban',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ),
    ));
  }
}


class PostsTableSeeder extends Seeder {

  public function run()
  {
    DB::table('posts')->delete();

    for($i = 1; $i < 6; $i++) {
      Post::create([
        'id' => $i,
        'category_id' => 1,
        'title' => 'Lập kế hoạch xây nhà '.$i,
        'summary' => 'The key to driving this engagement is to ensure that we value design in the right way, not simply as a template, theme or color scheme but as a support system for key content. We can use design to make a website unique and more memorable. We do this by laying the foundation of a good impression, enabling smooth and meaningful consumption, and encouraging engagement with the content. All three of these areas are opportunities to drive a user experience that is in harmony with our content.',
        'image' => "/images/posts/img_0".$i.".jpg"
      ]);
    }

    for($i = 1; $i < 6; $i++) {
      Post::create([
        'id' => $i + 5,
        'category_id' => 2,
        'title' => 'Làm việc với chuyên gia '.$i,
        'summary' => 'Lorem ipsum Occaecat fugiat amet quis dolore id eu in labore velit eiusmod in exercitation laborum id ad ullamco Duis eu culpa irure aliquip ut sit reprehenderit reprehenderit anim exercitation non elit culpa occaecat eiusmod cupidatat occaecat dolore sint ut ullamco exercitation ad sunt Excepteur esse minim aliqua qui reprehenderit culpa ut esse ut sit eiusmod amet eiusmod aliquip in cillum et enim qui veniam in sed amet officia mollit in ea enim eu sit cupidatat Ut ut officia voluptate cupidatat fugiat veniam et quis sit in aliqua sed reprehenderit anim eu nostrud cillum ad magna sed id proident non incididunt dolor eu labore dolor dolore aute aliqua laboris officia pariatur cillum fugiat officia eiusmod anim laboris ad proident consectetur aliqua et sit mollit in cillum Excepteur in officia cupidatat tempor non ut ex veniam dolor irure dolore anim reprehenderit ea ut laboris voluptate nostrud quis non deserunt mollit aliquip reprehenderit enim aliquip id do non sint nulla in elit in eiusmod voluptate fugiat nostrud fugiat aliquip proident do ut cupidatat qui minim sunt non deserunt non sunt officia in exercitation incididunt esse elit culpa elit sunt eiusmod voluptate labore consectetur elit eiusmod Ut nulla et eiusmod aliquip ut est do amet proident commodo ex tempor incididunt id est nisi in enim Duis amet Excepteur irure aliquip culpa aute veniam dolore qui ea aliqua ea magna fugiat.',
        'image' => "/images/posts/img_0".$i.".jpg"
      ]);
    }

    for($i = 1; $i < 6; $i++) {
      Post::create([
        'id' => $i + 10,
        'category_id' => 3,
        'title' => 'Chọn vật liệu xây dựng '.$i,
        'summary' => 'Lorem ipsum Occaecat fugiat amet quis dolore id eu in labore velit eiusmod in exercitation laborum id ad ullamco Duis eu culpa irure aliquip ut sit reprehenderit reprehenderit anim exercitation non elit culpa occaecat eiusmod cupidatat occaecat dolore sint ut ullamco exercitation ad sunt Excepteur esse minim aliqua qui reprehenderit culpa ut esse ut sit eiusmod amet eiusmod aliquip in cillum et enim qui veniam in sed amet officia mollit in ea enim eu sit cupidatat Ut ut officia voluptate cupidatat fugiat veniam et quis sit in aliqua sed reprehenderit anim eu nostrud cillum ad magna sed id proident non incididunt dolor eu labore dolor dolore aute aliqua laboris officia pariatur cillum fugiat officia eiusmod anim laboris ad proident consectetur aliqua et sit mollit in cillum Excepteur in officia cupidatat tempor non ut ex veniam dolor irure dolore anim reprehenderit ea ut laboris voluptate nostrud quis non deserunt mollit aliquip reprehenderit enim aliquip id do non sint nulla in elit in eiusmod voluptate fugiat nostrud fugiat aliquip proident do ut cupidatat qui minim sunt non deserunt non sunt officia in exercitation incididunt esse elit culpa elit sunt eiusmod voluptate labore consectetur elit eiusmod Ut nulla et eiusmod aliquip ut est do amet proident commodo ex tempor incididunt id est nisi in enim Duis amet Excepteur irure aliquip culpa aute veniam dolore qui ea aliqua ea magna fugiat.',
        'image' => "/images/posts/img_0".$i.".jpg"
      ]);
    }

    for($i = 1; $i < 6; $i++) {
      Post::create([
        'id' => $i + 15,
        'category_id' => 4,
        'title' => 'Xây dựng phần thô '.$i,
        'summary' => 'Lorem ipsum Occaecat fugiat amet quis dolore id eu in labore velit eiusmod in exercitation laborum id ad ullamco Duis eu culpa irure aliquip ut sit reprehenderit reprehenderit anim exercitation non elit culpa occaecat eiusmod cupidatat occaecat dolore sint ut ullamco exercitation ad sunt Excepteur esse minim aliqua qui reprehenderit culpa ut esse ut sit eiusmod amet eiusmod aliquip in cillum et enim qui veniam in sed amet officia mollit in ea enim eu sit cupidatat Ut ut officia voluptate cupidatat fugiat veniam et quis sit in aliqua sed reprehenderit anim eu nostrud cillum ad magna sed id proident non incididunt dolor eu labore dolor dolore aute aliqua laboris officia pariatur cillum fugiat officia eiusmod anim laboris ad proident consectetur aliqua et sit mollit in cillum Excepteur in officia cupidatat tempor non ut ex veniam dolor irure dolore anim reprehenderit ea ut laboris voluptate nostrud quis non deserunt mollit aliquip reprehenderit enim aliquip id do non sint nulla in elit in eiusmod voluptate fugiat nostrud fugiat aliquip proident do ut cupidatat qui minim sunt non deserunt non sunt officia in exercitation incididunt esse elit culpa elit sunt eiusmod voluptate labore consectetur elit eiusmod Ut nulla et eiusmod aliquip ut est do amet proident commodo ex tempor incididunt id est nisi in enim Duis amet Excepteur irure aliquip culpa aute veniam dolore qui ea aliqua ea magna fugiat.',
        'image' => "/images/posts/img_0".$i.".jpg"
      ]);
    }

    for($i = 1; $i < 6; $i++) {
      Post::create([
        'id' => $i + 20,
        'category_id' => 5,
        'title' => 'Xây dựng hoàn thiện '.$i,
        'summary' => 'Lorem ipsum Occaecat fugiat amet quis dolore id eu in labore velit eiusmod in exercitation laborum id ad ullamco Duis eu culpa irure aliquip ut sit reprehenderit reprehenderit anim exercitation non elit culpa occaecat eiusmod cupidatat occaecat dolore sint ut ullamco exercitation ad sunt Excepteur esse minim aliqua qui reprehenderit culpa ut esse ut sit eiusmod amet eiusmod aliquip in cillum et enim qui veniam in sed amet officia mollit in ea enim eu sit cupidatat Ut ut officia voluptate cupidatat fugiat veniam et quis sit in aliqua sed reprehenderit anim eu nostrud cillum ad magna sed id proident non incididunt dolor eu labore dolor dolore aute aliqua laboris officia pariatur cillum fugiat officia eiusmod anim laboris ad proident consectetur aliqua et sit mollit in cillum Excepteur in officia cupidatat tempor non ut ex veniam dolor irure dolore anim reprehenderit ea ut laboris voluptate nostrud quis non deserunt mollit aliquip reprehenderit enim aliquip id do non sint nulla in elit in eiusmod voluptate fugiat nostrud fugiat aliquip proident do ut cupidatat qui minim sunt non deserunt non sunt officia in exercitation incididunt esse elit culpa elit sunt eiusmod voluptate labore consectetur elit eiusmod Ut nulla et eiusmod aliquip ut est do amet proident commodo ex tempor incididunt id est nisi in enim Duis amet Excepteur irure aliquip culpa aute veniam dolore qui ea aliqua ea magna fugiat.',
        'image' => "/images/posts/img_0".$i.".jpg"
      ]);
    }

    for($i = 1; $i < 6; $i++) {
      Post::create([
        'id' => $i + 25,
        'category_id' => 6,
        'title' => 'Kiểm tra nghiệm thu '.$i,
        'summary' => 'Lorem ipsum Occaecat fugiat amet quis dolore id eu in labore velit eiusmod in exercitation laborum id ad ullamco Duis eu culpa irure aliquip ut sit reprehenderit reprehenderit anim exercitation non elit culpa occaecat eiusmod cupidatat occaecat dolore sint ut ullamco exercitation ad sunt Excepteur esse minim aliqua qui reprehenderit culpa ut esse ut sit eiusmod amet eiusmod aliquip in cillum et enim qui veniam in sed amet officia mollit in ea enim eu sit cupidatat Ut ut officia voluptate cupidatat fugiat veniam et quis sit in aliqua sed reprehenderit anim eu nostrud cillum ad magna sed id proident non incididunt dolor eu labore dolor dolore aute aliqua laboris officia pariatur cillum fugiat officia eiusmod anim laboris ad proident consectetur aliqua et sit mollit in cillum Excepteur in officia cupidatat tempor non ut ex veniam dolor irure dolore anim reprehenderit ea ut laboris voluptate nostrud quis non deserunt mollit aliquip reprehenderit enim aliquip id do non sint nulla in elit in eiusmod voluptate fugiat nostrud fugiat aliquip proident do ut cupidatat qui minim sunt non deserunt non sunt officia in exercitation incididunt esse elit culpa elit sunt eiusmod voluptate labore consectetur elit eiusmod Ut nulla et eiusmod aliquip ut est do amet proident commodo ex tempor incididunt id est nisi in enim Duis amet Excepteur irure aliquip culpa aute veniam dolore qui ea aliqua ea magna fugiat.',
        'image' => "/images/posts/img_0".$i.".jpg"
      ]);
    }

    for($i = 1; $i < 6; $i++) {
      Post::create([
        'id' => $i + 30,
        'category_id' => 7,
        'title' => 'Cẩm nang xây nhà '.$i,
        'summary' => 'Lorem ipsum Occaecat fugiat amet quis dolore id eu in labore velit eiusmod in exercitation laborum id ad ullamco Duis eu culpa irure aliquip ut sit reprehenderit reprehenderit anim exercitation non elit culpa occaecat eiusmod cupidatat occaecat dolore sint ut ullamco exercitation ad sunt Excepteur esse minim aliqua qui reprehenderit culpa ut esse ut sit eiusmod amet eiusmod aliquip in cillum et enim qui veniam in sed amet officia mollit in ea enim eu sit cupidatat Ut ut officia voluptate cupidatat fugiat veniam et quis sit in aliqua sed reprehenderit anim eu nostrud cillum ad magna sed id proident non incididunt dolor eu labore dolor dolore aute aliqua laboris officia pariatur cillum fugiat officia eiusmod anim laboris ad proident consectetur aliqua et sit mollit in cillum Excepteur in officia cupidatat tempor non ut ex veniam dolor irure dolore anim reprehenderit ea ut laboris voluptate nostrud quis non deserunt mollit aliquip reprehenderit enim aliquip id do non sint nulla in elit in eiusmod voluptate fugiat nostrud fugiat aliquip proident do ut cupidatat qui minim sunt non deserunt non sunt officia in exercitation incididunt esse elit culpa elit sunt eiusmod voluptate labore consectetur elit eiusmod Ut nulla et eiusmod aliquip ut est do amet proident commodo ex tempor incididunt id est nisi in enim Duis amet Excepteur irure aliquip culpa aute veniam dolore qui ea aliqua ea magna fugiat.',
        'image' => "/images/posts/img_0".$i.".jpg"
      ]);
    }

    for($i = 1; $i < 6; $i++) {
      Post::create([
        'id' => $i + 35,
        'category_id' => 8,
        'title' => 'Các lỗi phong thủy thường gặp '.$i,
        'summary' => 'Lorem ipsum Occaecat fugiat amet quis dolore id eu in labore velit eiusmod in exercitation laborum id ad ullamco Duis eu culpa irure aliquip ut sit reprehenderit reprehenderit anim exercitation non elit culpa occaecat eiusmod cupidatat occaecat dolore sint ut ullamco exercitation ad sunt Excepteur esse minim aliqua qui reprehenderit culpa ut esse ut sit eiusmod amet eiusmod aliquip in cillum et enim qui veniam in sed amet officia mollit in ea enim eu sit cupidatat Ut ut officia voluptate cupidatat fugiat veniam et quis sit in aliqua sed reprehenderit anim eu nostrud cillum ad magna sed id proident non incididunt dolor eu labore dolor dolore aute aliqua laboris officia pariatur cillum fugiat officia eiusmod anim laboris ad proident consectetur aliqua et sit mollit in cillum Excepteur in officia cupidatat tempor non ut ex veniam dolor irure dolore anim reprehenderit ea ut laboris voluptate nostrud quis non deserunt mollit aliquip reprehenderit enim aliquip id do non sint nulla in elit in eiusmod voluptate fugiat nostrud fugiat aliquip proident do ut cupidatat qui minim sunt non deserunt non sunt officia in exercitation incididunt esse elit culpa elit sunt eiusmod voluptate labore consectetur elit eiusmod Ut nulla et eiusmod aliquip ut est do amet proident commodo ex tempor incididunt id est nisi in enim Duis amet Excepteur irure aliquip culpa aute veniam dolore qui ea aliqua ea magna fugiat.',
        'image' => "/images/posts/img_0".$i.".jpg"
      ]);
    }

    for($i = 1; $i < 6; $i++) {
      Post::create([
        'id' => $i + 40,
        'category_id' => 9,
        'title' => 'Hiểu phong thủy để xây nhà '.$i,
        'summary' => 'Lorem ipsum Occaecat fugiat amet quis dolore id eu in labore velit eiusmod in exercitation laborum id ad ullamco Duis eu culpa irure aliquip ut sit reprehenderit reprehenderit anim exercitation non elit culpa occaecat eiusmod cupidatat occaecat dolore sint ut ullamco exercitation ad sunt Excepteur esse minim aliqua qui reprehenderit culpa ut esse ut sit eiusmod amet eiusmod aliquip in cillum et enim qui veniam in sed amet officia mollit in ea enim eu sit cupidatat Ut ut officia voluptate cupidatat fugiat veniam et quis sit in aliqua sed reprehenderit anim eu nostrud cillum ad magna sed id proident non incididunt dolor eu labore dolor dolore aute aliqua laboris officia pariatur cillum fugiat officia eiusmod anim laboris ad proident consectetur aliqua et sit mollit in cillum Excepteur in officia cupidatat tempor non ut ex veniam dolor irure dolore anim reprehenderit ea ut laboris voluptate nostrud quis non deserunt mollit aliquip reprehenderit enim aliquip id do non sint nulla in elit in eiusmod voluptate fugiat nostrud fugiat aliquip proident do ut cupidatat qui minim sunt non deserunt non sunt officia in exercitation incididunt esse elit culpa elit sunt eiusmod voluptate labore consectetur elit eiusmod Ut nulla et eiusmod aliquip ut est do amet proident commodo ex tempor incididunt id est nisi in enim Duis amet Excepteur irure aliquip culpa aute veniam dolore qui ea aliqua ea magna fugiat.',
        'image' => "/images/posts/img_0".$i.".jpg"
      ]);
    }

    for($i = 1; $i < 6; $i++) {
      Post::create([
        'id' => $i + 45,
        'category_id' => 10,
        'title' => 'Màu sắc và ngũ hành '.$i,
        'summary' => 'Lorem ipsum Occaecat fugiat amet quis dolore id eu in labore velit eiusmod in exercitation laborum id ad ullamco Duis eu culpa irure aliquip ut sit reprehenderit reprehenderit anim exercitation non elit culpa occaecat eiusmod cupidatat occaecat dolore sint ut ullamco exercitation ad sunt Excepteur esse minim aliqua qui reprehenderit culpa ut esse ut sit eiusmod amet eiusmod aliquip in cillum et enim qui veniam in sed amet officia mollit in ea enim eu sit cupidatat Ut ut officia voluptate cupidatat fugiat veniam et quis sit in aliqua sed reprehenderit anim eu nostrud cillum ad magna sed id proident non incididunt dolor eu labore dolor dolore aute aliqua laboris officia pariatur cillum fugiat officia eiusmod anim laboris ad proident consectetur aliqua et sit mollit in cillum Excepteur in officia cupidatat tempor non ut ex veniam dolor irure dolore anim reprehenderit ea ut laboris voluptate nostrud quis non deserunt mollit aliquip reprehenderit enim aliquip id do non sint nulla in elit in eiusmod voluptate fugiat nostrud fugiat aliquip proident do ut cupidatat qui minim sunt non deserunt non sunt officia in exercitation incididunt esse elit culpa elit sunt eiusmod voluptate labore consectetur elit eiusmod Ut nulla et eiusmod aliquip ut est do amet proident commodo ex tempor incididunt id est nisi in enim Duis amet Excepteur irure aliquip culpa aute veniam dolore qui ea aliqua ea magna fugiat.',
        'image' => "/images/posts/img_0".$i.".jpg"
      ]);
    }

    for($i = 1; $i < 6; $i++) {
      Post::create([
        'id' => $i + 50,
        'category_id' => 11,
        'title' => 'Thước lỗ ban '.$i,
        'summary' => 'Lorem ipsum Occaecat fugiat amet quis dolore id eu in labore velit eiusmod in exercitation laborum id ad ullamco Duis eu culpa irure aliquip ut sit reprehenderit reprehenderit anim exercitation non elit culpa occaecat eiusmod cupidatat occaecat dolore sint ut ullamco exercitation ad sunt Excepteur esse minim aliqua qui reprehenderit culpa ut esse ut sit eiusmod amet eiusmod aliquip in cillum et enim qui veniam in sed amet officia mollit in ea enim eu sit cupidatat Ut ut officia voluptate cupidatat fugiat veniam et quis sit in aliqua sed reprehenderit anim eu nostrud cillum ad magna sed id proident non incididunt dolor eu labore dolor dolore aute aliqua laboris officia pariatur cillum fugiat officia eiusmod anim laboris ad proident consectetur aliqua et sit mollit in cillum Excepteur in officia cupidatat tempor non ut ex veniam dolor irure dolore anim reprehenderit ea ut laboris voluptate nostrud quis non deserunt mollit aliquip reprehenderit enim aliquip id do non sint nulla in elit in eiusmod voluptate fugiat nostrud fugiat aliquip proident do ut cupidatat qui minim sunt non deserunt non sunt officia in exercitation incididunt esse elit culpa elit sunt eiusmod voluptate labore consectetur elit eiusmod Ut nulla et eiusmod aliquip ut est do amet proident commodo ex tempor incididunt id est nisi in enim Duis amet Excepteur irure aliquip culpa aute veniam dolore qui ea aliqua ea magna fugiat.',
        'image' => "/images/posts/img_0".$i.".jpg"
      ]);
    }
  }

}