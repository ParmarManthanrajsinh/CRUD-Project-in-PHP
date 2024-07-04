<br><br>

<div class="container border">
    <form action="/CRUD/main.php" method="post">
        <div class="mb-3">
            <label for="InputTitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="InputTitle" placeholder="title" aria-describedby="TitleHelp"
                name="title">
        </div>
        <div class="mb-3">
            <label for="InputDescription" class="form-label">Description</label>
            <textarea class="form-control" id="FormDescription" placeholder="description" rows="3"
                name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="insertbutton">Add</button>
    </form>
</div>