<?php

namespace App\Responses;

class apiResponses
{
    public static function success(?string $message = null,mixed $data = null)
    {
        return response()->json(["message" => $message, "date" => $data,"status" => "success"],200);
    }
    public function ok(string $message,mixed $data = null)
    {
        return self::success($message, $data);
          
    }

    public static function error(mixed $errors,string $message)
    {
        return response()->json([  
        "errors"=> $errors,
        "message"=> $message,
        "data" => [],
        "status" => "fail" 
    ],400);
    

    }
}