<?php


namespace App\Http\Controllers\API;


trait APIResponse
{

    public function APIResponse($msg=null,$status=null,$data=null){
        $res = [
        'msg' =>$msg ,
        'status' => $status,
        'data' => $data,
        ];
            return response($res);

       }
}
