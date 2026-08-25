<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tv;
use App\Models\Tvcategory;
use Illuminate\Http\Request;
use App\Models\Tvsubcategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\TvStoreRequest;
use App\Http\Requests\TvUpdateRequest;

class TvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tvs = Tv::latest('id')->with(['tvCategory', 'tvSubcategory'])->paginate(100);
        // $categories = Tvcategory::get();

        // return view('admin.tv.tv', compact('tvs', 'categories'));

        return view('admin.tv.tv',[
           'tv'=>Tv::latest()->first(),
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
    // public function store(TvStoreRequest $request)
    // {
    //     // dd($request->all());

    //     $imageNameOne = null;
    //     // Check if a Video file is uploaded
    //     if ($request->hasFile('file_upload') && $request->file('file_upload')->isValid()) {
    //         // Generate a unique name for the image
    //         $imageNameOne = time().'.'.$request->file_upload->extension();
    //         // Move the uploaded file to a public directory
    //         $request->file_upload->move(public_path('file_upload'), $imageNameOne);
    //     }
    //     Tv::create([
    //         'category_id' => $request->category_id,
    //         'subcategory_id' => $request->subcategory_id,
    //         'title_en' => $request->title_en,
    //         'title_bn' => $request->title_bn,
    //         'title_ab' => $request->title_ab,
    //         'embed_video' => $request->embed_video,
    //         'file_upload' => $imageNameOne,
    //     ]);

    //     return redirect()->back()->with('message', 'Video Created Successfully 🙂');
    // }

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
        $tv = Tv::where('id', $id)->first();
        $categories = Tvcategory::get();
        $subcategories = Tvsubcategory::get();

        return view('admin.tv.edit', compact('tv', 'categories', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TvUpdateRequest $request, $id)
    {
        // dd($request->all());
        $tv = Tv::where('id', $id)->first();

        // Update image if a new one is provided
        if ($request->hasFile('file_upload') && $request->file('file_upload')->isValid()) {
            // Delete the old image
            if ($tv->file_upload) {
                unlink('file_upload/' . $tv->file_upload);
            }
            // Upload new image
            $imageNameOne = time().'.'.$request->file_upload->extension();
            $request->file_upload->move(public_path('file_upload'), $imageNameOne);
            $tv->file_upload = $imageNameOne;
        }

        $tv->update([
            'title_en' => $request->title_en,
            'title_bn' => $request->title_bn,
            'short_details_en' => $request->short_details_en,
            'short_details_bn' => $request->short_details_bn,
            'details_en' => $request->details_en,
            'details_bn' => $request->details_bn,
            'embed_video' => $request->embed_video,
        ]);

        return redirect()->route('tvs.index')->with('message', 'Video Updated Successfully 🙂');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tv = Tv::where('id', $id)->first();
        if($tv->file_upload != 'default_product.jpg'){
            $photo_location_one = 'file_upload/'.$tv->file_upload;
            unlink($photo_location_one);
        }
        $tv->delete();

        return redirect()->back()->with('message', 'Video Deleted Successfully 🙂');
    }

    public function getTvSubcategory($category_id)
    {
        $subcategories = Tvsubcategory::select(['id', 'subcategory_name'])->where('category_id', $category_id)->get();
        return response()->json($subcategories);
    }
}
