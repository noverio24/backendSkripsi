<?php


namespace App\Http\Controllers\Api\v1;


use App\Http\Controllers\Controller;
use App\Model\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TaskController extends Controller
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
            "subjectName"     => $request->post("subjectName"),
            "taskName" => $request->post("taskName"),
            "dateStart"   => $request->post("dateStart"),
            "deadline"     => $request->post("deadline"),
            "description"     => $request->post("description"),
            "photoTask"     => $request->post("photoTask"),
           
        ];

        $simpan = Task::create($dataSubject);

        if ($simpan) {
           
                return response()->json(["success" => true, "pesan" => "Data Mahasiswa Berhasil di simpan", "data" => $simpan], 200);
            } else {
            return response()->json(["success" => false, "pesan" => "Data Mahasiswa gagal di simpan"], 500);
        }
    }

public function index(Request $request)
{
    $tasks = Task::get()->toJson(JSON_PRETTY_PRINT);
    return response($tasks,200);
}

public function update(Request $request)
{
    $tasks = Task::find(\request()->id);

    if($tasks) {
        $data = [
            "subjectName" => $request->post("subjectName"),
            "taskName" => $request->post("taskName"),
            "dateStart" => $request->post("dateStart"),
            "deadline" => $request->post("deadline"),
            "description" => $request->post("description"),
            "photoTask" => $request->post("photoTask"),
        
        ];

        $simpan = $tasks->update($data);

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
    $task = Task::find(\request()->id);

        if ($tasks) {
            $simpan = $tasks->delete();
    
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



