<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest('id')->paginate(1000);
        return view('admin.category.category', compact('categories'));
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
       // Validate the request
    // $request->validate([
    //     'category_name' => 'required|string|max:255',
    //     'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    // ]);

    // Handle the file upload
    if ($request->hasFile('img')) {
        $file = $request->file('img');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $filename);
    }

    // Create the category
    $category = new Category();
    $category->category_name = $request->input('category_name');
    $category->category_name_ban = $request->input('category_name_ban');
    $category->category_name_ab= $request->input('category_name_ab');
    $category->img= $filename; // Assuming you have an 'image' column in your categories table
    $category->save();

    // Redirect or return success response
    return redirect()->back()->with('message', 'Category created successfully.');

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
        $category = Category::where('id', $id)->first();

        return view('admin.category.edit', compact('category'));
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
        // Validate the request
        $request->validate([
            'category_name' => 'required|string|max:255',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the category
        $category = Category::findOrFail($id);

        // Handle the file upload
        if ($request->hasFile('img')) {
            // Delete the old image
            if ($category->image && file_exists(public_path('images/' . $category->image))) {
                unlink(public_path('images/' . $category->image));
            }

            // Upload the new image
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/'), $filename);
            $category->img = $filename;
        }

        // Update the category attributes
        $category->category_name = $request->input('category_name');
        $category->category_name_ban = $request->input('category_name_ban');
        $category->category_name_ab = $request->input('category_name_ab');
        $category->save();

        // Redirect or return success response
        return redirect()->route('categories.index')->with('message', 'Category updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the category
        $category = Category::findOrFail($id);

        // Delete the image file
        if ($category->image && file_exists(public_path('images/' . $category->image))) {
            unlink(public_path('images/' . $category->image));
        }

        // Delete the category
        $category->delete();

        // Redirect or return success response
        return redirect()->back()->with('message', 'Category deleted successfully.');
    }

}
