<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Plest;
use App\Question;
use Auth;
use Exception;
use File;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class PlestsQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Plest $plest)
    {
        \Log::info($plest);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Plest $plest)
    {
        $plest->load('questions.answers');

        return view('new-question', [
            'plest' => $plest
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Plest $plest, Request $request)
    {
        $question = new Question(['title' => $request->input('title')]);

        $plest->add($question);

        foreach ($request->input('answers') as $index => $answer) {
            $question->add(new Answer(['text' => $answer]));
        }

        if ( ! File::exists($plest->path)) {
            throw new Exception("Invalid File");
        }

        $file = File::get($plest->path . '/data.js');
        $file = preg_replace('/{{question_1}}/i', $question->title, $file);
        $file = preg_replace('/{{answer_1_1}}/i', $question->answers[0]->text, $file);
        $file = preg_replace('/{{answer_1_2}}/i', $question->answers[1]->text, $file);
        $file = preg_replace('/{{answer_1_3}}/i', $question->answers[2]->text, $file);
        $file = preg_replace('/{{answer_1_4}}/i', $question->answers[3]->text, $file);

        File::put($plest->path . '/data.js', $file);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plest $plest)
    {
        \Log::info($plest);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Plest $plest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plest $plest, $id)
    {
        return view('new-question', ['plest' => $plest]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
