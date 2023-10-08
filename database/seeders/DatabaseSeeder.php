<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1,['email'=>'admin@admin.ru', 'name'=>'admin'])->create();
        \App\Models\User::factory(1,['email'=>'user@user.ru', 'name'=>'user'])->create();
    }
}
