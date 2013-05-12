<?php
	include('config.php');
    // 設定圖檔上傳路徑
    define('UPLOAD_PATH', 'images/');

    //header("Content-Type:text/html;charset=utf-8");
	$fileUrl = $_POST['fileUrl'];
    /*$encodedData = str_replace(' ','+',$fileUrl);
    $encodedData = preg_replace('/^data:image\/(png|jpeg);base64,/','',$encodedData);
    $decocedData = base64_decode($encodedData);
    $file = UPLOAD_PATH . decocedData . '.png';
    header("Content-type: image/png");*/

    //插入数据库
	echo $_FILES['file_upload']['name'];
	exit;
		$InsertSql = "insert into tb_prew(url) values('$file')";
		querySql($InsertSql);

    //返回地址
    //$urlSql = "select url from tb_prew where url='".$file."'";
    $JSONurl= array();
    $JSONurl['code'] = 100;
    $JSONurl['url'] = queryUrl($file);
    echo json_encode($JSONurl);
?>