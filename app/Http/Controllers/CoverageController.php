<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoverageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('coverage');
    }

    public function getData() {
        ini_set('memory_limit', -1);
        $txt_file    = file_get_contents(storage_path('app\filelog.txt'));
    	$rows        = explode("\r\n", $txt_file);
    	$result      = $match = [];
    	array_shift($rows);
    	foreach($rows as $key => $value) {
    	    // cek if data contains [RxCn], U_SDS_DATA, PrId
    		if (
    			strpos($value, '>[RxC') !== false &&
    			strpos($value, 'U_SDS_DATA') !== false &&
    			strpos($value, 'PrId') !== false
    		){
    	      // Get signal value
    			$signal = explode('=', $this->getStringBetween($value, '[', ']'))[1];
    	      // Get ID Radio
    			$index = strpos($value, 'U_SDS_DATA @');
    			$last_index = strpos($value, 'EpiRx');
    			$tmpStr = substr($value, $index, $last_index - ($index + 1));
    			$id_pr = str_replace('U_SDS_DATA @', '', $tmpStr);
                // Get Coordinate
                $id_radio = explode('=', substr($value, strpos($value, 'PrId=')))[1];
                $temp = [
                    'signal' => $signal,
                    'id_pr' => $id_pr,
                    'coordinate' => $this->bin2Cord(explode(' ', $id_radio)[1])
                ];
                if ($temp['coordinate'] != '0, 0') {
                    $result[] = $temp;
                }
            }
    	};
        return response()->json(['status' => 'OK', 'data' => $result]);
    }

}
