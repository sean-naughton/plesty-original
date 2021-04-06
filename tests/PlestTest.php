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
    public function it_has_a_name_and_description()
    {
        $plest = new Plest([
            'name' => 'Vikings',
            'description' => 'In Valhalla, only one god can reign supreme. Find out in the great Plest, Vikings.'
        ]);

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

    /** @test */
    public function it_can_be_favorited_by_an_authenticated_user()
    {
        $user = factory(User::class)->create();
        $plest = factory(Plest::class)->create();

        $this->actingAs($user);

        $plest->favorite();

        $this->seeInDatabase('favorites', [
            'user_id' => $user->id,
            'favoritable_id' => $plest->id,
            'favoritable_type' => get_class($plest),
        ]);

        $this->assertTrue($plest->isFavorited());
    }
}
