<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bookcategory;
use Illuminate\Http\Request;
use App\Models\Booksubcategory;
use App\Http\Controllers\Controller;

class BookSubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Booksubcategory::latest('id')->paginate(1000);
        $categories = Bookcategory::get();

        return view('admin.book_subcategory.book_subcategory', compact('subcategories', 'categories'));
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

        Booksubcategory::create([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_name_ban' => $request->subcategory_name_ban,
            'subcategory_name_ab' => $request->subcategory_name_ab,
        ]);

        return redirect()->back()->with('message', 'Subcategory Created Successfully 🙂');
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
        $subcategory = Booksubcategory::where('id', $id)->first();
        $categories = Bookcategory::get();
        return view('admin.book_subcategory.edit', compact('subcategory', 'categories'));
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

        $subcategory = Booksubcategory::where('id', $id)->first();
        $subcategory->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_name_ban' => $request->subcategory_name_ban,
            'subcategory_name_ab' => $request->subcategory_name_ab,
        ]);

        return redirect()->route('booksubcategories.index')->with('message', 'Subcategory Updated Successfully 🙂');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $subcategory = Booksubcategory::where('id', $id)->first();
        $subcategory->delete();

        return redirect()->back()->with('message', 'Subcategory Deleted Successfully 🙂');
    }
}
