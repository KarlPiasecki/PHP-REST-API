<?php
  class Category {
    //Database setup
    private $conn;
    private $table = 'categories';

    //Properties of the table 
    public $id;
    public $name;

    //Constructor for the database
    public function __construct($db) {
      $this->conn = $db;
    }

    //Read the categories
    public function read() {
      // Create query
      $query = 'SELECT
        id,
        name
      FROM
        ' . $this->table . '
      ORDER BY
        title DESC';

      //Prepare SQL statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Category
  public function read_single(){
    // Create query
    $query = 'SELECT
          id,
          name
        FROM
          ' . $this->table . '
      WHERE id = ?
      LIMIT 0,1';

      //Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->id);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // set properties
      $this->id = $row['id'];
      $this->name = $row['name'];
  }

  // Create Category
  public function create() {
    // Create Query
    $query = 'INSERT INTO ' .
      $this->table . '
    SET
      name = :name';

  // Prepare Statement
  $stmt = $this->conn->prepare($query);

  //Binding
  $stmt-> bindParam(':name', $this->name);

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: $s.\n", $stmt->error);

  return false;
  }

  // Prepare Statement
  $stmt = $this->conn->prepare($query);

  $stmt-> bindParam(':name', $this->name);
  $stmt-> bindParam(':id', $this->id);

  if($stmt->execute()) {
    return true;
  }

  //Error message
  printf("Error: $s.\n", $stmt->error);

  return false;
  }
  }
