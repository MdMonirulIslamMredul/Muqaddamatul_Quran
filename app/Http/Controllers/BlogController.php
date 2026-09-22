<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BannerAndTitle;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function tech_web_add_blogs()
    {
        return view('admin.blogs.blogs',[
            'blogs'=>Blog::get()
        ]);

    }

    public function tech_web_store_blogs(Request $request)
    {
        Blog::save_blogs($request);
        return back()->with('message','Blogs added successfully');
    }

    public function tech_web_edit_blogs($id)
    {
        return view('admin.blogs.edit_blogs',[
            'blog'=>Blog::find($id),
        ]);
    }

    public function tech_web_update_blogs(Request $request)
    {


        Blog::update_blogs($request);
        return back()->with('message','Blogs update successfully');
    }

    public function tech_web_delete_blogs($id)
    {
        $blog = Blog::find($id);
        if ($blog) {
            $images = [
                $blog->main_image,
                $blog->banner_image,
                $blog->details_image1,
                $blog->details_image2,
                $blog->details_image3,
            ];
            foreach ($images as $image) {
                if ($image && file_exists(public_path($image))) {
                    @unlink(public_path($image));
                }
            }
            $blog->delete();
            return back()->with('message', 'Blog deleted successfully!');
        }
        return back()->with('error', 'Blog not found!');
    }

    public function tech_web_our_blog(){
        $blogs = Blog::get();
        return view('frontend.blogs.blogs');
    }

    // -------------------------blog/new frontend-----------------------------
    public function tech_web_blogs_page(Request $request)
    {
        $query = Blog::where('status', 1);

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('title_bn', 'like', "%{$search}%")
                  ->orWhere('title_ab', 'like', "%{$search}%")
                  ->orWhere('short_details', 'like', "%{$search}%")
                  ->orWhere('short_details_bn', 'like', "%{$search}%")
                  ->orWhere('details1', 'like', "%{$search}%")
                  ->orWhere('details1_bn', 'like', "%{$search}%");
            });
        }

        $blogs = $query->latest()->paginate(9)->withQueryString();
        $banner = BannerAndTitle::where('page', 'news')->latest()->first();
        $recentBlogs = Blog::where('status', 1)->latest()->take(5)->get();

        return view('frontend.blogs.blogs_page', [
            'blogs' => $blogs,
            'banner' => $banner,
            'recentBlogs' => $recentBlogs,
            'search' => $request->search,
        ]);
    }

    public function tech_web_blogs_details($id)
    {
        $blog = Blog::findOrFail($id);
        $recentBlogs = Blog::where('status', 1)->where('id', '!=', $id)->latest()->take(5)->get();
        $prevBlog = Blog::where('status', 1)->where('id', '<', $id)->latest('id')->first();
        $nextBlog = Blog::where('status', 1)->where('id', '>', $id)->oldest('id')->first();
        $banner = BannerAndTitle::where('page', 'news')->latest()->first();

        return view('frontend.blogs.blogs_details', [
            'blog' => $blog,
            'recentBlogs' => $recentBlogs,
            'prevBlog' => $prevBlog,
            'nextBlog' => $nextBlog,
            'banner' => $banner,
        ]);
    }
}
