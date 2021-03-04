<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// database connection will be here
// include database and object files
include_once '../Config/Database.php';
include_once '../models/Post.php';
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$post = new Post($db);

// read email and password will be here
// query products
$result = $post->read();
$num = $result->rowCount();

if($num > 0){
	$posts_arr = array();
	$posts_arr["records"] = array();
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$posts_item=array(
            "email_id" =>$email_id,
            "password" => $password
        );
  
        array_push($posts_arr["records"], $posts_item);
	}
	echo json_encode($posts_arr);
  }
else{
    echo json_encode(array('message' => 'No posts found' ));
}