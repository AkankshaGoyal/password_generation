
<?php
class Post{
  
    // database connection and table name
    private $conn;
    private $table_name = "employee";
  
    // object properties
    public $email_id;
    public $firstname;
    public $lastname;
    //public $password;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
  // create product
function create(){
  
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                email_id=:email_id, firstname=:firstname, lastname=:lastname";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->email_id=htmlspecialchars(strip_tags($this->email_id));
    $this->firstname=htmlspecialchars(strip_tags($this->firstname));
    $this->lastname=htmlspecialchars(strip_tags($this->lastname));
    
    // bind values
    $stmt->bindParam(":email_id", $this->email_id);
    $stmt->bindParam(":firstname", $this->firstname);
    $stmt->bindParam(":lastname", $this->lastname);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}
}
?>