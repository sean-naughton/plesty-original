<?php

use App\Plest;
use App\Question;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PlestTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_has_a_name()
    {
        $plest = new Plest(['name' => 'Vikings']);

        $this->assertEquals('Vikings', $plest->name);
    }

    // Refactor
    public function it_has_a_creator()
    {
        $user = factory(User::class)->create();

        $plest = factory(Plest::class)->create(['user_id' => $user->id]);

        $user->createPlest($plest);

        $this->assertEquals($user->id, $plest->user_id);
    }
    
    /** @test */
    public function it_can_add_questions()
    {
        $plest = factory(Plest::class)->create();

        $question = factory(Question::class)->create();
        $question2 = factory(Question::class)->create();

        $plest->add($question);
        $plest->add($question2);

        $this->assertEquals(2, $plest->countQuestions);
    }
    
    /** @test */
    public function it_has_a_default_first_question()
    {
        $user = factory(User::class)->create();
        
    }

    public function a_plest_has_a_creator()
    {
        $this->assertTrue(true);
    }

    public function it_copies_the_engine_directory()
    {
        
    }
}
