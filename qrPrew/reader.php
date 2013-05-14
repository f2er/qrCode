<?php
	include('config.php');

	$file = $_POST['fileUrl'];

    //插入数据库

	$id = addPic($file);

    $JSONurl= array();
    $JSONurl['code'] = 100;
    $JSONurl['url'] = "pic.php?id=$id";
    echo json_encode($JSONurl);
?>