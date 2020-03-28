<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Models\Work::all() as $work) {
            factory(\App\Models\Image::class,3)->create([
                'work_id' => $work->id
            ]);
        }
    }
}
