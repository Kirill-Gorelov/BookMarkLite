
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookmarks";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
mysqli_set_charset($conn, "utf8");
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$sql = "SELECT * FROM `treeview_items` ";
$res = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	//iterate on results row and create new index array of data
	while( $row = mysqli_fetch_assoc($res) ) { 
		$data[] = $row;
	}
	$itemsByReference = array();
// var_dump($data);
   usort
( 
    $data,
    create_function
    (   
        '$a,$b', 
        'return ($a["parent_id"] > $b["parent_id"]);' 
    )
);

// Build array of item references:
foreach($data as $key => &$item) {
   $itemsByReference[$item['id']] = &$item;
   // Children array:
   $itemsByReference[$item['id']]['children'] = array();
   // Empty data class (so that json_encode adds "data: {}" ) 
   $itemsByReference[$item['id']]['data'] = new StdClass();
}

// Set items as children of the relevant parent item.
foreach($data as $key => &$item)
   if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
      $itemsByReference [$item['parent_id']]['children'][] = &$item;

// Remove items that were added to parents elsewhere:
foreach($data as $key => &$item) {
   if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
      unset($data[$key]);
}

usort
( 
    $data,
    create_function
    (   
        '$a,$b', 
        'return ($a["id"] > $b["id"]);' 
    )
);
// Encode:
echo json_encode($data);
?>
