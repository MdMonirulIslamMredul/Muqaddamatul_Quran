<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    public static $data,$image, $imageName, $imageDirectory, $imageUrl;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin','roll_no',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static function update_profile($request)
    {

        self::$data = User::find($request->id);
//        dd(Hash::check($request->old_password, self::$data->password));


//        if(Hash::check($request->old_password, self::$data->password)){
        self::$data->name= $request->name;
        self::$data->email= $request->email;
        if ($request->new_password){

            self::$data->password= Hash::make($request->new_password);
        }

        if ($request->file('image')) {
            if (self::$data->image) {
                if (file_exists(self::$data->image)) {
                    unlink(self::$data->image);
                    self::$data->image = self::saveImage($request);
                }
            } else {
                self::$data->image = self::saveImage($request);
            }
        }
        self::$data->save();
//        }



    }
    public static function saveImage($request)
    {
        if ($request->file('image')) {
            self::$image = $request->file('image');
            self::$imageName = 'user-' . rand() . '.' . self::$image->Extension();
            self::$imageDirectory = 'user/';
            self::$imageUrl = self::$imageDirectory . self::$imageName;
            self::$image->move(self::$imageDirectory,self::$imageName);
            return self::$imageUrl;
        }
    }
}
