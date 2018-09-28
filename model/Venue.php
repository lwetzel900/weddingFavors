<?php

class Venue {

    private $id, $name, $city, $state, $venuePicture;

    function __construct($id, $name, $city, $state, $venuePicture) {
        $this->id = $id;
        $this->name = $name;
        $this->city = $city;
        $this->state = $state;
        $this->venuePicture = $venuePicture;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function getState() {
        return $this->state;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function getVenuePicture() {
        return $this->venuePicture;
    }

    public function setVenuePicture($venuePicture) {
        $this->venuePicture = $venuePicture;
    }

}
