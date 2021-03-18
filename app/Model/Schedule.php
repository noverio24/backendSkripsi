<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = "schedule";

    protected $fillable = [
        "subject_id",
        "time",
        "day",
    ];

    public function getUrlPhotoAttribute()
    {
        return asset($this->photo);
    }

}
