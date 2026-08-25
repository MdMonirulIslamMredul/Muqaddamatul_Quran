<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bookcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Bookcategory::latest('id')->paginate(1000);
        return view('admin.book_category.book_category', compact('categories'));
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
        Bookcategory::create([
           'category_name' => $request->category_name,
           'category_name_ban' => $request->category_name_ban,
           'category_name_ab' => $request->category_name_ab,
        ]);

        return redirect()->back()->with('message', 'Category Created Successfully 🙂');
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
        $category = Bookcategory::where('id', $id)->first();
        return view('admin.book_category.edit', compact('category'));
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
        $category = Bookcategory::where('id', $id)->first();
        $category->update([
            'category_name' => $request->category_name,
            'category_name_ban' => $request->category_name_ban,
            'category_name_ab' => $request->category_name_ab,
        ]);

        return redirect()->route('bookcategories.index')->with('message', 'Category Updated Successfully 🙂');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Bookcategory::where('id', $id)->first();
        $category->delete();

        return redirect()->back()->with('message', 'Category Deleted Successfully 🙂');
    }
}
