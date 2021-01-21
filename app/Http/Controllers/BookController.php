<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Book::all();
        return view('index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
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
        $InData = $request->validate([
            'title'=>'required|max:255',
            'author'=>'required|max:255',
            'desc'=>'max:255',
            'series'=>'max:255',
            'country'=>'max:255'
            ]);
        $book = Book::create($InData);
        return redirect('/books');    
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
        $books = Book::findOrFail($id);
        return view('edit', compact('books'));
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
        $UpdateData = $request->validate([
            'title'=>'required|max:255',
            'author'=>'required|max:255',
            'desc'=>'max:255',
            'series'=>'max:255',
            'country'=>'max:255'
            ]);
        
            Book::whereId($id)->update($UpdateData);
            return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $books = Book::findOrFail($id);
        $books->delete();

        return ('/books');
    }
}
