<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BookController extends Controller
{
    public function create(Request $request, $id)
    {
        $book = new Book();
        $book->user_id = Auth::user()->books;
        $book->aboniments = $request->aboniments;
        $book->tarif = $request->tarif;
        $book->save();
        return  redirect()->back();
    }

    public function index(Request $request)
    {
        $users = User::paginate(10);
        return view('admin', ['users'=>$users]);
    }

    public function user(Request $request)
    {
        $users = auth()->user();
        return view('user', ['users'=>$users]);
    }

    public function add_photo(Request $request, $id)
    {
        if ($request->file('images') != null){
            foreach ($request->file('images') as $image) {
                $booksImage = new Book();
                $name = $image->getClientOriginalName();
                $path = 'images/books/'.$id.'/';
                $image->move($path, $name);
                $booksImage->books_id = $id;
                $booksImage->image_path = $path.$name;
                $booksImage->save();
            }
        }
        return  redirect()->back();
    }
}
