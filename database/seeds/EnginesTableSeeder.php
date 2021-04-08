<?php

use Illuminate\Database\Seeder;

class EnginesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Engine::class)->create([
            'title' => 'Platformer',
            'folder' => storage_path('app/engines/1'),
        ]);

        factory(App\Engine::class)->create([
            'title' => 'Side Scrolling',
            'folder' => storage_path('app/engines/2'),
        ]);
    }
}
