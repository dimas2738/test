<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-utilities.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Теги</title>
</head>
<body>
<div class="main-wrapper">
    <div class="content">
        <?php
        require_once("../elements/nav.html");
        ?>
        <div class="container">
            <h1 class="my-md-5 my-4">Добавить тег</h1>
            <div class="row">
                <div class="col-lg-5 col-md-8">
                    <form method="post">
                        <div class="form-floating mb-3">
                            <input name="tag" type="text" class="form-control" placeholder="Напишите название"
                                   id="floatingName">
                            <label for="floatingName">Название</label>
                            <?php if (isset($_POST['tag'])):; ?>
                                <?php if ($_POST['tag'] == '' or $_POST['tag'] == ' '):
                                    unset($_GET['tag'])
                                    ?>
                                    <div style="color: red">
                                        Пожалуйста, заполните поле
                                    </div>
                                <?php endif ?>
                            <?php endif ?>
                        </div>
                        <button class="btn btn-primary" type="submit">Добавить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once('../connection/Connection.php');
    if (isset($_POST['tag']) and $_POST['tag'] != '' and $_POST['tag'] != ' ') {
        $res = new Connection();
        $res->insertTag();
        unset($_POST['tag']);
    }
    ?>
    <?php
    require_once("../elements/footer.html");
    ?>
</div>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

</body>
</html>