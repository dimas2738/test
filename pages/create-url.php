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
        <?php
        session_start();
        $id = '';
        $_SESSION['id_1'] = $id;
        ?>
        <div class="container">
            <h1 class="my-md-5 my-4">Добавить ссылку</h1>
            <div class="row">
                <div class="col-lg-5 col-md-8">
                    <form method="get">
                        <div class="form-floating mb-3">
                            <input name="description" type="text" class="form-control" placeholder="Напишите подпись"
                                   id="floatingName">
                            <label for="floatingModalSignature">Подпись</label>
                            <?php if (isset($_GET['description'])):; ?>
                                <?php if ($_GET['description'] == ' ' or $_GET['description'] == '' ):
                                    unset($_GET['description'])
                                    ?>
                                    <div style="color: red">
                                        Пожалуйста, выберите значение
                                    </div>
                                <?php endif ?>
                            <?php endif ?>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="url" type="text" class="form-control" placeholder="Введите ссылку"
                                   id="floatingName">
                            <label for="floatingModalLink">Ссылка</label>
                            <?php if (isset($_GET['url'])):; ?>
                                <?php if ($_GET['url'] == ' ' or $_GET['url'] == '' ):
                                    unset($_GET['url'])
                                    ?>
                                    <div style="color: red">
                                        Пожалуйста, выберите значение
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
    require_once ('../connection/Connection.php');
    if (isset($_GET["description"]) and $_GET["description"]!='' and $_GET["description"]!=' '
        and isset($_GET["url"]) and $_GET["url"]!='' and $_GET["url"]!=' ') {
        $res = new Connection();
        $res->insertUrl();
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