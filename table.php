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
    <tbody>


        <?php
        $sql = "SELECT * FROM `notes`";
        $result = mysqli_query($conn, $sql);
        $no = 1;

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['deletedatetime'] == NULL) {
                    print "<tr> <form action='/CRUD/edit_and_delete.php' method='post'>
                    <input type='hidden' name='id' value=" . $row['id'] . ">
                    <input type='hidden' name='title' value=" . $row['title'] . ">
                    <input type='hidden' name='description' value=" . $row['description'] . ">
                    <input type='hidden' name='nodelete' value=" . $row['nodelete'] . ">
                    <th scope=\"row\"> " . $no . "</th>
                    <td> " . $row["title"] . "</td>
                    <td>" . $row["description"] . "</td>
                    <td>" . $row["datetime"] . "</td>
                    <td>" . "<button class='btn btn-sm btn-primary' name='editbutton'>Edit</button>" . "</td>
                    </form></tr>";
                } else {
                    print "<tr> <form action='/CRUD/main.php' method='post'>
                    <input type='hidden' name='id' value=" . $row['id'] . ">
                    <th scope=\"row\"> " . $no . "</th>
                    <td><del> " . $row["title"] . "</del></td>
                    <td><del>" . $row["description"] . "</del></td>
                    <td>" . $row["datetime"] . "</td>
                    <td>" . "<button class='btn btn-sm btn-primary' style='margin: 0px 5px 0px 0px' name='restorebutton'>Restore</button><button class='btn btn-sm btn-primary' name='pdeletebutton'>Delete</button>" . "</td>
                    </form></tr>";
                }
                $no++;
            }
        }
        ?>


    </tbody>
</table>