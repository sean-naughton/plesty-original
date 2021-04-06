<?php

namespace App\Http\Controllers;

use App\Plest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class PlestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plests = Plest::orderBy('created_at', 'ASC')->get();

        return view('plests', compact('plests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new-plest');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $plest = $user->createPlest($request);

        return redirect('/plests/' . $plest->id . '/questions/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plest $plest)
    {
        if(count($plest->questions) > 0) {
            return redirect('/questions/' . $plest->questions->last()->id . '/edit');
        }

        return redirect("/plests/$plest->id/questions/create");
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

    public function favorites()
    {
        $plests = Plest::whereHas('favorites', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();

        return view('plests.favorites', compact('plests'));
    }
}
