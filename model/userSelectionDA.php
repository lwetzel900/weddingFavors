<?php
//user selection functions**************************************************
function insertIntoSelection($userID, $venueID, $serviceID) {
    global $db;

    $query = 'insert into userselection
                    (userID, venueID, serviceID)
                    VALUES
                    (:userPlace, :venuePlace, :servicePlace)';

    $statement = $db->prepare($query);
    $statement->bindValue(':userPlace', $userID);
    $statement->bindValue(':venuePlace', $venueID);
    $statement->bindValue(':servicePlace', $serviceID);

    $statement->execute();
    $statement->closeCursor();
}

function getVenueIdFromVenueService($userID) {
    global $db;

    $query = 'select distinct venueID
                from userselection
                WHERE userID = :userPlace';

    $statement = $db->prepare($query);
    $statement->bindValue(':userPlace', $userID);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_COLUMN);
    $statement->closeCursor();

    return $results;
}

function getUserVenueServiceByUserID($userID) {
    global $db;

    $query = 'SELECT v.name, s.serviceType
                FROM userselection u
                JOIN venue v ON u.venueID = v.venueID
                JOIN services s ON u.serviceID = s.serviceID
                WHERE userID = :userPlace';

    $statement = $db->prepare($query);
    $statement->bindValue(':userPlace', $userID);

    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_COLUMN | PDO::FETCH_GROUP);
    $statement->closeCursor();

    return $results;
}

function idExistInUserSelection($userID) {
    global $db;

    $query = "SELECT * FROM userselection
        WHERE userID = :userPlace";
    $statement = $db->prepare($query);
    $statement->bindValue(':userPlace', $userID);
//the execute method returns a boolean TRUE on success or FALSE on failure.
    $success = $statement->execute();
    $statement->fetchAll(); //returns results of select statement if anything
    $statement->closeCursor();

    return $success;
}

function deleteIDUserSelection($userID, $venueID) {
    global $db;

    $query = 'DELETE FROM userselection
              WHERE userID = :userPlace and
              venueID = :venuePlace';

    $statement = $db->prepare($query);
    $statement->bindValue(':userPlace', $userID);
    $statement->bindValue(':venuePlace', $venueID);
    $statement->execute();
    $statement->closeCursor();
}

//function insertServiceIntoSelection($userID, $serviceID) {
//    global $db;
//
//    $query = 'update userselection
//                set serviceID = :servicePlace
//                    WHERE userID = :userPlace';
//
//    $statement = $db->prepare($query);
//    $statement->bindValue(':userPlace', $userID);
////    $statement->bindValue(':venuePlace', $venueID);
//    $statement->bindValue(':servicePlace', $serviceID);
//
//    $statement->execute();
//    //$imageId = $db->lastInsertId();
//    $statement->closeCursor();
//
//    //return $imageId;
//}
//
//function insertVenueIntoSelection($userID, $venueID) {
//    global $db;
//
//    $query = 'update userselection
//                set venueID = :venuePlace
//                    WHERE userID = :userPlace';
//
//    $statement = $db->prepare($query);
//    $statement->bindValue(':userPlace', $userID);
//    $statement->bindValue(':venuePlace', $venueID);
////    $statement->bindValue(':servicePlace', $serviceID);
//
//    $statement->execute();
//    //$imageId = $db->lastInsertId();
//    $statement->closeCursor();
//
//    //return $imageId;
//}

