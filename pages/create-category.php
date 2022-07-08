<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-utilities.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Категории</title>
</head>
<body>
<div class="main-wrapper">
    <div class="content">
       <?php
       require_once("../elements/nav.html");
       ?>
        <div class="container">
            <h1 class="my-md-5 my-4">Добавить категорию</h1>
            <div class="row">
                <div class="col-lg-5 col-md-8">

                    <form method="get" >
                        <div class="form-floating mb-3">
                            <input name="category" type="text" class="form-control" placeholder="Напишите название" id="floatingName">
                            <label for="floatingName">Название</label>
                            <?php if (isset($_GET['category'])):; ?>
                                <?php if ($_GET['category'] == ' ' or $_GET['category'] == '' ):
                                    unset($_GET['category'])
                                    ?>
                                    <div style="color: red">
                                        Пожалуйста, выберите значение
                                    </div>
                                <?php endif ?>
                            <?php endif ?>
                        </div>
                        <button class="btn btn-primary" type="submit">Добавить</button>
                    </form>
                    <?php
                    require_once ('../connection/Connection.php');
                    if (isset($_GET["category"])
                       and $_GET["category"]!='' and $_GET["category"]!=' '
                    ){
                        $res=new Connection();
                        $res->insertCategory();
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once("../elements/footer.html");
    ?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

</body>
</html>