<?php 
  class Employeedata {
    // DB stuff
    private $conn;
    private $table = 'employeeData';

    // Post Properties
    public $id;
    public $noIC;
    public $nama;
    public $emel;
    public $sex;
    public $dob;
    public $pob;
    public $nationality;
    public $race;
    public $religion;
    public $marriage;
    public $childrenNo;
    public $address;
    public $noTel;
    public $lesenNo;
    public $lesenExp;
    public $noPlate;
    public $roadtaxNo;
    public $vehicleModel;
    public $vehicleYear;
    public $pdrmRecordNo;
    public $caseNo;
    public $employeeStatus;
    public $stationCode;
    public $accNum;
    public $codeBank;

    


    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get employeeData
    public function read() {
      // Create query
      $query = 'SELECT id, noIC, nama, emel, sex, dob, pob, nationality, race, religion, marriage, childrenNo, address, noTel, lesenNo, lesenExp, noPlate, roadtaxNo, vehicleModel, vehicleYear, pdrmRecordNo, caseNo, employeeStatus, stationCode, accNum, codeBank
                                FROM ' . $this->table . ' 
                                ORDER BY
                                  nama ASC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    
