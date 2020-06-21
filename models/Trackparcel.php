<?php 
  class Trackparcel {
    // DB stuff
    private $conn;
    private $table = 'trackParcel';

    // Post Properties
    public $id;
    public $code;
    public $addressFrom;
    public $addressTo;
    public $senderName;
    public $receiverName;


    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get employeeData
    public function read() {
      // Create query
      $query = 'SELECT id, code, addressTo, addressFrom, senderName, receiverName
                                FROM ' . $this->table . ' 
                                ORDER BY
                                  id ASC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Post
    public function read_single() {
          // Create query
          $query = 'SELECT id, code, addressTo, addressFrom, senderName, receiverName
                                FROM ' . $this->table . '
                                    WHERE
                                      code = ?
                                    LIMIT 0,1';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->code);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->id = $row['id'];
          $this->code = $row['code'];
          $this->addressFrom = $row['addressFrom'];
          $this->addressTo = $row['addressTo'];
          $this->senderName = $row['senderName'];
          $this->receiverName = $row['receiverName'];

    }

    // Create employeeData
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET code = :code, addressFrom = :addressFrom, addressTo = :addressTo, senderName = :senderName, receiverName = :receiverName';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->code = htmlspecialchars(strip_tags($this->code));
          $this->addressFrom = htmlspecialchars(strip_tags($this->addressFrom));
          $this->addressTo = htmlspecialchars(strip_tags($this->addressTo));
          $this->senderName = htmlspecialchars(strip_tags($this->senderName));
          $this->receiverName = htmlspecialchars(strip_tags($this->receiverName));

          // Bind data
          $stmt->bindParam(':code', $this->code);
          $stmt->bindParam(':addressFrom', $this->addressFrom);
          $stmt->bindParam(':addressTo', $this->addressTo);
          $stmt->bindParam(':senderName', $this->senderName);
          $stmt->bindParam(':receiverName', $this->receiverName);

          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Post
    public function update() {
          // Create query
          $query = 'UPDATE ' . $this->table . '
                                SET addressFrom = :addressFrom, addressTo = :addressTo, senderName = :senderName, receiverName = :receiverName
                                WHERE code = :code';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->addressFrom = htmlspecialchars(strip_tags($this->addressFrom));
          $this->addressTo = htmlspecialchars(strip_tags($this->addressTo));
          $this->senderName = htmlspecialchars(strip_tags($this->senderName));
          $this->receiverName = htmlspecialchars(strip_tags($this->receiverName));
          $this->code = htmlspecialchars(strip_tags($this->code));

          // Bind data
          $stmt->bindParam(':addressFrom', $this->addressFrom);
          $stmt->bindParam(':addressTo', $this->addressTo);
          $stmt->bindParam(':senderName', $this->senderName);
          $stmt->bindParam(':receiverName', $this->receiverName);
          $stmt->bindParam(':code', $this->code);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

    // Delete Post
    public function delete() {
          // Create query
          $query = 'DELETE FROM ' . $this->table . ' WHERE code = :code';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this-code = htmlspecialchars(strip_tags($this-code));

          // Bind data
          $stmt->bindParam(':code', $this->code);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
    
  }
