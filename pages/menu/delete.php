<?php
$id = strip_tags($_GET['id']);

$sql = "DELETE FROM menu WHERE id_menu = $id";
$proses->sqlAction($sql);
echo '<script>window.location="index.php?page=menu&delete"</script>';
