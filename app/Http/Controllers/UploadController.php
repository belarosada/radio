<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Storage;

class UploadController extends Controller
{
    public function index() {
        return view('upload');
    }

    public function simpan(Request $request){
        ini_set('memory_limit', -1);
        ini_set('max_execution_time', 0);
        if ($request->hasFile('uploadFile')) {
            $fileinput  = $request->file('uploadFile');
            $path       = Storage::putFileAs('', $fileinput, 'filelog.txt');
            $data       = $this->getDataRadio(storage_path('app/'.$path));
            DB::table('tbl_radio')->truncate();
            foreach ($data as $key => $value) {
                DB::table('tbl_radio')
                    ->insert([
                        'id_radio' => $value['id_pr'],
                        'coordinate' => $value['coordinate'],
                        'signal' => $value['signal']
                    ]);
            }
        }
        return response()->json(["responses" => "OK"]);
    }
}
