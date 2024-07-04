<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert Notes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .border{
            border: 1px solid rgb(140, 140, 140);
            border-radius: 15px;
            padding: 20px;
        }
    </style>

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <?php include "navbar_AddNotes.php"; ?>

    <br><br>

    <div class="container border">
        <form action="/CRUD/main.php" method="post">
            <div class="mb-3">
                <label for="InputTitle" class="form-label">Title</label>
                <input type="text" class="form-control" id="InputTitle" aria-describedby="TitleHelp" name="title">
            </div>
            <div class="mb-3">
                <label for="InputDescription" class="form-label">Description</label>
                <textarea class="form-control" id="FormDescription" rows="3" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="insertbutton">Add</button>
        </form>
    </div>

</body>

</html>