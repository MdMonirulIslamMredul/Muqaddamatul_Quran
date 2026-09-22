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
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'nullable',
            'title_bn' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'book_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'pdf_file' => 'nullable|mimes:pdf|max:51200',
        ]);

        $imageNameOne = null;
        if ($request->hasFile('book_image') && $request->file('book_image')->isValid()) {
            $imageNameOne = time().'_'.uniqid().'.'.$request->book_image->extension();
            $request->book_image->move(public_path('book_image'), $imageNameOne);
        }

        $imageNameTwo = null;
        if ($request->hasFile('pdf_file') && $request->file('pdf_file')->isValid()) {
            $imageNameTwo = time().'_'.uniqid().'.'.$request->pdf_file->extension();
            $request->pdf_file->move(public_path('pdf_file'), $imageNameTwo);
        }

        Book::create([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id ?: null,
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
        $book = Book::with(['bookCategory', 'bookSubcategory'])->findOrFail($id);
        return view('admin.book.show', compact('book'));
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
        $book = Book::findOrFail($id);

        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'nullable',
            'title_bn' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'book_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'pdf_file' => 'nullable|mimes:pdf|max:51200',
        ]);

        if ($request->hasFile('book_image') && $request->file('book_image')->isValid()) {
            if ($book->book_image && file_exists(public_path('book_image/' . $book->book_image))) {
                @unlink(public_path('book_image/' . $book->book_image));
            }
            $imageNameOne = time().'_'.uniqid().'.'.$request->book_image->extension();
            $request->book_image->move(public_path('book_image'), $imageNameOne);
            $book->book_image = $imageNameOne;
        }

        if ($request->hasFile('pdf_file') && $request->file('pdf_file')->isValid()) {
            if ($book->pdf_file && file_exists(public_path('pdf_file/' . $book->pdf_file))) {
                @unlink(public_path('pdf_file/' . $book->pdf_file));
            }
            $imageNameTwo = time().'_'.uniqid().'.'.$request->pdf_file->extension();
            $request->pdf_file->move(public_path('pdf_file'), $imageNameTwo);
            $book->pdf_file = $imageNameTwo;
        }

        $book->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id ?: null,
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
        $book = Book::findOrFail($id);

        if ($book->book_image && $book->book_image != 'default_product.jpg') {
            $imagePath = public_path('book_image/' . $book->book_image);
            if (file_exists($imagePath)) {
                @unlink($imagePath);
            }
        }

        if ($book->pdf_file && $book->pdf_file != 'default_product.jpg') {
            $pdfPath = public_path('pdf_file/' . $book->pdf_file);
            if (file_exists($pdfPath)) {
                @unlink($pdfPath);
            }
        }

        $book->delete();

        return redirect()->back()->with('error', 'Book Deleted Successfully');
    }

    public function getBookSubcategory($category_id)
    {
        $subcategories = Booksubcategory::select(['id', 'subcategory_name', 'subcategory_name_ban'])->where('category_id', $category_id)->get();
        return response()->json($subcategories);
    }
}
