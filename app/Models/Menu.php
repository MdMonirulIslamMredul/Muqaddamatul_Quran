<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_menu($request)
    {
        self::$data = new Menu();
        self::$data->title = $request->title??null;
        self::$data->save();
    }
    public static function update_menu($request)
    {
        self::$data = Menu::find($request->id);
        self::$data->title = $request->title??null;
        self::$data->save();
    }

}
