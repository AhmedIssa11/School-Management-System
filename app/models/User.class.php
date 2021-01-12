<?php 
require "../Database.class.php";
class User {

    private $userID ;
    private $userName;
    private $userAddress;
    private $userEmail;
    private $userPassword;


    // Getters 

    function getUserID() {
        return $this->userID;
    }

    function getUserName() {
        return $this->userName;
    }

    function getUserAddress() {
        return $this->userAddress;
    }

    function getUserEmail() {
        return $this->userEmail;
    }

    function getUserPassword() {
        return $this->userPassword;
    }
  

    // Setters

    function setUserID($userID) {
        $this->userID = $userID;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setUserAddress($userAddress) {
        $this->userAddress = $userAddress;
    }

    function setUserEmail($userEmail) {
        $this->userEmail = $userEmail;
    }

    function setUserPassword($userPassword) {
        $this->userPassword = $userPassword;
    }
    
        function mail($userType)
    {
          global $connect;

	    $stmt = $connect->prepare("SELECT * FROM users WHERE userType = '$userType'");

	    $stmt->execute();

        $row = $stmt->fetchAll();
        
        return $row;
    }
    function showUserDetails($userType){
        
        global $connect;

	    $stmt = $connect->prepare("SELECT * FROM users WHERE userType = '$userType'");

	    $stmt->execute();

        $row = $stmt->fetchAll();
        
        return $row;
    }

    function checkUserExist(){
        
    }
}