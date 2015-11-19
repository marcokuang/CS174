<?php
include_once("header.php");
require("dbconfig.php");

$StudentID = filter_input(INPUT_POST, "StudentID");
$Password = filter_input(INPUT_POST, "Password");
$RePassword = filter_input(INPUT_POST, "RePassword");
$FirstName = filter_input(INPUT_POST, "firstName");
$LastName = filter_input(INPUT_POST, "lastName");

if ($Password !== $RePassword) {
    print("Please check your password");
} elseif ($FirstName == "") {
    echo "Error: Name is empty";
} elseif ($LastName == "") {
    echo "Error: Name is empty";
} // if the password and the name attributes look good
else {

    try {
        $query = "SELECT SJSUID FROM UserTable WHERE SJSUID = :ID";
        $ps = $con->prepare($query);
        $ps->execute(array(':ID' => $StudentID));
        $data = $ps->fetchAll(PDO::FETCH_ASSOC);
        $matchFound = count($data) > 0 ? 'yes' : 'no';

    } catch (Exception $e) {
        echo $query . "<br>" . $e->getMessage();
    }

    if ($matchFound == "yes") {
        echo "Found an existed user, please go back and log in";
    } else {
        echo "<h1>Creating new User</h1>";
        try {
            // insert the new id and password to user login table
            $query = "INSERT INTO UserLoginTable VALUES (:id, :pwd)";
            $ps = $con->prepare($query);
            $ps->execute(array(':id' => $StudentID, ':pwd' => $Password));

            // insert the new id and name to user table
            $query = "INSERT INTO UserTable VALUES (:first, :last, :id)";
            $ps = $con->prepare($query);
            $ps->execute(array(':first' => $FirstName, ':last' => $LastName, ':id' => $StudentID));

            echo "<h2>New Student account added for: SID:$StudentID</h2>";
            echo "<h2> Name:$FirstName $LastName</h2>";

        } catch (PDOException $e) {
            echo $query . "<br>" . $e->getMessage();
        }
        $con = null;

    }


}


?>
</div>
</body>
</html>