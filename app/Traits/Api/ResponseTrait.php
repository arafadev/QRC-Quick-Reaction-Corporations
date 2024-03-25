<?php

namespace App\Traits\Api;
    trait ResponseTrait {

        public function successData($data = [], $statusCode = 200)
        {
            return response()->json([
                'msg' => 'Data Sended Successfully',
                'data' => $data,
            ], $statusCode);
        }
    
        public function successMsg($msg,$statusCode = 200)
        {
            return response()->json([
                'message' => $msg,
            ], $statusCode);
        }
    
        public function failMsg( $statusCode = 400)
        {
            return response()->json([
                'message' => 'failed msg here',
            ], $statusCode);
        }
    
        public function unauthenticatedReturn()
        {
            return response()->json([
                'message' => 'Unauthenticated User',
            ], 401);
        }

        public function notActive()
        {
            return response()->json([
                'message' => 'User Not Active Yet',
                'active' => false  
            ], 401);
        }
}