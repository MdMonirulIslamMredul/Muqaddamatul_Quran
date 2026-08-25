<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.department.department',[
        'departments'=>Department::latest()->get(),
       ]);
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
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_bn' => 'required|string|max:255',
            'des_en' => 'required|string',
            'des_bn' => 'required|string',
            'des2_en' => 'nullable|string',
            'des2_bn' => 'nullable|string',
            'thumbnil_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file uploads
        $images = [];
        foreach (['thumbnil_img', 'image1', 'image2', 'image3'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $file = $request->file($imageField);
                $filename = time() . '_' . $imageField . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/'), $filename);
                $images[$imageField] = $filename;
            } else {
                $images[$imageField] = null;
            }
        }

        // Create the department
        $department = new Department();
        $department->title_en = $request->input('title_en');
        $department->title_bn = $request->input('title_bn');
        $department->des_en = $request->input('des_en');
        $department->des_bn = $request->input('des_bn');
        $department->des2_en = $request->input('des2_en');
        $department->des2_bn = $request->input('des2_bn');
        $department->thumbnil_img = $images['thumbnil_img'];
        $department->image1 = $images['image1'];
        $department->image2 = $images['image2'];
        $department->image3 = $images['image3'];
        $department->save();

        return redirect()->back()->with('message', 'Department created successfully.');
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
        $department=Department::findOrFail($id);
        return view('admin.department.department_edit',[
            'department'=>$department,
        ]);
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
            'title_en' => 'required|string|max:255',
            'title_bn' => 'required|string|max:255',
            'des_en' => 'required|string',
            'des_bn' => 'required|string',
            'des2_en' => 'nullable|string',
            'des2_bn' => 'nullable|string',
            'thumbnil_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the department by ID
        $department = Department::findOrFail($id);

        // Handle file uploads and update the department record
        foreach (['thumbnil_img', 'image1', 'image2', 'image3'] as $imageField) {
            if ($request->hasFile($imageField)) {
                // Delete the old image
                if ($department->$imageField) {
                    unlink(public_path('images/') . $department->$imageField);
                }

                // Upload the new image
                $file = $request->file($imageField);
                $filename = time() . '_' . $imageField . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/'), $filename);
                $department->$imageField = $filename;
            }
        }

        // Update other fields
        $department->title_en = $request->input('title_en');
        $department->title_bn = $request->input('title_bn');
        $department->des_en = $request->input('des_en');
        $department->des_bn = $request->input('des_bn');
        $department->des2_en = $request->input('des2_en');
        $department->des2_bn = $request->input('des2_bn');
        $department->save();

        return redirect()->back()->with('message', 'Department updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the department by ID
        $department = Department::findOrFail($id);

        // Delete associated images
        foreach (['thumbnil_img', 'image1', 'image2', 'image3'] as $imageField) {
            if ($department->$imageField) {
                unlink(public_path('images/') . $department->$imageField);
            }
        }

        // Delete the department
        $department->delete();

        return redirect()->back()->with('message', 'Department deleted successfully.');
    }

}
