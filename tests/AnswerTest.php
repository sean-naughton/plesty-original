<?php

use App\Answer;
use App\Exceptions\AnswerAlreadyOnQuestion;
use App\Question;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnswerTest extends TestCase
{
    use DatabaseTransactions;
    
    /** @test */
    public function it_belongs_to_a_question()
    {
        $question = factory(Question::class)->create();
        $answer = factory(Answer::class)->make();

        $question->add($answer);
        $answer->load('question');

        $this->assertEquals($question->id, $answer->question->id);
    }
    
    /** @test */
    public function it_can_only_be_added_to_one_question()
    {
        $questionOne = factory(Question::class)->create();
        $questionTwo = factory(Question::class)->create();
        $answer = factory(Answer::class)->make();

        $this->setExpectedException(AnswerAlreadyOnQuestion::class);

        $questionOne->add($answer);
        $questionTwo->add($answer);
    }
    
    /** @test */
    public function it_is_right_or_wrong()
    {
        $rightAnswer = factory(Answer::class, 'withQuestion')->create(['correct' => true]);
        $wrongAnswer = factory(Answer::class, 'withQuestion')->create(['correct' => false]);

        $this->assertTrue($rightAnswer->correct);
        $this->assertFalse($wrongAnswer->correct);
    }
}
