<?php
//services functions***********************************************************
function getAllServices() {
    global $db;

    $query = "select * from services
                order by serviceType";

    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    return $results;
}

function getServiceByID($serviceID) {
    global $db;

    $query = "select serviceType, serviceDescription, servicePicture from services
                        WHERE serviceID = :idPlace";

    $statement = $db->prepare($query);
    $statement->bindValue(':idPlace', $serviceID);

    $statement->execute();
    $results = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    return $results;
}

function getServiceTypeByID($serviceID) {
    global $db;

    $query = "select serviceType from services
                        WHERE serviceID = :idPlace";

    $statement = $db->prepare($query);
    $statement->bindValue(':idPlace', $serviceID);

    $statement->execute();
    $results = $statement->fetch();
    $statement->closeCursor();

    return $results[0];
}

function insertServices($serviceType, $serviceDescription, $servicePicture) {
    global $db;

    $query = "insert into services
                    (serviceType, serviceDescription, servicePicture)
                    VALUES
                    (:typePlace, :descriptPlace, :picPlace)";

    $statement = $db->prepare($query);
    $statement->bindValue(':typePlace', $serviceType);
    $statement->bindValue(':descriptPlace', $serviceDescription);
    $statement->bindValue(':picPlace', $servicePicture);

    $statement->execute();
    $serviceId = $db->lastInsertId();
    $statement->closeCursor();

    return $serviceId;
}

function deleteService($serviceID) {
    global $db;

    $query = 'DELETE FROM services
              WHERE serviceID = :idPlace';

    $statement = $db->prepare($query);
    $statement->bindValue(':idPlace', $serviceID);
    $statement->execute();
    $statement->closeCursor();
}

function updateService($serviceID, $serviceType, $serviceDescription, $servicePicture) {
    global $db;

    $query = 'update services
                set serviceType = :typePlace, serviceDescription = :descriptPlace, servicePicture = :picPlace
                WHERE serviceID = :servicePlace';

    $statement = $db->prepare($query);
    $statement->bindValue(':servicePlace', $serviceID);
    $statement->bindValue(':typePlace', $serviceType);
    $statement->bindValue(':descriptPlace', $serviceDescription);
    $statement->bindValue(':picPlace', $servicePicture);

    $statement->execute();
    $serviceId = $db->lastInsertId();
    $statement->closeCursor();

    return $serviceId;
}

