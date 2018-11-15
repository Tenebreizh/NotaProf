<?php

namespace Tests\Unit;

use App\Sentence;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SentenceTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test the creation of a sentence.
     *
     * @return void
     */
    public function testCreateSentence()
    {
        $user = factory('App\User')->create();

        $sentence = Sentence::create([
            'name'    => 'Bad sentence',
            'content' => 'Bla bla bla, then this is  the good content',
            'user_id' => $user->id,
        ]);

        $this->assertDatabaseHas('sentences', [
            'name'    => $sentence->name,
            'content' => $sentence->content,
        ]);
    }

    /**
     * Test the update of a sentence.
     *
     * @return void
     */
    public function testUpdateSentence()
    {
        $fake = factory('App\Sentence')->create();

        $sentence = Sentence::findOrFail($fake->id);
        $sentence->name = 'New name';
        $sentence->content = 'New content';
        $sentence->save();

        $this->assertDatabaseHas('sentences', [
            'name'    => 'New name',
            'content' => 'New content',
        ]);
    }

    /**
     * Test the suppresion of a sentence.
     *
     * @return void
     */
    public function testDeleteSentence()
    {
        $fake = factory('App\Sentence')->create();

        $sentence = Sentence::findOrFail($fake->id);
        $sentence->delete();

        $this->assertDatabaseMissing('sentences', [
            'name'    => $fake->name,
            'content' => $fake->content,
        ]);
    }
}
