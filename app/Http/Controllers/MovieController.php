<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Auth\Events\Validated;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $movies = Movie::all();
        return view('movie', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/admin/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $movie = new Movie();
        $validated = $request->validate([
            'title' => 'required|unique:movies',
            'image_url' => 'required|url',
            'published_year' => 'required|integer',
            'is_showing' => 'required|boolean',
            'description' => 'required|max:255'
        ]);
        $is_showing = $request->input('is_showing')==1?true:false;
        $movie->title = $request->input('title');
        $movie->image_url = $request->input('image_url');
        $movie->published_year = $request->input('published_year');
        $movie->is_showing = $is_showing;
        $movie->description = $request->input('description');
        session()->flash('flash_message', '登録が完了しました');
        $movie->save();
        return redirect('/admin/movies');
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
    public function edit($id)
    {
        //
        $movie = Movie::find($id);
        return view('/admin/edit', compact('movie'));
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
        $movie = Movie::find($id);
        $validated = $request->validate([
            'title' => 'required|unique:movies,title,'.$id,
            'image_url' => 'required|url',
            'published_year' => 'required|integer',
            'is_showing' => 'required|boolean',
            'description' => 'required|max:255'
        ]);
        $is_showing = $request->input('is_showing')==1?true:false;
        $movie->title = $request->input('title');
        $movie->image_url = $request->input('image_url');
        $movie->published_year = $request->input('published_year');
        $movie->is_showing = $is_showing;
        $movie->description = $request->input('description');
        session()->flash('flash_message', '登録が完了しました');
        $movie->save();
        return redirect('/admin/movies');
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
        $movie = Movie::find($id);
        if (!$movie) {
            return abort(404);
        }
        $movie->delete();
        session()->flash('flash_message', '削除が完了しました');
        return redirect('/admin/movies');
    }
}
