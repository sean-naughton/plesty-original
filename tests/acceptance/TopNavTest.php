<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TopNavTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_has_a_link_to_the_plests_library()
    {
        $this->actingAs(factory(\App\User::class)->create());

        $this->visit('/home')
            ->click('Library')
            ->seePageIs('/plests');
    }

    /** @test */
    public function it_brings_the_authenticated_user_home_with_a_link()
    {
        $this->actingAs(factory(\App\User::class)->create());

        $this->visit('/plests')
            ->click('My Plests')
            ->seePageIs('/home');
    }
}
