<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getDataRadio($path) {
        $duration = 10; // Second
        $oldTime = null;
        $txt_file    = file_get_contents($path);
    	$rows        = explode("\r\n", $txt_file);
    	$result      = $match = [];
    	array_shift($rows);
    	foreach($rows as $key => $value) {
            $currentTime = strtotime(explode(' ', $value)[0]);
            if ($oldTime == null) $oldTime = $currentTime;
    		if (
    			strpos($value, '>[RxC') !== false && //signal
    			strpos($value, 'U_SDS_DATA') !== false && //id radio
    			strpos($value, 'PrId') !== false //location
    		){
    			$signal = explode('=', $this->getStringBetween($value, '[', ']'))[1];
    			$index = strpos($value, 'U_SDS_DATA @');
    			$last_index = strpos($value, 'EpiRx');
    			$tmpStr = substr($value, $index, $last_index - ($index + 1));
    			$id_pr = str_replace('U_SDS_DATA @', '', $tmpStr);
                $id_radio = explode('=', substr($value, strpos($value, 'PrId=')))[1];
                $temp = [
                    'signal' => $signal,
                    'id_pr' => $id_pr,
                    'coordinate' => $this->bin2Cord(explode(' ', $id_radio)[1])
                ];
                if ($currentTime >= strtotime("$duration Second", $oldTime)) {
                  $oldTime = $currentTime;
                  if ($temp['coordinate'] != '0, 0') {
                      $result[] = $temp;
                  }
                }
            }
    	};
        return $result;
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
                if (!in_array($id_pr, $data) && $coordinate != '0, 0') {
                    $data[] = $id_pr;
                }
            }
        }
        return $data;
    }

    function getStringBetween($str,$from,$to, $withFromAndTo = false){
        $sub = substr($str, strpos($str,$from)+strlen($from),strlen($str));
        if ($withFromAndTo)
        return $from . substr($sub,0, strrpos($sub,$to)) . $to;
        else
        return substr($sub,0, strrpos($sub,$to));
    }

    function _hex2bin($hex){
        $hex = strtoupper($hex);
        $hexLen = strlen($hex);
        $bin = [];
        for ($i = 0; $i < $hexLen; $i++) {
            $char = $hex[$i];
            $bin[] = str_pad(base_convert($char, 16, 2), 4, '0', STR_PAD_LEFT);
        }

        return implode("", $bin);
    }

    function bin2Cord($hex) {
        $binary = $this->_hex2bin($hex);
        $lat = substr($binary, 29, -27);
        $lng = substr($binary, 4, -51);
        return (bindec($lat)*180/16777216).', '.(bindec($lng)*180/16777216);
    }
}
