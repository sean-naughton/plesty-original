<?php

use App\Question;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class QuestionTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_has_a_title()
    {
        $question = new Question(['title' => 'Who is the ruler of Valhalla?']);

        $this->assertEquals('Who is the ruler of Valhalla?', $question->title);
    }

    /** @test */
    public function it_can_add_answers()
    {
        $question = factory(Question::class)->create();

        $answerOne = factory(App\Answer::class)->make();
        $answerTwo = factory(App\Answer::class)->make();

        $question->add($answerOne);
        $question->add($answerTwo);

        $this->assertEquals(2, $question->countAnswers());
    }

    /** @test */
    public function it_belongs_to_a_plest()
    {
        $plest = createPlest();

        $question = createQuestion();

        $plest->add($question);

        $this->assertEquals($plest->id, $question->plest_id);
    }
}
