<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/mahasiswa.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare mahasiswa object
$mahasiswa = new Mahasiswa($db);
  
// get nim of mahasiswa to be edited
$data = json_decode(file_get_contents("php://input"));
  
// set ID property of mahasiswa to be edited
$mahasiswa->nim = $data->nim;
  
// set mahasiswa property values
$mahasiswa->nama = $data->nama;
$mahasiswa->angkatan = $data->angkatan;
  
// update the mahasiswa
if($mahasiswa->update()){
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array("message" => "Mahasiswa was updated."));
}
  
// if unable to update the mahasiswa, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update mahasiswa."));
}
?>