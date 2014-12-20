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
    $this->call('ProjectsTableSeeder');
    $this->call('CategoriesTableSeeder');
    $this->call('PostsTableSeeder');
    $this->call('MenusTableSeeder');
    $this->call('GalleriesTableSeeder');
    $this->call('GalleryMenuTableSeeder');
    $this->call('ImagesTableSeeder');
    $this->call('PanelsTableSeeder');
    $this->call('TabsTableSeeder');
    $this->call('GalleryTabTableSeeder');
    $this->command->info('All tables seeded!');
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

class PanelsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('panels')->delete();

        Panel::create(array(
          'id' => '1',
          'title' => 'Vật liệu ốp lát',
          'description' => 'Lorem ipsum Consequat veniam in quis aliquip nisi cillum nostrud consequat quis consectetur eu reprehenderit dolore aliqua proident commodo incididunt mollit in elit magna fugiat.'
        ));

        Panel::create(array(
          'id' => '2',
          'title' => 'Thiết bị vệ sinh',
          'description' => 'Lorem ipsum Et ut velit aute velit nisi in sed voluptate tempor consectetur enim amet fugiat amet voluptate pariatur adipisicing veniam do in.'
        ));

        Panel::create(array(
          'id' => '3',
          'title' => 'Cửa',
          'description' => 'Lorem ipsum Aliqua ut dolore in irure veniam ut deserunt irure culpa ut pariatur quis non eu Ut aliquip veniam commodo irure ea Duis deserunt officia fugiat nulla ea sit id incididunt dolor laborum labore fugiat.'
        ));

        Panel::create(array(
          'id' => '4',
          'title' => 'Đèn chiếu sáng',
          'description' => 'Lorem ipsum Pariatur dolore consequat non elit reprehenderit nulla consequat Excepteur elit et cupidatat ullamco irure laborum dolore exercitation nulla in velit ut.'
        ));

        Panel::create(array(
          'id' => '5',
          'title' => 'Vật tư điện',
          'description' => 'Lorem ipsum Dolor nulla ullamco reprehenderit dolore dolor sint dolore culpa dolor qui culpa est commodo cillum enim dolor enim officia est culpa.'
        ));

        Panel::create(array(
          'id' => '6',
          'title' => 'SOFA',
          'description' => 'Lorem ipsum Ad laboris in fugiat id labore proident magna sunt dolor in enim cillum sed tempor labore nisi nisi amet dolor ut cupidatat enim enim esse nulla elit est eu et exercitation non labore commodo eiusmod elit.',
          'is_on_first_page' => false,
        ));

        Panel::create(array(
          'id' => '7',
          'title' => 'BẾP',
          'description' => 'Lorem ipsum Aliquip in in voluptate veniam officia nisi dolore Ut irure dolore sint et eiusmod fugiat sit id mollit est eu dolor pariatur eiusmod consectetur sit commodo sunt in consequat culpa irure dolore in nostrud.',
          'is_on_first_page' => false,
        ));

        Panel::create(array(
          'id' => '8',
          'title' => 'NỘI THẤT',
          'description' => 'Lorem ipsum Nisi et dolore et dolore ullamco sed ut aute qui aliqua sit tempor exercitation id est qui sit sint Duis sed in est nulla quis tempor nisi.',
          'is_on_first_page' => false,
        ));
    }

}

class TabsTableSeeder extends Seeder {
  public function run()
  {
    Db::table('tabs')->delete();
    for ($i = 0; $i < 8; $i++) {
      for ($j = 0; $j < 3; $j++) {
        Tab::create([
          'id' => $i * 3 + $j + 1,
          'title' => 'Tab '.($i + 1) .'.'. ($j +1),
          'panel_id' => $i + 1,
          'position' => $j + 1,
        ]);
      }
    }
  }
}

class GalleryTabTableSeeder extends Seeder {
  public function run()
  {
    DB::table('gallery_tab')->delete();
    for ($i = 0; $i < 24; $i++) {
      GalleryTab::create([
        'gallery_id' => $i + 1,
        'tab_id' => $i + 1
      ]);
    }
  }
}

class GalleriesTableSeeder extends Seeder {

  public function run()
  {
    DB::table('galleries')->delete();

    // Intro page: 14 galleries
    // Inside pages (menus): 6 (home page) + 5 = 11 galleries
    for($i = 0; $i < 20; $i++) {
      if ($i < 14) {
        Gallery::create([
          'id' => $i + 1,
          'title' => 'Gallery '.$i,
          'project_id' => $i + 1
        ]);
      } else if ($i == 14) {
        for ($j = 0; $j < 6; $j++) { // 6 galleries in home page
          Gallery::create([
            'id' => $i + $j + 1,
            'title' => 'Gallery '.$i,
            // 'project_id' => $i + 1 // We don't even need project id
          ]);
        }
      } else {
        Gallery::create([
          'id' => $i + 5 + 1,
          'title' => 'Gallery '.$i,
          // 'project_id' => $i + 1 // We don't even need project id
        ]);
      }
    }
  }

}

class GalleryMenuTableSeeder extends Seeder {

  public function run()
  {
    DB::table('gallery_menu')->delete();

    for($i = 0; $i < 6; $i++) {
      if ($i == 4) { // Ignore Phong Thuy page
        continue;
      }
      if ($i == 0) { // 6 galleries for Home page
        for ($j = 0; $j < 6; $j ++) {
          GalleryMenu::create([
            'menu_id' => $i + 1,
            'gallery_id' => $i + 15 + $j, // Add 15 to ignore galleries for Intro page
          ]);
        }
      } else {
        GalleryMenu::create([
          'menu_id' => $i + 1,
          'gallery_id' => $i + 15 + 5, // Add 15 to ignore intro galleries
        ]);
      }
    }
  }

}

class GalleryPanelTableSeeder extends Seeder {

  public function run()
  {
    DB::table('gallery_panel')->delete();

    for($i = 0; $i < 8; $i++) {
      GalleryPanel::create([
        'panel_id' => $i + 1,
        'gallery_id' => $i + 1,
      ]);
    }
  }

}

class ImagesTableSeeder extends Seeder {

  public function run()
  {
    DB::table('images')->delete();

    // Images on Intro page
    for($i = 0; $i < 14; $i++) {
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

    // Images on inside pages
    $menus = ['index', 'kienthuc', 'gioithieu', 'shopnoithat', 'phongthuy', 'gioithieu'];

    for ($i = 14; $i < 20; $i++) {
      if ($i == 18) { // skip Phong Thuy page
        continue;
      }
      if ($i == 14) { // Images for 6 galleries on Home page
        for ($k = 0; $k < 6; $k++) { // 6 galleries
          for ($j = 0; $j < 30; $j++) { // 30 images each gallery (can be more)
            Image::create([
              'name' => 'Name '.$j,
              'title' => 'title '.$j,
              'url' => '/images/' . $menus[$i - 14] . '/' . 'mv0' . $j . '.jpg',
              'thumb_url' => '/images/' . $menus[$i - 14] . '/thumb_0' . $j . '.jpg',
              'gallery_id' => $i + 1 + $k,
              'subcat' => ($j % 6) + 1,
            ]);
          }
        }
      } else {
        for ($j = 0; $j < 5; $j++) {
          Image::create([
            'name' => 'Name '.$j,
            'title' => 'title '.$j,
            'url' => '/images/' . $menus[$i - 14] . '/' . 'mv0' . $j . '.jpg',
            'thumb_url' => '/images/' . $menus[$i - 14] . '/thumb_0' . $j . '.jpg',
            'gallery_id' => $i + 1 + 5,
          ]);
        }
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
