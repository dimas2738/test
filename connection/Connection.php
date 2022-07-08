<?php

class Connection
{


    public $user = 'root';
    public $password = '';
    public $db = '';
    public $table = 'materials';

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=test1', $this->user, $this->password);
    }

    public function insertCategory()
    {
        $table = 'category';
        $category = htmlspecialchars($_GET["category"]);
        $sql = "INSERT INTO $table(category) "
            . "VALUES (:category);";
        $stmt = $this->db->prepare($sql);
        $params = array("category" => $category);
        $stmt->execute($params);
        header('Location: ./list-category.php');
    }

    public function insertMaterials()
    {
        $table = 'materials';
        $name = htmlspecialchars($_POST['name']);
        $author = htmlspecialchars($_POST['author']);
        $type = htmlspecialchars($_POST['type']);
        $category = htmlspecialchars($_POST['category']);
        $description = htmlspecialchars($_POST['description']);
        $sql = "INSERT INTO $table(name, author, type, category, description) "
            . "VALUES (:name, :author, :type, :category, :description);";
        $stmt = $this->db->prepare($sql);
        $params = array("name" => $name,
            "author" => $author, "type" => $type,
            "category" => $category, "description" => $description,);
        $stmt->execute($params);
        header('Location: ./list-materials.php');
    }

    public function getAllFromTable($tableName)
    {
        $sth = $this->db->query("SELECT  * FROM $tableName");
        return $items = $sth->fetchAll();
    }

    public function insertTag()
    {
        $tag=htmlspecialchars($_POST['tag']);
        $table = 'tag';
        $sql = "INSERT INTO $table(tag) "
            . "VALUES (:tag);";
        $stmt = $this->db->prepare($sql);
        $params = array( "tag" =>  $tag,);
        $stmt->execute($params);
        header('Location: ./list-tag.php');
    }

    public function insertUrl()
    {
        $id = $_SESSION['id'];
        $table = 'url';
        $description = htmlspecialchars($_GET["description"]);
        $url = htmlspecialchars($_GET["url"]);
        $sql = "INSERT INTO $table(url,description) "
            . "VALUES (:url,:description );";
        $stmt = $this->db->prepare($sql);
        $params = array("url" => $url, "description" => $description);
        $stmt->execute($params);
        $lastId = $this->db->lastInsertId();
        $table1 = 'materials';
        $url = $this->db->query("UPDATE $table1 SET `url_id` = $lastId WHERE `id` = '$id'");
        header('Location: view-material.php?id=' . $_SESSION['id']);
    }

    public function deleteMaterial()
    {
        session_start();
        $_SESSION['id']=$_GET['id']??$_SESSION['id'];
        echo('<form style="text-align: center; margin-top: 140px" action="" method="get" name = "confirm" >
          <input style="color: #0b5ed7;width: 150px; height: 100px;" class="btn btn-primary"  name = "yes_material" type="submit" value="yes"/>
          <input  style="color: red" class="btn btn-primary" name = "no"  type="submit" value="no" />
          </form>');
        if (isset($_GET['yes_material'])){
            $id= $_SESSION['id'];
            $table = 'materials';
            $this->db = new PDO('mysql:host=localhost;dbname=test1', 'root', '');
            $items = $this->db->query("DELETE FROM $table WHERE  `id`= '$id'");
            header('Location: list-materials.php');
        }}
    public function deleteTag()
    {
        session_start();
        $_SESSION['tag_id_from_tags']=$_GET['tag_id_from_tags']??$_SESSION['tag_id_from_tags'];
        echo('<form style="text-align: center; margin-top: 140px" action="" method="get" name = "confirm" >
          <input  style="color: #0b5ed7;width: 150px; height: 100px;" class="btn btn-primary"  name = "yes_tag_from_tag" type="submit" value="yes"/>
          <input style="color: red" class="btn btn-primary" name = "no_tag"  type="submit" value="no" />
          </form>');
        if (isset($_GET['yes_tag_from_tag'])){
            $id=$_SESSION['tag_id_from_tags'];
            $table = 'tag';
            $this->db = new PDO('mysql:host=localhost;dbname=test1', 'root', '');
            $items = $this->db->query(" DELETE FROM $table WHERE  `id`= '$id'");
            header('Location: list-tag.php');
        };}

    public function deleteUrl()
    {
        session_start();
        $_SESSION['material_id']=$_GET['material_id']??$_SESSION['material_id'];
        echo('<form style="text-align: center; margin-top: 140px" action="" method="get" name = "confirm" >
          <input  style="color: #0b5ed7;width: 150px; height: 100px;" class="btn btn-primary"  name = "yes_url" type="submit" value="yes"/>
          <input style="color: red" class="btn btn-primary" name = "no_tag"  type="submit" value="no" />
          </form>');
        if (isset($_GET['yes_url'])){
            $id_category= $_SESSION['material_id'];
            $table = 'materials';
            $this->db = new PDO('mysql:host=localhost;dbname=test1', 'root', '');
            $items = $this->db->query("UPDATE $table SET `url_id` = null WHERE `id` = $id_category");
            header('Location: view-material.php?id='.$_SESSION['material_id']);
        };}

    public function deleteCategory()
    {
        session_start();
        $_SESSION['id_category']=$_GET['id_category']??$_SESSION['id_category'];
        echo('<form style="text-align: center; margin-top: 140px" action="" method="get" name = "confirm" >
          <input  style="color: #0b5ed7;width: 150px; height: 100px;" class="btn btn-primary"  name = "yes_category" type="submit" value="yes"/>
          <input style="color: red" class="btn btn-primary" name = "no_tag"  type="submit" value="no" />
          </form>');
        if (isset($_GET['yes_category'])){
            $id_category= $_SESSION['id_category'];
            $table = 'category';
            $this->db = new PDO('mysql:host=localhost;dbname=test1', 'root', '');
            $items = $this->db->query("DELETE FROM $table WHERE  `id`= '$id_category'");
            header('Location: list-category.php');
        };}

    public function find()
    {
        $search=htmlspecialchars($_GET['find']);
        $table = 'materials';
        $this->db = new PDO('mysql:host=localhost;dbname=test1', 'root', '');
        $sth = $this->db->query("SELECT  * FROM $table
                        WHERE `name`LIKE '%".$search."%' 
                        OR `author`LIKE '%".$search."%' 
                        OR `type`LIKE '%".$search."%'
                        OR `category`LIKE '%".$search."%'");
        return $items = $sth->fetchAll();}

    public function search()
    {
        $search=htmlspecialchars($_GET['tag']);
        $table = 'materials';
        $this->db = new PDO('mysql:host=localhost;dbname=test1', 'root', '');
        $sth = $this->db->query("SELECT  * FROM $table WHERE `tag` LIKE '%".$search."%' ");
        return $items = $sth->fetchAll();
    }

    public function leftJoin()
    {

        $id = $_SESSION['id'];
        $this->db = new PDO('mysql:host=localhost;dbname=test1', 'root', '');
        return $items = $this->db->query("SELECT materials.id as material_id, materials.name as material_name, materials.url_id as material_url_id,
	url.id as url_id, url.description as url_description, url.url as url_url FROM materials LEFT JOIN url ON materials.url_id=url.id");

    }

    public function selectById($tableName)
    {

        $id = $_SESSION['id'];
        return $items = $this->db->query("SELECT * FROM $tableName WHERE  `id` = '$id'");
    }

    public function selectByIdMaterials($tableName)
    {
        $id = $_GET['id'] ?? $_SESSION["id"];
        $_SESSION["id"] = $id;
        return $item = $this->db->query("SELECT * FROM $tableName WHERE `id`= '$id'");
    }


    public function updateTagInMaterials()
    {
        $table = 'materials';
        $tag = htmlspecialchars($_GET['tag']);
        $id = htmlspecialchars($_SESSION['id']);
        $tags = $this->db->query("UPDATE $table SET `tag` = '$tag' WHERE `id` = $id");
    }
    public function deleteTagFromMaterials()
    {
        session_start();
        if ($_SESSION['tag']=$_GET['tag']??$_SESSION['tag']){
            echo('<form action="" method="get" name = "confirm" >
          <input  style="color: #0b5ed7;width: 150px; height: 100px;" class="btn btn-primary"  name = "yes_tag" type="submit" value="yes"/>
          <input style="color: red" class="btn btn-primary" name = "no_tag"  type="submit" value="no" />
          </form>');
        }

        if (isset($_GET['yes_tag'])){
            $id=$_SESSION['id'];
            $table = 'materials';
            $this->db = new PDO('mysql:host=localhost;dbname=test1', 'root', '');
            $this->db->query("UPDATE $table SET `tag` = null WHERE `id` = '$id'");

            header('Location: view-material.php?id='.$_SESSION['id']);
        }
        ;}

}