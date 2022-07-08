<?php
require_once ('../connection/Connection.php');
if (isset($_POST['type']) and $_POST['type']!='Выберите тип'
    and isset($_POST['category']) and $_POST['category']!='Выберите категорию'
    and isset($_POST['name'])  and $_POST['name']!='' and $_POST['name']!=' '
    and isset($_POST['author']) and $_POST['author']!='' and $_POST['author']!=' '
    and isset($_POST['description'])  and $_POST['description']!='' and $_POST['description']!=' '
){
    $res=new Connection();
    $res->insertMaterials();

}

?>

<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-utilities.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Материалы</title>
</head>
<body>
<div class="main-wrapper">
    <div class="content">
        <?php
        require_once("../elements/nav.html");
        ?>
        <div class="container">
            <form method="post">
                <h1 class="my-md-5 my-4">Добавить материал</h1>
                <div class="row">
                    <div class="col-lg-5 col-md-8">
                        <form>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelectType" name="type">
                                    <option selected>Выберите тип</option>
                                    <?php
                                    $table = 'type';
                                    $res=new Connection();
                                    $items=$res->getAllFromTable($table);
                                   ?>
                                    <?php foreach ($items as $item): ?>
                                    <option value="<?= $item['type'] ?>"><?= $item['type'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label for="floatingSelectType">Тип</label>
                                <?php if (isset($_POST['type'])):; ?>
                                    <?php if ($_POST['type'] == 'Выберите тип'):
                                        unset($_GET['type'])?>
                                        <div style="color: red">
                                            Пожалуйста, выберите значение
                                        </div>
                                    <?php endif ?>
                                <?php endif ?>

                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelectCategory" name="category">
                                    <option selected>Выберите категорию</option>
                                   <?php
                                   $table = 'category';
                                   $res=new Connection();
                                   $items=$res->getAllFromTable($table); ?>
                                    <?php foreach ($items as $item): ?>
                                    <option value="<?= $item['category'] ?>"><?= $item['category'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label for="floatingSelectCategory">Категория</label>
                                <?php if (isset($_POST['category'])):; ?>
                                    <?php if ($_POST['category'] == 'Выберите категорию'):
                                        unset($_GET['category'])
                                        ?>
                                        <div style="color: red">
                                            Пожалуйста, выберите значение
                                        </div>
                                    <?php endif ?>
                                <?php endif ?>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="name" type="text" class="form-control" placeholder="Напишите название"
                                       id="floatingName">
                                <label for="floatingName">Название</label>
                                <?php if (isset($_POST['name'])):; ?>
                                    <?php if ($_POST['name'] == ' ' or $_POST['name'] == '' ):
                                        unset($_GET['name'])
                                        ?>
                                        <div style="color: red">
                                            Пожалуйста, выберите значение
                                        </div>
                                    <?php endif ?>
                                <?php endif ?>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="author" type="text" class="form-control" placeholder="Напишите авторов"
                                       id="floatingAuthor">
                                <label for="floatingAuthor">Авторы</label>
                                <?php if (isset($_POST['author'])):; ?>
                                    <?php if ($_POST['author'] == ' ' or $_POST['author'] == '' ):
                                        unset($_GET['author'])
                                        ?>
                                        <div style="color: red">
                                            Пожалуйста, выберите значение
                                        </div>
                                    <?php endif ?>
                                <?php endif ?>
                            </div>
                            <div class="form-floating mb-3">
                    <textarea name="description" class="form-control" placeholder="Напишите краткое описание"
                              id="floatingDescription"
                              style="height: 100px"></textarea>
                                <label for="floatingDescription">Описание</label>
                                <?php if (isset($_POST['description'])):; ?>
                                    <?php if ($_POST['description'] == ' ' or $_POST['description'] == '' ):
                                        unset($_GET['description'])
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


            </form>
        </div>

    </div>
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