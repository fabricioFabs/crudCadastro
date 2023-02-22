

<?php include "header.php" ?>

<nav class = "navbar navbar-light justify-content-center fs-3 mb-5"
    style="background-color: #00ff5573;">
        PHP Crud
    </nav>

<div class="container">
    <div class="row">
        <div class="form">
            <div class="form-header">
                <h1>Update Data</h1>
            </div>
            <?php

            include "php/connection.php";

            if (isset($_GET["id"])) {

                $id = $_GET["id"];

                $sql = "SELECT * FROM pessoa WHERE id={$id}";
                $run_sql = mysqli_query($conn, $sql);
                if (mysqli_num_rows($run_sql) > 0) {
                    while ($row = mysqli_fetch_assoc($run_sql)) {

            ?>
                        <div class="form-body">
                            <?php

                            if (isset($_SESSION["error"])) {
                            ?>
                                <div class="alert-danger">
                                    <h5><?php echo $_SESSION["error"]; ?></h5>
                                </div>
                            <?php
                                unset($_SESSION["error"]);
                            }

                            ?>
                            <form action="php/update-data.php" method="POST">
                                <div class="form-group">
                                    <label for="">nome</label>
                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id" id="id" class="form-control">
                                    <input type="text" value="<?php echo $row['nome'] ?>" name="nome" id="nome" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">idade</label>
                                    <input type="number" value="<?php echo $row['idade'] ?>" name="idade" id="idade" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                <label>genero: </label>&nbsp;
                                <input type="radio" class="form-check-input" name="genero" id="masculino" value="masculino">
                                <label for="masculino" class="form-input-label"> masculino </label>
                                &nbsp;
                                <input type="radio" class="form-check-input" name="genero" id="feminino" value="feminino">
                                <label for="feminino" class="form-input-label"> feminino </label>
                                </div> 
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-success">Update</button>
                                </div>
                            </form>
                        </div>
            <?php

                    }
                }
            }


            ?>

        </div>
    </div>
</div>
<?php include "footer.php" ?>