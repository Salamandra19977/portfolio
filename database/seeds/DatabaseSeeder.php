<?php

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
        $this->call(RolesTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(WorksTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(AssessmentsTableSeeder::class);
        $this->call(ViewsTableSeeder::class);
    }
}
