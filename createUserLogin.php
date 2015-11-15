
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
} else {

    try {
        $query = "SELECT SJSUID FROM UserTable Where SJSUID = :ID";
        $ps = $con->prepare($query);
        $ps->execute(array(':ID' => $StudentID));
        $data = $ps->fetchAll(PDO::FETCH_ASSOC);
        $matchFound = count($data) > 0 ? 'yes' : 'no';

    } catch (Exception $e) {
        echo $query . "<br>" . $e->getMessage();
    }
    $con = null;
    //echo "$matchFound\n";
    if ($matchFound == "yes") {
        echo "Found an existed user, please go back and log in";
    } else {
        echo "<h1>Creating new User</h1>";
        try {
            // Create connection

            $query = "INSERT INTO userlogintable VALUES (:id, :pwd)";

            $ps = $con->prepare($query);
            $ps->execute(array(':id' => $StudentID, ':pwd' => $Password));
            //$data = $ps->fetchAll(PDO::FETCH_ASSOC);

            echo "<h2>New Student account added for: $StudentID</h2>";

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