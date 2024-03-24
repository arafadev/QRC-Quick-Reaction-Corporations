<?php

namespace App\Traits\Api;
    trait ResponseTrait {

        public function successData($data = [], $statusCode = 200)
        {
            return response()->json([
                'data' => $data,
            ], $statusCode);
        }
    
        public function successMsg($statusCode = 200)
        {
            return response()->json([
                'message' => 'success msg here',
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