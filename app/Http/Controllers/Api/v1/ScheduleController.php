<?php


namespace App\Http\Controllers\Api\v1;


use App\Http\Controllers\Controller;
use App\Model\Schedule;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ScheduleController extends Controller
{
    public function store(Request $request)
    {
        // $validation = $request->validate([
        //     "name"     => "required",
        //     "email"    => "required",
        //     "username" => "required",
        //     "password" => "required|min:6",
        //     "nid"      => "required",
        //     "address"  => "required",
        //     "phone"    => "required",
        //     "bio"      => "required",
        //     "photo"    => "mimes:jpeg,png,jpg|max:5120"

        // ]);

     
        $dataSubject = [
            "id"    => $request->post("id"),
            "subject_id"     => $request->post("subjectName"),
            "time" => $request->post("taskName"),
            "day"   => $request->post("dateStart"),
        ];

        $simpan = schedule::create($dataSchedule);

        if ($simpan) {
           
                return response()->json(["success" => true, "pesan" => "Data Mahasiswa Berhasil di simpan", "data" => $simpan], 200);
            } else {
            return response()->json(["success" => false, "pesan" => "Data Mahasiswa gagal di simpan"], 500);
        }
    }

public function index(Request $request)
{
    $schedule = Schedule::get()->toJson(JSON_PRETTY_PRINT);
    return response($schedule,200);
}

public function update(Request $request)
{
    $schedule = Task::find(\request()->id);

    if($schedule) {
        $data = [
            "subject_id" => $request->post("subject_id"),
            "time" => $request->post("time"),
            "day" => $request->post("day"),
        ];

        $simpan = $schedule->update($data);

        if ($simpan) {
            return response()->json(["success" => true, "pesan" => "Data subject Berhasil di simpan", "data" => $simpan], 200);
        } else {
            return response()->json(["success" => false, "pesan" => "Data subject gagal di simpan"], 500);
        }
    } else {
        return response()->json(["success" => false, "pesan" => "Data subject tidak terdaftar"], 500);
    }
    
}



public function delete()
{
    $schedule = Schedule::find(\request()->id);

        if ($schedule) {
            $simpan = $schedule->delete();
    
            if ($simpan) {
                return response()->json(["success" => true, "pesan" => "Data subject Berhasil di delete", "data" => $simpan], 200);
            } else {
                return response()->json(["success" => false, "pesan" => "Data subject gagal di delete"], 500);
            }
        } else {
            return response()->json(["success" => false, "pesan" => "Data subject tidak terdaftar"], 500);
        }

}

}



