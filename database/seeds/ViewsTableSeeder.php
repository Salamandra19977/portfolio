<?php

use Illuminate\Database\Seeder;

class ViewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Models\Work::all() as $work) {
            factory(\App\Models\View::class,5)->create([
                'work_id' => $work->id
            ]);
        }
    }
}
