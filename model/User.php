<?php

class User {
    private $id,$userRole, $firstName, $lastName, $email, $address, $city, $zip, $phone, $password;

    function __construct($firstName, $lastName, $email, $address, $city, $zip, $phone) {
//        $this->userRole = $userRole;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->address = $address;
        $this->city = $city;
        $this->zip = $zip;
        $this->phone = $phone;
//        $this->password = $password;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($value) {
        $this->id = $value;
    }
    
    public function getUserRole() {
        return $this->userRole;
    }

    public function setUserRole($userRole) {
        $this->userRole = $userRole;
    }
    
    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }
    
    public function getFullName() {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function getZip() {
        return $this->zip;
    }

    public function setZip($zip) {
        $this->zip = $zip;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    public function add(){
        userDA.insertUser($this);
    }

}
