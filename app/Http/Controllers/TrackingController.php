<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class TrackingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $data = DB::table('tbl_radio')->select('id_radio')->groupBy('id_radio')->get();
        return view('tracking', ['data' => $data]);
    }

    public function getData(Request $request) {
        $data = DB::table('tbl_radio');
        if ($request->has('filter')) {
            $data->where('id_radio', $request->id_radio);
        }
        $data = $data->get();
        if ($request->has('process')) {
            $temp = [];
            foreach ($data as $key => $value) {
                $coordinate = explode(',', trim($value->coordinate));
                $temp[] = [
                    'lat' => $coordinate[0],
                    'lng' => $coordinate[1],
                    'signal' => $value->signal,
                ];
            }
            $data = $temp;
        }
        return response()->json(['status' => 'OK', 'data' => $data]);
    }

}
