<?php
//user database functions*******************************************************
//insert user into table
function insertUser(User $user) {
    global $db;

    $query = "insert into users
            (firstName, lastName, email, address, city, zip, phone, password)
            VALUES
            (:firstNamePlace, :lastNamePlace, :emailPlace, :addressPlace, 
                    :cityPlace, :zipPlace, :phonePlace, :passwordPlace)";

    $statement = $db->prepare($query);
    $statement->bindValue(':firstNamePlace', $user->getFirstName());
    $statement->bindValue(':lastNamePlace', $user->getLastName());
    $statement->bindValue(':emailPlace', $user->getEmail());
    $statement->bindValue(':addressPlace', $user->getAddress());
    $statement->bindValue(':cityPlace', $user->getCity());
    $statement->bindValue(':zipPlace', $user->getZip());
    $statement->bindValue(':phonePlace', $user->getPhone());
    $statement->bindValue(':passwordPlace', $user->getPassword());

    $statement->execute();
    $userId = $db->lastInsertId();
    $statement->closeCursor();

    return $userId;
}

function updateUser($userID, $userRole) {
    global $db;
    
    $query = 'UPDATE users
            SET userRole = :userRolePlace
        WHERE userID = :userIDPlace';
    
    $statement = $db->prepare($query);
    $statement->bindValue(':userIDPlace', $userID);
    $statement->bindValue(':userRolePlace', $userRole);
    
    $statement->execute();
    
    $statement->closeCursor();
    return;
}

//modified from group project
function getHashedPassword($email) {
    global $db;
    //looks for the email
    $query = "SELECT password FROM users WHERE email = :emailPlace";
    $statement = $db->prepare($query);
    $statement->bindValue(':emailPlace', $email);

    $statement->execute();
    $results = $statement->fetch();
    $statement->closeCursor();

    $hashedPassword = $results['password'];
    return $hashedPassword;
}

function getUserByEmail($email) {
    global $db;
    // not returning the password becuase we probably shouldn't.
    $query = "SELECT userID,userRole,firstName,lastName,email,zip
                FROM users WHERE email = :emailPlace";

    $statement = $db->prepare($query);
    $statement->bindValue(':emailPlace', $email);

    $statement->execute();
    $results = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $results;
}

function getUserByID($userID) {
    global $db;
    // not returning the password becuase we probably shouldn't.
    $query = "SELECT *
                FROM users WHERE userID = :idPlace";

    $statement = $db->prepare($query);
    $statement->bindValue(':idPlace', $userID);

    $statement->execute();
    $results = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    return $results;
}

function getAllUsers() {
    global $db;

    $query = "select * from users";

    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    $users = array();
    foreach ($results as $result) {
        $u = new User(
                $result['firstName'], $result['lastName'], 
                $result['email'], $result['address'], $result['city'], 
                $result['zip'], $result['phone']);
        $u->setId($result['userID']);
        $u->setUserRole($result['userRole']);
        $u->setPassword($result['password']);
        $users[] = $u;
    }

    return $users;
}

//checks all emails for duplicates
function emailExists($email) {
    global $db;

    $query = "SELECT * FROM users WHERE email = :emailPlace";
    $statement = $db->prepare($query);
    $statement->bindValue(':emailPlace', $email);
//the execute method returns a boolean TRUE on success if there is a match or FALSE on failure.
    $success = $statement->execute();
    $statement->fetchAll(); //returns results of select statement if anything
    $statement->closeCursor();

    return $success;
}

