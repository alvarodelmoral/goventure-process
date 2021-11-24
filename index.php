<?php
session_start();
require_once "php/connection.php";
$connection = connection();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/style.css" title="style" />
    <link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.min.css" />
    <link rel="icon" type="image/png" href="images/logo.png" />
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-a11y="true"></script>
    <script src="js/functions.js"></script>
    <title>Goventure Process</title>
</head>

<body>
    <p>
    <h2>GESTOR DE TAREAS</h2>
    </p>
    <table class="table">
        <thead class="">
            <tr>
                <th scope="col">
                    <div class="col-md-5">
                        <input type="text" class="form-control" id="task" placeholder="Nueva tarea...">
                    </div>
                </th>
                <th scope="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="php" id="php">
                        <label class="form-check-label" for="php">
                            PHP
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="javascript" id="javascript">
                        <label class="form-check-label" for="javascript">
                            JavaScript
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="css" id="css">
                        <label class="form-check-label" for="css">
                            CSS
                        </label>
                    </div>
                </th>
                <th scope="col"> <button type="button" class="btn btn-primary save"
                        onclick="addRow(document.getElementById('task').value,document.getElementById('php').checked,document.getElementById('javascript').checked,document.getElementById('css').checked)">Añadir</button>
                </th>
            </tr>
        </thead>
        <thead class="thead-dark">
            <tr>
                <th scope="col">TAREA</th>
                <th scope="col">CATEGORÍAS</th>
                <th scope="col">BORRAR</th>
            </tr>
        </thead>
        <tbody id="dataTable">

            <?php
            $sql = "SELECT task.id, name, category_id, 
            if(categoryType.css = 1, 'CSS', '') AS 'CSS', 
            if(categoryType.php = 1, 'PHP', '') AS 'PHP',  
            if(categoryType.javascript = 1, 'JavaScript', '') AS 'JavaScript'  
            FROM task
            INNER JOIN categoryType ON categoryType.id = task.category_id";
            $result = mysqli_query($connection, $sql) or die("database error:" . mysqli_error($connection));
            while ($show = mysqli_fetch_assoc($result)) {
            ?>
            <tr id="<?php echo $show['id'] ?>">

                <td><?php echo $show['name'] ?></td>

                <td><?php echo $show['PHP'];
                        echo '<br>';
                        echo $show['JavaScript'];
                        echo '<br>';
                        echo $show['CSS'];
                        ?>
                </td>

                <td>
                    <button type="button" class="btn btn-danger delete"
                        onclick="deleteRow('<?php echo $show['id'] ?>','<?php echo $show['category_id'] ?>')"><i
                            class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>



<script src="vendors/js/jquery-3.4.1.min.js"></script>
<script src="vendors/js/jquery.validate.min.js"></script>
<script src="vendors/js/bootstrap.min.js"></script>

</html>