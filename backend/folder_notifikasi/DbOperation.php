<?php
 
class DbOperation
{
    //Database connection link
    private $con;
 
    //Class constructor
    function __construct()
    {
        //Getting the DbConnect.php file
        require_once dirname(__FILE__) . '/DbConnect.php';
 
        //Creating a DbConnect object to connect to the database
        $db = new DbConnect();
 
        //Initializing our connection link of this class
        //by calling the method connect of DbConnect class
        $this->con = $db->connect();
    }
 
    //storing token in database 
    public function registerDevice($id_user,$token){
        if(!$this->isEmailExist($id_user)){
            $stmt = $this->con->prepare("INSERT INTO device_user (id_user, token) VALUES (?,?) ");
            $stmt->bind_param("is",$id_user,$token);
            if($stmt->execute())
                return 0; //return 0 means success
            return 1; //return 1 means failure
        }else{
            return 2; //returning 2 means email already exist
        }
    }
 
    //the method will check if email already exist 
    private function isEmailexist($id_user){
        $stmt = $this->con->prepare("SELECT id_token FROM device_user WHERE id_user = ?");
        $stmt->bind_param("s",$id_user);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }
 
    //getting all tokens to send push to all devices
    public function getAllTokens(){
        $stmt = $this->con->prepare("SELECT token FROM device_user");
        $stmt->execute(); 
        $result = $stmt->get_result();
        $tokens = array(); 
        while($token = $result->fetch_assoc()){
            array_push($tokens, $token['token']);
        }
        return $tokens; 
    }
 
    //getting a specified token to send push to selected device
    public function getTokenByEmail($id_user){
        $stmt = $this->con->prepare("SELECT token FROM device_user WHERE id_user = ?");
        $stmt->bind_param("i",$id_user);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return array($result['token']);        
    }
 
    //getting all the registered devices from database 
    public function getAllDevices(){
        $stmt = $this->con->prepare("SELECT * FROM device_user");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result; 
    }
}