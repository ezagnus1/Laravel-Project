<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::list();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //
        //return $request->get('title');

        /*$this->validate($request, [
           'title'=>'required',
        ]);*/

        $post = new Post();

        $post->title = $request->title;
        $post->save();

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
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
        $post = Post::findOrFail($id);

        $post->update(['title' => $request->get('title')]);

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::whereId($id)->delete();

        return redirect('/posts');
    }

    public function contact()
    {
        $people = ['Ege', 'Betul', 'Sefa', 'Ali', 'Mete'];

        return view('contact', compact('people'));
    }

    public function show_posts($id, $name, $password)
    {
        return view('posts', compact('id', 'name', 'password'));
    }

    public function insert_posts() {
        /*DB::table('posts')->insert(
            ['title' => 'PHP Laravel Course', 'brand' => 'This course is awesome!!']
        );*/ /*THIS METHOD WRITTEN USING QUERY BUILDER*/

        /*DB::insert('insert into posts(title, brand) values(?, ?)', ['PHP LARAVEL', 'IT IS THE BEST THING']);*/
            /*FOR RAW QUERIES*/
    }

    public function read_posts() {
        $results = DB::select('select title, is_admin from posts where id = ?', ['1']);

        foreach ($results as $result) {
            return $result;
        }
    }

    public function update_posts() {
        $updated = DB::update('update posts set title = "Ege selam" where id = ?', [1]);

        return $updated;
    }

    public function delete_posts() {
        $deleted = DB::delete('delete from posts where id = ?', [2]);

        return $deleted;
    }
}
