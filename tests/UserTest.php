<?php

use App\Answer;
use App\Question;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    /** @test */
    public function it_can_attempt_to_answer_a_question()
    {
        $this->actingAs($this->user);

        $question = factory(Question::class)->create();
        $answer = factory(Answer::class)->make();
        $question->add($answer);

        $question->attempt($answer->id);

        $this->assertEquals($this->user->id, $question->attempts()->first()->user_id);
    }
}
