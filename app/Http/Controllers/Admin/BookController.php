<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Bookcategory;
use Illuminate\Http\Request;
use App\Models\Booksubcategory;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::latest('id')->with(['bookCategory', 'bookSubcategory'])->paginate(100);
        $categories = Bookcategory::get();

        return view('admin.book.book', compact('books', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $imageNameOne = null;
        // Check if a company book image is uploaded
        if ($request->hasFile('book_image') && $request->file('book_image')->isValid()) {
            // Generate a unique name for the image
            $imageNameOne = time().'.'.$request->book_image->extension();
            // Move the uploaded file to a public directory
            $request->book_image->move(public_path('book_image'), $imageNameOne);
        }
        $imageNameTwo = null;
        // Check if a company book image is uploaded
        if ($request->hasFile('pdf_file') && $request->file('pdf_file')->isValid()) {
            // Generate a unique name for the image
            $imageNameTwo = time().'.'.$request->pdf_file->extension();
            // Move the uploaded file to a public directory
            $request->pdf_file->move(public_path('pdf_file'), $imageNameTwo);
        }

        Book::create([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'title_en' => $request->title_en,
            'title_bn' => $request->title_bn,
            'title_ab' => $request->title_ab,
            'des_en' => $request->des_en,
            'des_bn' => $request->des_bn,
            'des_ab' => $request->des_ab,
            'book_image' => $imageNameOne,
            'pdf_file' => $imageNameTwo,
        ]);

        return redirect()->back()->with('message', 'Book Created Successfully 🙂');

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
        $book = Book::where('id', $id)->first();
        $categories = Bookcategory::get();

        return view('admin.book.edit', compact('book', 'categories'));
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
        // dd($request->all());

        $book = Book::findOrFail($id);
        // $jobcircular = JobCircular::findOrFail($id);

        // Update image if a new one is provided
        if ($request->hasFile('book_image') && $request->file('book_image')->isValid()) {
            // Delete the old image
            if ($book->book_image) {
                unlink('book_image/' . $book->book_image);
            }
            // Upload new image
            $imageNameOne = time().'.'.$request->book_image->extension();
            $request->book_image->move(public_path('book_image'), $imageNameOne);
            $book->book_image = $imageNameOne;
        }
        if ($request->hasFile('pdf_file') && $request->file('pdf_file')->isValid()) {
            // Delete the old image
            if ($book->pdf_file) {
                unlink('pdf_file/' . $book->pdf_file);
            }
            // Upload new image
            $imageNameTwo = time().'.'.$request->pdf_file->extension();
            $request->pdf_file->move(public_path('pdf_file'), $imageNameTwo);
            $book->pdf_file = $imageNameTwo;
        }

        $book->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'title_en' => $request->title_en,
            'title_bn' => $request->title_bn,
            'title_ab' => $request->title_ab,
            'des_en' => $request->des_en,
            'des_bn' => $request->des_bn,
            'des_ab' => $request->des_ab,
        ]);

        return redirect()->route('books.index')->with('message', 'Book Updated Successfully 🙂');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::where('id', $id)->first();
        if($book->book_image != 'default_product.jpg'){
            $photo_location_one = 'book_image/'.$book->book_image;
            unlink($photo_location_one);
        }
        if($book->pdf_file != 'default_product.jpg'){
            $photo_location_one = 'pdf_file/'.$book->pdf_file;
            unlink($photo_location_one);
        }
        $book->delete();

        return redirect()->back()->with('error', 'Book Deleted Successfully');
    }

    public function getBookSubcategory($category_id)
    {
        $subcategories = Booksubcategory::select(['id', 'subcategory_name'])->where('category_id', $category_id)->get();
        return response()->json($subcategories);
    }
}
