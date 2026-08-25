<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_contact($request)
    {
        self::$data = new ContactUs();
        self::$data->name = $request->name ?? null;
        self::$data->number = $request->number ?? null;
        self::$data->email = $request->email ?? null;
        self::$data->subject = $request->subject ?? null;
        self::$data->message = $request->message ?? null;
        self::$data->save();
    }
}
