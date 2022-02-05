<?php
require_once __DIR__.'/query-builder/Query.php';
require_once __DIR__.'/functions.php';

$request_type = $_SERVER['REQUEST_METHOD'];
$params = explode('/',$_SERVER['REQUEST_URI']);
$resource = @$params[count(@$params)-2];
$id = @$params[count(@$params)-1];

switch($request_type):
case 'GET':
     process_get($id);
     break;
case 'POST':
     process_post();
     break;
case 'PUT':
     process_put();
     break;
case 'PATCH':
     process_patch();
     break;
case 'DELETE':
     process_delete();
     break;
default:
     die('Invalid Request');
     break;
endswitch;

function process_get($id=''){

     global $resource;
     $query = new Query();

     if($id==''){
          $records = $query->select('*')->table($resource)->allRecords();
     }
     
     if($id){
          $records = $query->select('*')->table($resource)->where('id',$id)->first();
     }

if($records==false){

     $response = array(
          'code'=>201,
          'status'=>false,
          'message'=>'Record Not Found for '.$resource,
          'data'=>[],
     );
}else{
     
     $response = array(
          'code'=>200,
          'status'=>true,
          'message'=>'Record Found',
          'data'=>$records,
     );
}

header("Content-Type:application/json");
http_response_code(200);
echo json_encode($response,JSON_PRETTY_PRINT);
exit();

}


function process_post(){


echo 'post request';
}


function process_put(){

echo 'put request';
}

function process_patch(){

echo 'patch request';
}

function process_delete(){

echo 'delete Request';
}
