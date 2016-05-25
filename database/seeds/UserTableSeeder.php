<?php
// Created by dealloc. All rights reserved.

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        factory(\Festival\Entities\Users\User::class)->create([
            'email'    => 'foo@bar.com',
            'password' => bcrypt('foobar'),
            'admin'    => 1,
        ]);

        factory(\Festival\Entities\Users\User::class, 10)->create()->each(function(\Festival\Entities\Users\User $user)
        {
            factory(\Festival\Entities\News\News::class, 4)->make()->each(function(\Festival\Entities\News\News $news) use ($user)
            {
                $user->articles()->save($news);
            });
        });
    }
}