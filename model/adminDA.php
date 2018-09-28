<?php
//admin functions*************************************************************
function deleteUser($userID) {
    global $db;

    $query = 'DELETE FROM users
              WHERE userID = :idPlace';

    $statement = $db->prepare($query);
    $statement->bindValue(':idPlace', $userID);
    $statement->execute();
    $statement->closeCursor();
}
//images functions*********************************************************
function insertImage($image) {
    global $db;

    $query = "insert into images
                    (galleryImages)
                    VALUES
                    (:imagePlace)";

    $statement = $db->prepare($query);
    $statement->bindValue(':imagePlace', $image);

    $statement->execute();
    $statement->closeCursor();
}

function getAllImages() {
    global $db;

    $query = "SELECT * FROM images";

    $statement = $db->prepare($query);

    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    return $results;
}

function deleteFromImages($imageID) {
    global $db;

    $query = 'DELETE FROM images
              WHERE imageID = :imagePlace';

    $statement = $db->prepare($query);
    $statement->bindValue(':imagePlace', $imageID);
    $statement->execute();
    $statement->closeCursor();
}