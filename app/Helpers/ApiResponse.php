<?php

namespace App\Helpers;

class ApiResponse{

    public static function error(int $code, string $message, $data = null){
        return response()->json(["code"=> $code,"message"=> $message,"data"=> $data,"success"=>false],$code);
    }
    public static function success($data, ?string $message = null){
        return response()->json(["code"=> 200,"message"=> $message,"data"=> $data,"success"=>true]);
    }
}
