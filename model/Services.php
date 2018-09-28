<?php

class Services {

    private $id, $serviceType, $serviceDescription, $servicePicture;

    function __construct($id, $serviceType, $serviceDescription, $servicePicture) {
        $this->id = $id;
        $this->serviceType = $serviceType;
        $this->serviceDescription = $serviceDescription;
        $this->servicePicture = $servicePicture;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getServiceType() {
        return $this->serviceType;
    }

    public function setServiceType($serviceType) {
        $this->serviceType = $serviceType;
    }

    public function getServiceDescription() {
        return $this->serviceDescription;
    }

    public function setServiceDescription($serviceDescription) {
        $this->serviceDescription = $serviceDescription;
    }

    public function getServicePicture() {
        return $this->servicePicture;
    }

    public function setServicePicture($servicePicture) {
        $this->servicePicture = $servicePicture;
    }

}
