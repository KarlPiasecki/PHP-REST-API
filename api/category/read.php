<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Category.php';

  //Connect to database
  $database = new Database();
  $db = $database->connect();

  $category = new Category($db);

  $result = $category->read();
  
  // Get row count
  $num = $result->rowCount();

  //Check if there are any categories
  if($num > 0) {
        $cat_arr = array();
        $cat_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $cat_item = array(
            'id' => $id,
            'name' => $name
          );

          //Populate the array
          array_push($cat_arr['data'], $cat_item);
        }

        // Turn to JSON & output
        echo json_encode($cat_arr);

  } else {
        //If there are no categories:
        echo json_encode(
          array('message' => 'There are no categories')
        );
  }
