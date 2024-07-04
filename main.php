<!doctype html>
<html lang="en">

<?php
include "connection.php";
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mnotes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

    <?php 
    include "navbar_home.php"; 
    include "alert.php";
    include "insert.php";
    ?>
    

    <div class="container">
        <br><br><br>

        <!-- <button class="btn btn-primary">
            <a href="insert.php" style="color: white; text-decoration: none;">Add Notes</a>
        </button> -->

        <?php include "table.php" ?>
    </div>



</body>

</html>