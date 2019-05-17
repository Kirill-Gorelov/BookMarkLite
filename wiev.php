<script src="delete_link.js" ></script>
<?php
error_reporting(0);
include './vendor/autoload.php';

$db = new Dibi\Connection([
    'driver'   => 'mysqli',
    'host'     => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'bookmarks',
]);

$result = $db->query('SELECT * FROM link WHERE folder_id=? ORDER BY id DESC',$_REQUEST['folder_id']);
// var_dump($_REQUEST);
foreach ($result as $row) { ?>
<div class="card m-2">
  <h5 class="card-header"><?=$row->title;?></h5>
  <div class="card-body">
    <p class="card-text"><?=$row->description?></p>
    <a href="<?=$row->link?>" target="_blank" class="btn btn-primary btn-sm">Перейти</a>
    <button type="button" class="btn btn-danger m-2 delete_link btn-sm" data-idlink="<?=$row->id?>">Удалить ссылку</button>
  </div>
</div>
<?php } ?>


<script>

</script>