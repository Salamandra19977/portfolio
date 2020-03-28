<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::all()->random(3);
        foreach (\App\Models\Work::all() as $work) {
            foreach ($users as $user){
                factory(\App\Models\Comment::class,1)->create([
                    'user_id' => $user->id,
                    'work_id' => $work->id
                ]);
            }
        }
    }
}
