<?php
include 'dbh.php';
?>
<thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">firstname</th>
                <th scope="col">del</th>
                <th scope="col">edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * from students;";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die('QUERY FAIL!');
            }
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['id'];  ?></td>
                    <td><?php echo $row['firstname'];  ?></td>
                    <td><button type="button" id="del" class="btn btn-sm btn-primary del" data-id='<?php echo $row["id"]; ?>'>DEL</button></td>
                    <td><button type="button" id="edit" class="btn btn-sm btn-primary edit" data-id='<?php echo $row["id"]; ?>'>Edit</button></td>
                </tr>
            <?php
            }
            ?>
        </tbody>