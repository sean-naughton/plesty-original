<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MyPlestsPageTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_shows_the_authenticated_users_plests()
    {
        $user = factory(\App\User::class)->create();
        $user->plests()->saveMany(factory(\App\Plest::class, 10)->make());

        $this->actingAs($user);

        dd($this->visit('/home'));
//            ->assertCountElements('.plest-card', 10);
    }
}
