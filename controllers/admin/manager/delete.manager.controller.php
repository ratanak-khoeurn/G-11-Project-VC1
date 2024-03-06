<?php
require "../../../database/database.php";
require "../../../models/add.user/add.user.model.php";
$id = $_GET['id'];
$pcture = $_GET['image'];
?>
<script>
    alert('Are you sure to delete?');
</script>
<?php
delete_admin($id);
delete_image_admin($pcture);
header('location:/manager_admin');
exit;
?>