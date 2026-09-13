<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'add_home',
        'status',
    ];

    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_gallery($request)
    {
        self::$data = new Gallery();
        self::$data->title = $request->title ?? null;
        self::$data->description = $request->description ?? null;
        self::$data->add_home = $request->add_home ?? null;
        if ($request->hasFile('image')) {
            self::$data->image = self::saveImage($request);
        }
        self::$data->save();
    }
    public static function update_gallery($request)
    {
        self::$data = Gallery::find($request->id);
        self::$data->title = $request->title ?? null;
        self::$data->description = $request->description ?? null;
        self::$data->add_home = $request->add_home ?? null;
        self::$data->status = $request->status ?? null;
        if($request->file('image')){
            if(self::$data->image){
                if(file_exists(self::$data->image)){
                    unlink(self::$data->image);
                    self::$data->image = self::saveImage($request);
                }
            }
            else{
                self::$data->image = self::saveImage($request);
            }
        }

        self::$data->save();
    }

    private static function saveImage($request){
        self::$image = $request->file('image');
        self::$imageName = 'gallery_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'gallery/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }

}
