<?php


namespace App\Http\Controllers\Api\v1;


use App\Http\Controllers\Controller;
use App\Model\Subject;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SubjectController extends Controller
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
            "name"     => $request->post("name"),
            "code" => $request->post("code"),
            "description"   => $request->post("description"),
            "schedule"     => $request->post("schedule"),
            "notedWeek"     => $request->post("noteWeek"),
            "time"     => $request->post("time"),
            "namaMatkul"     => $request->post("namaMatkul"),
            "nilaiPresent"     => $request->post("nilaiPresent"),
           
        ];

        $simpan = Subject::create($dataSubject);

        if ($simpan) {
           
                return response()->json(["success" => true, "pesan" => "Data Mahasiswa Berhasil di simpan", "data" => $simpan], 200);
            } else {
            return response()->json(["success" => false, "pesan" => "Data Mahasiswa gagal di simpan"], 500);
        }
    }

public function index(Request $request)
{
    $subjects = Subject::get()->toJson(JSON_PRETTY_PRINT);
    return response($subjects,200);
}

public function update(Request $request)
{
    $subject = Subject::find(\request()->id);

    if($subject) {
        $data = [
            "name" => $request->post("name"),
            "code" => $request->post("code"),
            "description" => $request->post("description"),
            "schedule" => $request->post("schedule"),
            "notedWeek" => $request->post("notedWeek"),
            "time" => $request->post("time"),
            "namaMatkul" => $request->post("namaMatkul"),
            "nilaiPresent" => $request->post("nilaiPresent"),
        ];

        $simpan = $subject->update($data);

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
    $subject = Subject::find(\request()->id);

        if ($subject) {
            $simpan = $subject->delete();
    
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



