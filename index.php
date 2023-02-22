<?php include("header.php");
session_start(); ?>

<div class="container">
    <div class="card">
        <?php
        include "php/connection.php";
        $sql = "SELECT * FROM pessoa";
        $run_sql = mysqli_query($conn, $sql);
        $row1 = mysqli_num_rows($run_sql);
        ?>
        <h4>pessoa ( <?php echo  $row1; ?> )</h4>

        <button class="btn btn-success">Add Student</button></a>
        
        <?php
        include "add-data.php" 
        ?>
    </div>
</div>

<div class="container">
    <?php

    if (isset($_SESSION["success"])) {
    ?>
        <div class="alert-success">
            <h5><?php echo $_SESSION["success"]; ?></h5>
        </div>
    <?php
        unset($_SESSION["success"]);
    }
    ?>

    <div class="table-responsive">
        <?php

        include "php/connection.php";
        if(isset($_GET["page"])){
            $page=$_GET["page"];
        }else{
            $page = 1;
        }
        $limit = 3;
        $offset=($page - 1)*$limit;
        $sql = "SELECT * FROM pessoa ORDER BY id DESC LIMIT $offset,$limit";

        $run_sql = mysqli_query($conn, $sql);
        if (mysqli_num_rows($run_sql) > 0) {
        ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th> Nome</th>
                        <th> idade</th>
                        <th> genero</th>
                        <th>Editar</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($run_sql)) { ?>
                        <tr>
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["nome"] ?></td>
                            <td><?php echo $row["idade"] ?></td>
                            <td><?php echo $row["genero"] ?></td>
                            <td><a href="edit-data.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Edit</a></td>
                            <td><a href="/dyn/php/delete-data.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php }

        $sql = "SELECT * FROM pessoa";
        $run_sql = mysqli_query($conn, $sql);
        $total_record = mysqli_num_rows($run_sql);
        $total_page = ceil($total_record / $limit);
        ?>
        <div class="container">
            <div class="pagination">
                <?php
                if($page > 1){
                   echo "<a href='index.php?page=".($page - 1)."' class='btn btn-success'>Prev</a>";
                }
                for ($i = 1; $i < $total_page; $i++) {
                    if($i==$page){
                        $active="active";
                    }else{
                        $active="";
                    }
                
                   echo  "<a href='index.php?page=".$i."' class='btn btn-success {$active}'>{$i}</a>";
                }
                if($i>$page){
                    echo "<a href='index.php?page=".($page + 1)."' class='btn btn-success'>Next</a>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>