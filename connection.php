<?php

$error = false;
$update = false;
$insert = false;
$restore = false;
$delete = false;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notes";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Unable to connect data base" . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['insertbutton'])) {
        if (isset($_POST['title']) && isset($_POST['description'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];

            if ($title == "" && $description == "") {
                $error = true;
                // print "Fill the all the detailes";

            } else {
                $stmt = $conn->prepare("INSERT INTO `notes` (`title`, `description`) VALUES (?, ?)");

                if ($stmt === false) {
                    die('Prepare failed: ' . htmlspecialchars($conn->error));
                }

                $stmt->bind_param("ss", $title, $description);

                $result = $stmt->execute();

                if ($result) {
                    $insert = true;
                    // print "Data inserted";
                } else {
                    echo "Error: " . htmlspecialchars($stmt->error);
                }
                $stmt->close();
            }
        }
    }
    if (isset($_POST['editbutton'])) {
        if (isset($_POST['title']) && isset($_POST['description'])) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];

            if ($title == "" && $description == "") {
                $error = true;
                // print "Fill the all the detailes";

            } else {
                $stmt = $conn->prepare("UPDATE `notes` SET `title` = ?, `description` = ? WHERE `id` = ?");
                if ($stmt === false) {
                    die('Prepare failed: ' . htmlspecialchars($conn->error));
                }

                $stmt->bind_param("ssi", $title, $description, $id);
                $result = $stmt->execute();


                if ($result) {
                    $update = true;
                    // print "Updated";
                } else {
                    echo "Error: " . htmlspecialchars($stmt->error);
                }
                $stmt->close();
            }
        }
    }
    if (isset($_POST['deletebutton'])) {

        $id = $_POST['id'];
        $nodelete = 0;

        $sql = "UPDATE `notes` SET `deletedatetime` = NOW() WHERE `notes`.`id` = $id;";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $delete = true;
            // print "deleted";
        } else {
            echo "Error: " . htmlspecialchars($conn->error);
        }

        $sql = "SELECT * FROM `notes` ";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['id'] == $id) {
                    $nodelete = $row['nodelete'] + 1;
                }
            }
        }

        $sql = "UPDATE `notes` SET `nodelete` = $nodelete WHERE `notes`.`id` = $id;";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo "Error: " . htmlspecialchars($conn->error);
        }
    }
    if (isset($_POST['restorebutton'])) {

        $id = $_POST['id'];

        $sql = "UPDATE `notes` SET `deletedatetime` = NULL WHERE `notes`.`id` = $id;";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $restore = true;
            // print "Notes restored";
        } else {
            echo "Error: " . htmlspecialchars($conn->error);
        }
    }
    if (isset($_POST['pdeletebutton'])) {

        $id = $_POST['id'];

        $sql = "DELETE FROM `notes` WHERE `notes`.`id` = $id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $delete = true;
            // print "Notes Deleted permanently";
        } else {
            echo "Error: " . htmlspecialchars($conn->error);
        }
    }
}

?>