<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert Notes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="border.css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <?php include "navbar_EditNotes.php"; ?>

    <br><br>

    <div class="container border">
        <form action="/CRUD/main.php" method="post">

            <?php
            $id = $_POST['id'];
            // $hid = array();
            $title = "";
            $description = "";
            $nodelete = $_POST['nodelete'];

            $conn = new mysqli("localhost", "root", "", "notes");
            $sql = "SELECT * FROM `notes` ";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['id'] == $id) {
                        $title = $row['title'];
                        $description = $row['description'];
                    }
                }
            }

            // $sql = "SELECT * FROM `history`";
            // $result = mysqli_query($conn, $sql);
            // if ($result) {
            //     while ($row = mysqli_fetch_assoc($result)) {
            //         if ($row['pre_id'] == $id) {
            //             array_push($hid, $row['id']);
            //         }
            //     }
            // }
            // print_r($hid);
            
            print "<input type='hidden' name='id' value=" . $id . ">";
            print "<input type='hidden' name='nodelete' value=" . $nodelete . ">";
            ?>

            <div class="mb-3">
                <label for="InputTitle" class="form-label">Title</label>
                <?php
                print "<input type='text' class='form-control' id='InputTitle' aria-describedby='TitleHelp' name='title' value='$title'>";
                ?>
            </div>
            <div class="mb-3">
                <label for="InputDescription" class="form-label">Description</label>
                <?php
                print "<textarea class='form-control' id='FormDescription' rows='3' name='description'>$description</textarea>";
                ?>

            </div>
            <div class="mb-3">
                <?php
                print "<label for='No_of_Delete' class='form-label'>No of deletes $nodelete</label>";
                ?>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="editbutton">Update</button>
            </div>
            <div class="mb-3">
                <button class='btn btn-primary' name='deletebutton'>Delete</button>
            </div><br>


        </form>
    </div>

    <br>
    <!-- History table -->
    <div class="container border">
        <div class="mb-3">
            <label>Resent Changes in the Notes</label><br><br>
        </div>

        <table class="table table-bordered ">
            <thead>
                <tr class="table-primary">
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date/Time</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody></tbody>
            <?php

            $conn = mysqli_connect("localhost", "root", "", "notes");
            if (mysqli_connect_errno()) {
                die("Connection fall " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM `history`";
            $result = mysqli_query($conn, $sql);
            $no = 1;

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row["pre_id"] == $id) {
                        print "<tr> <form action='/CRUD/main.php' method='post'>
                                <input type='hidden' name='id' value=" . $row['id'] . ">
                                <th scope='row'> " . $no . "</th>
                                <td> " . $row["title"] . "</td>
                                <td>" . $row["description"] . "</td>
                                <td>" . $row["datetime"] . "</td>
                                <td>" . "<button class='btn btn-sm btn-primary' name='historydelete'>Delete</button>" . "</td>
                                </form></tr>";
                        $no++;
                    }
                }
            }

            ?>
            </tbody>
        </table>

    </div>


</body>

</html>