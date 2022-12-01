<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Favourite;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name=$request->session()->get('find_book',null);
        $books=Book::findByName($name)->get();
        return view('books.index',[
            'books'=>$books,
            'findBook'=>$name,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.edit',['categories'=>Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, Book $book)
    {
        Book::create($request->all());
        $img=$request->file('img');
        $filename=$book->id.  '.'. $img->extension();
        $book->img=$filename;
        $img->storeAs('public/books',$filename);
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit',[
                    'book'=>$book,
                    'categories'=>Category::all()
                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->fill($request->all());
        $img=$request->file('img');
        $filename=$book->id.  '.'. $img->extension();
        $book->img=$filename;
        $img->storeAs('public/books',$filename);
        $book->save();
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }

    public function findBooks(Request $request)
    {
        $request->session()->put('find_book',$request->name);
        return redirect()->route('books.index');
    }


}
