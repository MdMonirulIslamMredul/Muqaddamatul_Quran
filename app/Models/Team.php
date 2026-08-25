<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_team($request)
    {
        self::$data = new Team();
        self::$data->name = $request->name??null;
        self::$data->designation = $request->designation??null;
        self::$data->email = $request->email??null;
        self::$data->facebook = $request->facebook??null;
        self::$data->instagram = $request->instagram??null;
        self::$data->linkedIn = $request->linkedIn??null;
        self::$data->youtube = $request->youtube??null;
        self::$data->add_home = $request->add_home??null;
        self::$data->image = self::saveImage($request);
        self::$data->save();
    }
    public static function update_team($request)
    {
        self::$data = Team::find($request->id);
        self::$data->name = $request->name??null;
        self::$data->designation = $request->designation??null;
        self::$data->email = $request->email??null;
        self::$data->facebook = $request->facebook??null;
        self::$data->instagram = $request->instagram??null;
        self::$data->linkedIn = $request->linkedIn??null;
        self::$data->youtube = $request->youtube??null;
        self::$data->add_home = $request->add_home??null;
        self::$data->status = $request->status??null;
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
        self::$imageName = 'team-'.rand().'.'. self::$image->Extension();
        self::$directory = 'team/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }

}
