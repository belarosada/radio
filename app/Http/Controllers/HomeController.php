<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            ini_set('memory_limit', -1);
            $txt_file    = file_get_contents(storage_path('app\filelog.txt'));
        	$rows        = explode("\r\n", $txt_file);
            array_shift($rows);
            return view('dashboard', ['allradio' => $this->getDataIDRadio($rows), 'radio' => $this->getIDRadio($rows)]);
            // return $this->getDataIDRadio($rows);

    }

    function getDataIDRadio($array) {
        $data = [];
        foreach ($array as $key => $value) {
            if (
                strpos($value, '>[RxC') !== false &&
                strpos($value, 'U_SDS_DATA') !== false &&
                strpos($value, 'PrId') !== false
            ) {
                $index = strpos($value, 'U_SDS_DATA @');
                $last_index = strpos($value, 'EpiRx');
                $tmpStr = substr($value, $index, $last_index - ($index + 1));
                $id_pr = str_replace('U_SDS_DATA @', '', $tmpStr);
                $coordinate = $this->bin2Cord(explode(' ', explode('=', substr($value, strpos($value, 'PrId=')))[1])[1]);
                if (!in_array($id_pr, $data)) {
                    $data[] = $id_pr;
                }
            }
        }
        return count($data);
    }

    function getIDRadio($array) {
        $data = [];
        foreach ($array as $key => $value) {
            if (
                strpos($value, '>[RxC') !== false &&
                strpos($value, 'U_SDS_DATA') !== false &&
                strpos($value, 'PrId') !== false
            ) {
                $index = strpos($value, 'U_SDS_DATA @');
                $last_index = strpos($value, 'EpiRx');
                $tmpStr = substr($value, $index, $last_index - ($index + 1));
                $id_pr = str_replace('U_SDS_DATA @', '', $tmpStr);
                $coordinate = $this->bin2Cord(explode(' ', explode('=', substr($value, strpos($value, 'PrId=')))[1])[1]);
                if (!in_array($id_pr, $data) && $coordinate != '0, 0') {
                    $data[] = $id_pr;
                }
            }
        }
        return count($data);
    }
}
