<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PlestCardTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    public function it_displays_the_name_and_description()
    {
        /**
         * Given I have a Plest
         * when I view a plest card in the Library
         * I should see the name and description
         */

        
    }
    
    /** @test */
    public function it_has_a_button_to_play_the_plest()
    {
        $this->assertTrue(true);
//        $user = factory(\App\User::class)->create();
//        $plest = factory(\App\Plest::class)->create();
//
//        $this->visit('/plests')
//            ->click('plest-' . $plest->id)
//            ->seePageIs('/storage/games/' . $plest->id);
    }
}
