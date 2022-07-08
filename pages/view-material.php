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
        require_once ('../connection/Connection.php');
        require_once("../elements/nav.html");
        ?>

        <?php
        session_start();

        $table = 'materials';
        $res=new Connection();
        $res->selectByIdMaterials($table);
        $item =  $res->selectByIdMaterials($table);
        ?>

        <?php
        foreach ($item

        as $item):
        ?>
        <div class="container">
            <h1 class="my-md-5 my-4"><?= $item['name'] ?></h1>
            <div class="row mb-3">
                <div class="col-lg-6 col-md-8">
                    <div class="d-flex text-break">
                        <p class="col fw-bold mw-25 mw-sm-30 me-2">Авторы</p>
                        <p class="col"><?= $item['author'] ?></p>
                    </div>
                    <div class="d-flex text-break">
                        <p class="col fw-bold mw-25 mw-sm-30 me-2">Тип</p>
                        <p class="col"><?= $item['type'] ?></p>
                    </div>
                    <div class="d-flex text-break">
                        <p class="col fw-bold mw-25 mw-sm-30 me-2">Категория</p>
                        <p class="col"><?= $item['category'] ?></p>
                    </div>
                    <div class="d-flex text-break">
                        <p class="col fw-bold mw-25 mw-sm-30 me-2">Описание</p>
                        <p class="col"><?= $item['description'] ?></p>
                    </div>
                </div>
            </div>
            <?php
            endforeach;
            ?>

            <div class="row">
                <div class="col-md-6">
                    <form>
                        <h3>Теги</h3>
                        <div class="input-group mb-3">
                            <form action="">
                                <select class="form-select" name="tag" id="selectAddTag" aria-label="Добавьте автора">
                                    <option selected>Выберите тег</option>
                                    <?php
                                    $table = 'tag';
                                    $res=new Connection();
                                    $tags=$res->getAllFromTable($table);

                                    ?>
                                    <?php
                                    $count = 0;
                                    foreach ($tags as $tag):
                                        $count += 1;
                                        ?>
                                        <option value="<?= $tag['tag'] ?>"><?= $tag['tag'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </form>
                            <button class="btn btn-primary" type="submit">Добавить</button>
                            <?php
                            if (isset($_GET['tag'])) {
                                $res=new Connection();
                                $res->updateTagInMaterials();
                            }


                            ?>
                        </div>
                    </form>
                    <ul class="list-group mb-4">
                        <?php
                        if (isset($_SESSION["id"])) {
                            $table = 'materials';
                            $res=new Connection();
                            $items=$res->selectById($table);
                        }

                        ?>
                        <?php
                        foreach ($items as $item):
                            ?>
                            <?php
                            if ($item['tag'] != null):
                                ?>

                                <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                    <a href="list-materials.php?tag=<?= $item['tag'] ?>" class="me-3">
                                        <?= $item['tag'] ?>
                                    </a>
                                    <a href="delete.php?tag=<?= $item['tag'] ?>" class="text-decoration-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor"
                                             class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd"
                                                  d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </a></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-between mb-3">
                        <h3>Ссылки</h3>

                        <?php
                        require_once('../connection/Connection.php');
                        $res = new Connection();
                        $items=$res->leftJoin();

                        ?>

                        <a class="btn btn-primary" href="create-url.php?id=<?= $_SESSION['id'] ?>" role="button">Добавить</a>
                    </div>

                    <ul class="list-group mb-4">

                        <?php foreach ($items as $item): ?>
                            <?php
                            if ($item['url_id'] != null):
                                ?>
                                <?php
                                if ($item['material_id'] == $_SESSION['id']):
                                    ?>
                                    <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                        <a href="#" class="me-3">
                                            <?= $item["url_description"] ?: $item["url_url"] ?>
                                        </a>
                                        <span class="text-nowrap">
                            <a href="#" class="text-decoration-none me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                            </a>
                        <a href="delete.php?material_id=<?= $item["material_id"] ?>" class="text-decoration-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd"
                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </a>
                        </span>
                                    </li>
                                <?php
                                endif; ?>
                            <?php
                            endif; ?>
                        <?php endforeach; ?>
                    </ul>
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
