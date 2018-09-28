<?php
//venueService table functions**********************************************
function getVenueServiceByID($venueID) {
    global $db;

    $query = "select * from venueservice
                where venueID = :venuePlace";

    $statement = $db->prepare($query);
    $statement->bindValue(':venuePlace', $venueID);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    $services = array();
    foreach ($results as $ser) {
        $services[] = $ser['serviceID'];
    }

    return $services;
}

function insertVenueService($venueID, $serviceID) {
    global $db;

    $query = 'insert into venueservice
                    (venueID, serviceID)
                    VALUES
                    (:venuePlace, :servicePlace)';

    $statement = $db->prepare($query);
    $statement->bindValue(':venuePlace', $venueID);
    $statement->bindValue(':servicePlace', $serviceID);

    $statement->execute();
    $statement->closeCursor();
}

function checkVenueService($venueID, $serviceID) {
    global $db;

    $query = 'select * FROM venueservice
              WHERE venueID = :venuePlace and
              serviceID = :servicePlace';

    $statement = $db->prepare($query);
    $statement->bindValue(':venuePlace', $venueID);
    $statement->bindValue(':servicePlace', $serviceID);
    $success = $statement->execute();
    $statement->closeCursor();

    return $success;
}

function deleteServiceFromVenue($venueID, $serviceID) {
    global $db;

    $query = 'DELETE FROM venueservice
              WHERE venueID = :venuePlace and
              serviceID = :servicePlace';

    $statement = $db->prepare($query);
    $statement->bindValue(':venuePlace', $venueID);
    $statement->bindValue(':servicePlace', $serviceID);
    $statement->execute();
    $statement->closeCursor();
}

function getServiceNamesFromVS($venueID) {
    global $db;

    $query = "SELECT * FROM venueservice v JOIN services s
        ON v.serviceID = s.serviceID WHERE venueID = :venuePlace";

    $statement = $db->prepare($query);
    $statement->bindValue(':venuePlace', $venueID);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    return $results;
}

function VenueName($serviceID) {
    global $db;

    $query = "SELECT distinct name FROM venueservice vs JOIN venue v
        ON vs.venueID = v.venueID WHERE serviceID = :servicePlace";

    $statement = $db->prepare($query);
    $statement->bindValue(':servicePlace', $serviceID);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_COLUMN);
    $statement->closeCursor();

    return $results;
}

function ServiceName($venueID) {
    global $db;

    $query = "SELECT serviceType FROM venue v JOIN services s
        ON v.serviceID = s.serviceID  WHERE venueID = :venuePlace";

    $statement = $db->prepare($query);
    $statement->bindValue(':venuePlace', $venueID);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    $services = array();
    foreach ($results as $ser) {
        $services[] = $ser['serviceType'];
    }

    return $services;
}
