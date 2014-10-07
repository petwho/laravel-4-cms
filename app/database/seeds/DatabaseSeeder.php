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

class ProjectsTableSeeder extends Seeder {

  public function run()
  {
    DB::table('projects')->delete();

    for($i = 0; $i < 20; $i++) {
      Project::create([
        'name' => 'TÊN DỰ ÁN '.$i,
        'image' => '/images/index/img_pj0'.($i % 4 + 1).'.jpg'
      ]);
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
      ),
      array(
        'id' => 2,
        'name' => 'Làm việc với chuyên gia',
      ),
      array(
        'id' => 3,
        'name' => 'Chọn vật liệu xây dựng',
      ),
      array(
        'id' => 4,
        'name' => 'Xây dựng phần thô',
      ),
      array(
        'id' => 5,
        'name' => 'Xây dựng hoàn thiện',
      ),
      array(
        'id' => 6,
        'name' => 'Kiểm tra nghiệm thu',
      ),
      array(
        'id' => 7,
        'name' => 'Cẩm nang xây nhà',
      ),
    ));
  }
}


class PostsTableSeeder extends Seeder {

  public function run()
  {
    DB::table('posts')->delete();

    for($i = 1; $i < 9; $i++) {
      Post::create([
        'id' => $i,
        'category_id' => 1,
        'title' => '10 LƯU Ý KHI MUA NHÀ',
        'summary' => 'The key to driving this engagement is to ensure that we value design in the right way, not simply as a template, theme or color scheme but as a support system for key content. We can use design to make a website unique and more memorable. We do this by laying the foundation of a good impression, enabling smooth and meaningful consumption, and encouraging engagement with the content. All three of these areas are opportunities to drive a user experience that is in harmony with our content.',
        'image' => "/images/gioithieu/img_0".$i.".jpg"
      ]);
    }
  }

}