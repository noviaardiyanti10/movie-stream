<?php
namespace App\Helpers;

class JsonFormatter{
    public static function error($data = null, $message = '', $code = 500){
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    public static function success($data = null, $message = '', $code = 200){
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}
?>