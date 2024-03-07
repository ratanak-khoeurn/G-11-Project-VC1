<?php
require "../../../database/database.php";
require "../../../models/add.user/add.user.model.php";
$id = $_GET['id'];
$pcture = $_GET['image'];
$role = $_GET['role'];
?>
<script>
    alert('Are you sure to delete?');
</script>
<?php
delete_admin($id);
delete_image_admin($pcture);
if($role == 2){
    header('location:/manager_admin');
    
}else{
    header('location:/customer_admin');

}
exit;
?>