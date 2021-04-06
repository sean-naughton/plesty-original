<?php

namespace Tests\Acceptance;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use TestCase;

class PlestsLibraryTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_shows_all_plests()
    {
        $this->withoutMiddleware();
        /**
         * Given I have multiple users
         * and they each have their own plests
         * 
         * when I visit the plest library
         *
         * I should see all plests for all users  
         */

        factory(\App\User::class, 2)->create()->each(function($user) {
            $user->plests()->saveMany(factory(\App\Plest::class, 10)->make());
        });

        $this->visit('/plests')
            ->assertCountElements('.plest-card', 20);
    }
}
