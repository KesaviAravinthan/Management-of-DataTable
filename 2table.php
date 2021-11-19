<?php
include 'dbh.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP READ DATA</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous" />
</head>
<style>
    #frm ,#tabledata{
        background-color: rgba(172,251,235);
        padding-top: 1.5rem;
    }
    #frm_edit{
        background-color:rgba(172,251,235);
        padding-top: 1.5rem;

    }
    </style>



<body>

    <div class="row  d-flex justify-constent-center" id="tabledata">
        <div class="text-center h1"> STUDENT DATA TABLE</div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">FIRSTNAME</th>
                <th scope="col">DELETE</th>
                <th scope="col">EDIT</th>
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
                    <td><button type="button" id="del" class="btn btn-primary del" data-id='<?php echo $row["id"]; ?>'>DEL</button></td>
                    <td><button type="button" id="edit" class="btn btn-primary edit" data-id='<?php echo $row["id"]; ?>'>Edit</button></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <form id="frm" class="row mt-5 d-flex" >
                        <div class="mb-3 col mx-3">
                            <label class="form-label">Student Name</label>
                            <input id="name" name="name" type="text">
                        </div>
                        <div class="text-center col"><button type="button" id="submit" class="btn  btn-primary">Submit</button></div>
                    </form>


<form id="frm_edit" class="row mt-5">
    <div class="mb-3 col mx-3 border border-dark p-3">
        <div><label class="form-label">Student ID</label>
        <input  id="id_num" name="id_num" type="text"></div>
        <div><label class="form-label">Student Name</label>
        <input  id="student_name" name="student_name" type="text"></div>
    </div>
    <div  class="text-center col"><button type="button" id="update" class="update btn  btn-success">Update</button></div>
</form>

    <div id="test"></div>



    <script>
        $(document).ready(function() {
            $("#submit").click(function() {
                $.ajax({
                    url: '2insert.php',
                    type: 'post',
                    data: $("#frm").serialize(),
                    success: function(d) {
                        $("<tr></tr>").html(d).appendTo(".table");
                        $("#frm")[0].reset();
                    }
                });
            });

            $(document).on("click", ".del", function() {
                let del = $(this);
                let id = $(this).attr("data-id");
                console.log(id);
                var name = del.closest("tr").find("td:eq(1)").text();
                console.log(name);
                $.ajax({
                    type: "get",
                    data: {
                        name: name,
                        id : id
                    },
                    url: "2delete.php",
                    success: function(data) {
                       $("#test").html(data);
                       $(".table").load('2load_table.php');
                    //    $(del).closest("tr").remove();
                    }
                });
            });

            $(document).on("click", "#edit", function() {
               let edit = $(this);
                let id = $(this).attr("data-id");
                console.log(id);
                var name = edit.closest("tr").find("td:eq(1)").text();
                console.log(name);
                // $("input:text").val("Glenn Quagmire");
                $("#student_name").val(name);
                $("#id_num").val(id);
                    
               
            });

            $("#update").click(function() {
                $.ajax({
                    url: '2edit.php',
                    type: 'post',
                    data: $("#frm_edit").serialize(),
                    success: function(d) {
                        $("<tr></tr>").html(d).appendTo(".table");
                        $("#frm_edit")[0].reset();
                        $(".table").load('2load_table.php');
                    }
                });
            });

        });
    </script>
</body>

</html>