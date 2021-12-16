<?php 
  class Post {

    private $conn;
    private $table = 'posts';

    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;

    //Constructor for database
    public function __construct($db) {
      $this->conn = $db;
    }

    //Read posts
    public function read() {
      //SQL query
      $query = 'SELECT c.name as category_name, p.id, p.category_id, p.title, p.body
                                FROM ' . $this->table . ' p
                                LEFT JOIN
                                  categories c ON p.category_id = c.id
                                ORDER BY
                                  p.id DESC';
      
      //SQL statement
      $stmt = $this->conn->prepare($query);
      $stmt->execute();

      return $stmt;
    }

    //Create a post
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET title = :title, body = :body, category_id = :category_id';

          $stmt = $this->conn->prepare($query);

          $stmt->bindParam(':title', $this->title);
          $stmt->bindParam(':body', $this->body);
          $stmt->bindParam(':category_id', $this->category_id);

          if($stmt->execute()) {
            return true;
      }

      //Error message
      printf("Error: %s.\n", $stmt->error);

      return false;
    }
    
  }