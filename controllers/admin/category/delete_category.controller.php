
<?php
require("../../../database/database.php");
require("../../../models/admin/category/category.process.php");

// if (isset($_GET['id'])) {
//     $category_id = $_GET['id'];
//     delete_category($category_id);
//     // header("location:/category");
//     // exit;   

// }
    
    $img = $_POST['image'];
    echo $img;
    // delete_image_folder($img);}
    
?>