<?php

namespace Tests\Acceptance;

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_can_login()
    {
        $user = factory(User::class)->create([
            'email' => 'ragnar@example.com',
            'password' => bcrypt('thorisgod'),
        ]);

        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('thorisgod', 'password')
            ->press('Login')
            ->seePageIs('/home');
    }

    /** @test */
    public function it_is_redirect_to_login_if_the_credentials_are_wrong()
    {
        $user = factory(User::class)->create([
            'email' => 'ragnar@example.com',
            'password' => bcrypt('thorisgod'),
        ]);

        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('thorisgo', 'password')
            ->press('Login')
            ->seePageIs('/login');
    }
    
    /** @test */
    public function it_receives_an_error_message_when_credentials_are_wrong()
    {
        $user = factory(User::class)->create([
            'email' => 'ragnar@example.com',
            'password' => 'thorisgod',
        ]);

        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('thorisgo', 'password')
            ->press('Login')
            ->see('credentials do not match');
    }
}
