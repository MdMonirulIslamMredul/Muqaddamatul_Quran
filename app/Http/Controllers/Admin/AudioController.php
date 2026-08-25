<?php

namespace App\Http\Controllers\Admin;

use App\Models\Audio;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AudioStoreUpdateRequest;
use App\Http\Requests\AudioUpdateRequest;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audios = Audio::latest('id')->with(['category', 'subcategory'])->paginate(100);
        $categories = Category::get();

        return view('admin.audio.audio', compact('audios', 'categories'));
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
    public function store(AudioStoreUpdateRequest $request)
    {
        // dd($request->all());

        $imageNameOne = null;
        // Check if a company logo is uploaded
        if ($request->hasFile('audio_file') && $request->file('audio_file')->isValid()) {
            // Generate a unique name for the image
            $imageNameOne = time().'.'.$request->audio_file->extension();
            // Move the uploaded file to a public directory
            $request->audio_file->move(public_path('audio_file'), $imageNameOne);
        }


        // Handle thumbnail image upload
    $thumbnil = null;
    if ($request->hasFile('thumbnil_img') && $request->file('thumbnil_img')->isValid()) {
        $thumbnil = time() . '.' . $request->thumbnil_img->extension();
        $request->thumbnil_img->move(public_path('thumbnails'), $thumbnil);
    }

        Audio::create([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'title_en' => $request->title_en,
            'title_bn' => $request->title_bn,
            'title_ab' => $request->title_ab,
            'thumbnil_img' => $thumbnil,
            'des_en' => $request->des_en,
            'des_bn' => $request->des_bn,
            'des_ab' => $request->des_ab,
            'audio_file' => $imageNameOne,
        ]);

        return redirect()->back()->with('message', 'Audio Created Successfully 🙂');
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
        $audio = Audio::where('id', $id)->first();
        $categories = Category::get();
        $subcategories = Subcategory::get();

        return view('admin.audio.edit', compact('audio', 'categories', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AudioUpdateRequest $request, $id)
    {
        // dd($request->all());
        $audio = Audio::where('id', $id)->first();

        // Update image if a new one is provided
        if ($request->hasFile('audio_file') && $request->file('audio_file')->isValid()) {
            // Delete the old image
            if ($audio->audio_file) {
                unlink('audio_file/' . $audio->audio_file);
            }
            // Upload new image
            $imageNameOne = time().'.'.$request->audio_file->extension();
            $request->audio_file->move(public_path('audio_file'), $imageNameOne);
            $audio->audio_file = $imageNameOne;
        }

        // Update thumbnail image
    if ($request->hasFile('thumbnil_img') && $request->file('thumbnil_img')->isValid()) {
        // Delete the old image
        if ($audio->thumbnil_img) {
            // Ensure the path is correct and matches the location where images are stored
            $oldImagePath = public_path('thumbnails/' . $audio->thumbnil_img);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Upload new image
        $thumbnil_image = time() . '.' . $request->thumbnil_img->extension();
        $request->thumbnil_img->move(public_path('thumbnails'), $thumbnil_image);
        $audio->thumbnil_img = $thumbnil_image;
    }

        $audio->update([
            // 'category_id' => $request->category_id,
            // 'subcategory_id' => $request->subcategory_id,
            'title_en' => $request->title_en,
            'title_bn' => $request->title_bn,
            'title_ab' => $request->title_ab,
            'des_en' => $request->des_en,
            'des_bn' => $request->des_bn,
            'des_ab' => $request->des_ab,
        ]);

        return redirect()->route('audios.index')->with('message', 'Audio Updated Successfully 🙂');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $audio = Audio::where('id', $id)->first();
        if($audio->audio_file != 'default_product.jpg'){
            $photo_location_one = 'audio_file/'.$audio->audio_file;
            unlink($photo_location_one);
        }
        $audio->delete();

        return redirect()->back()->with('message', 'Audio Deleted Successfully 🙂');

    }

    public function getSubcategory($category_id)
    {
        $subcategories = Subcategory::select(['id', 'subcategory_name'])->where('category_id', $category_id)->get();
        return response()->json($subcategories);
    }
}
