<?php

namespace App\Http\Controllers;

use App\Sentence;
use App\Category;
use Illuminate\Http\Request;
use Auth;

class SentenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sentences.index')->with('sentences', Auth::user()->sentences);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sentences.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required'
        ]);

        $sentence = Sentence::create([
            'name' => $request->name,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        flash('Votre phrase a été créée avec succès !')->success();
        return redirect()->route('sentences.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function show(Sentence $sentence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function edit(Sentence $sentence)
    {
        return view('sentences.edit')->with('categories', Category::all())->with('sentence', $sentence);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sentence $sentence)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required'
        ]);

        $sentence->name = $request->name;
        $sentence->content = $request->content;
        $sentence->save();

        flash('Votre phrase à été mise à jour !')->success();
        return redirect()->route('sentences.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sentence $sentence)
    {
        $sentence->delete();

        flash('La phrase a été supprimé avec succès !')->success();
        return redirect()->back();
    }
}
