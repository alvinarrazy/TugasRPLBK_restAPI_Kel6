<?php
class Mahasiswa{
  
    // database connection and table nama
    private $conn;
    private $table_nama = "mahasiswa";
  
    // object properties
    public $nim;
    public $nama;
    public $angkatan;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
// read mahasiswa
    function read(){
  
        // select all query
        $query = "SELECT * FROM `mahasiswa` ORDER BY nim ASC";
      
        // prepare query statement
        $stmt = $this->conn->prepare($query);
      
        // execute query
        $stmt->execute();
      
        return $stmt;
    }

// create mahasiswa
    function create(){
    
        // query to insert record
        $query = "INSERT INTO
                    `mahasiswa`
                SET
                    nama=:nama, angkatan=:angkatan";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->nama=htmlspecialchars(strip_tags($this->nama));
        $this->angkatan=htmlspecialchars(strip_tags($this->angkatan));
    
        // bind values
        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":angkatan", $this->angkatan);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
        
    }

// delete the mahasiswa
    function delete(){
        
            // delete query
            $query = "DELETE FROM `mahasiswa` WHERE nim = ?";
        
            // prepare query
            $stmt = $this->conn->prepare($query);
        
            // sanitize
            $this->nim=htmlspecialchars(strip_tags($this->nim));
        
            // bind nim of record to delete
            $stmt->bindParam(1, $this->nim);
        
            // execute query
            if($stmt->execute()){
                return true;
            }
        
            return false;
    }


// update the mahasiswa
    function update(){
    
        // update query
        $query = "UPDATE
                    `mahasiswa`
                SET
                    nama = :nama,
                    angkatan = :angkatan
                WHERE
                    nim = :nim";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->nama=htmlspecialchars(strip_tags($this->nama));
        $this->angkatan=htmlspecialchars(strip_tags($this->angkatan));
        $this->nim=htmlspecialchars(strip_tags($this->nim));
    
        // bind new values
        $stmt->bindParam(':nama', $this->nama);
        $stmt->bindParam(':angkatan', $this->angkatan);
        $stmt->bindParam(':nim', $this->nim);

    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // search products
    function search($keywords){
    
        // select all query
        $query = "SELECT * FROM `mahasiswa` 
                WHERE
                    mahasiswa.nama LIKE ? OR mahasiswa.angkatan LIKE ?
                ORDER BY
                    mahasiswa.nim ASC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";
    
        // bind
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
}

?>