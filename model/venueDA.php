<?php
//venue functions*********************************************************************
function getAllVenues() {
    global $db;

    $query = "select * from venue
                order by name";

    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    return $results;
}

function getVenueByID($venueID) {
    global $db;

    $query = "select name, city from venue
                        WHERE venueID = :idPlace";

    $statement = $db->prepare($query);
    $statement->bindValue(':idPlace', $venueID);

    $statement->execute();
    $results = $statement->fetch();
    $statement->closeCursor();

    return $results[0];
}

function getVenueNameByID($venueID) {
    global $db;

    $query = "select name from venue
                        WHERE venueID = :idPlace";

    $statement = $db->prepare($query);
    $statement->bindValue(':idPlace', $venueID);

    $statement->execute();
    $results = $statement->fetch();
    $statement->closeCursor();

    return $results[0];
}

function insertVenue($name, $city, $state, $venuePicture) {
    global $db;

    $query = "insert into venue
                    (name, city, state, venuePicture)
                    VALUES
                    (:namePlace, :cityPlace, :statePlace, :picPlace)";

    $statement = $db->prepare($query);
    $statement->bindValue(':namePlace', $name);
    $statement->bindValue(':cityPlace', $city);
    $statement->bindValue(':statePlace', $state);
    $statement->bindValue(':picPlace', $venuePicture);

    $statement->execute();
    //$imageId = $db->lastInsertId();
    $statement->closeCursor();

    //return $imageId;
}

function deleteVenue($venueID) {
    global $db;

    $query = 'DELETE FROM venue
              WHERE venueID = :idPlace';

    $statement = $db->prepare($query);
    $statement->bindValue(':idPlace', $venueID);
    $statement->execute();
    $statement->closeCursor();
}
