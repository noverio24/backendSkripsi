<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = "mahasiswa";

    protected $fillable = [
        "name",
        "nid",
        "address",
        "phone",
        "bio",
        "photo",
    ];

    protected $appends = ["url_photo"];

    public function getUrlPhotoAttribute()
    {
        return asset($this->photo);
    }

}
