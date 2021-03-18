<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = "subjects";

    protected $fillable = [
        "name",
        "code",
        "description",
        "schedule",
        "notedWeek",
        "time",
        "namaMatkul",
        "nilaiPresent",
    ];

    protected $appends = ["url_photo"];

    public function getUrlPhotoAttribute()
    {
        return asset($this->photo);
    }

}
