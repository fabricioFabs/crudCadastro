<dialog>
    <div class="container">
        <div class = "sair">
            <button type="submit" name="submit" class="btn btn-danger" > cancelar </button>
        </div>
            <div class="row">
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
                        <form action="/dyn/php/insert-data.php" method="POST">
                            <div class="form-group">
                                <label for="">nome</label>
                                <input type="text" name="nome" id="nome" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">idade</label>
                                <input type="number" name="idade" id="idade" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-success">Save</button>
                            </div>
                            <div class="form-group mb-3">
                            <label>genero: </label>&nbsp;
                            <input type="radio" class="form-check-input" name="genero" id="masculino" value="masculino">
                            <label for="masculino" class="form-input-label"> masculino </label>
                            &nbsp;
                            <input type="radio" class="form-check-input" name="genero" id="feminino" value="feminino">
                            <label for="feminino" class="form-input-label"> feminino </label>
                            </div> 
                        </form>
                </div>
            </div>
    </div>
</dialog>
<?include "footer.php"?>