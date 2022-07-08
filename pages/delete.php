<?php
require_once ('../connection/Connection.php');
//delete material

if (isset($_GET['id']) or (isset($_GET['yes_material'])) ){
    $res= new Connection();
    $res->deleteMaterial();



}

//delete tag

else if (isset($_GET['tag']) or (isset($_GET['yes_tag'])) ){
    $res= new Connection();
    $res->deleteTagFromMaterials();

}
//delete tag from tags

else if (isset($_GET['tag_id_from_tags']) or (isset($_GET['yes_tag_from_tag'])) ){
    $res= new Connection();
    $res->deleteTag();

}


//delete category
else if (isset($_GET['id_category']) or (isset($_GET['yes_category'])) ){
    $res= new Connection();
    $res->deleteCategory();

}

//delete url
else if (isset($_GET['material_id']) or (isset($_GET['yes_url'])) ){
    $res= new Connection();
    $res->deleteUrl();

}


else header('Location: ../index.php');


?>











