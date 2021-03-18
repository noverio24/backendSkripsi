<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = "tasks";

    protected $fillable = [
        "subjectName",
        "taskName",
        "dateStart",
        "deadline",
        "description",
        "photoTask",
    ];

    protected $appends = ["url_photo"];

    public function getUrlPhotoAttribute()
    {
        return asset($this->photo);
    }

}
