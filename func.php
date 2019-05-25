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

function parseTitle($url) {
    $html = file_get_contents($url);
    if (!$html){return $url;}
    
	$matches = array();
	preg_match("/<title>(.*)<\/title>/is", $html, $matches);
	if (count($matches) > 1) {
		return trim($matches[1]);
	} else {
		return $url;
	}
}

$id_folder = $_REQUEST['id_folder'];
$name = $_REQUEST['name'];

if ($_REQUEST['type'] == 'link') {
        $title = parseTitle($name);
        // var_dump($title);
        if($title == false){
            echo json_encode(array('succes'=>0,'msg'=>'Это не ссылка'));
        return false;
        }

    $arr = array('title'=>$title, 'link'=>$name, 'folder_id'=>$id_folder);
    $db->query('INSERT INTO link', $arr);
    $id = $db->getInsertId();
    if ($id) {
        echo json_encode(array('succes'=>1,'msg'=>'Добавлено'));
        return false;
    }
    echo json_encode(array('succes'=>0,'msg'=>'Не добавлено'));
    return false;
}

if ($_REQUEST['type'] == 'folder') {
    $arr = array('text'=>$name, 'parent_id'=>$id_folder);
    $db->query('INSERT INTO treeview_items', $arr);
    $id = $db->getInsertId();
    if ($id) {
        echo  json_encode(array('succes'=>1,'msg'=>'Добавлено'));
        return false;
    }
    echo json_encode(array('succes'=>0,'msg'=>'Не добавлено'));
    return false;
}


if ($_REQUEST['type'] == 'delete_folder') {
    $db->query('DELETE FROM treeview_items WHERE id =?', $id_folder);
    echo json_encode(array('succes'=>1,'msg'=>'Удалил'));
    return false;
}


if ($_REQUEST['type'] == 'delete_link') {
    $db->query('DELETE FROM link WHERE id =?', $_REQUEST['id_link']);
    echo json_encode(array('succes'=>1,'msg'=>'Удалил'));
    return false;
}

// CREATE TABLE `link` (
//     `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'Id',
//     `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL  COMMENT'Название',
//     `link` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL  COMMENT'Название',
//     `folder_id` INT(11) NOT NULL COMMENT'id папки')
//     ENGINE = InnoDB;
?>