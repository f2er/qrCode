<?php

	$configArr = array( 'host'=>'192.168.50.117','name'=>'root','pwd'=>'root','db'=>'aaa');
	//Connect
	function Connect(){
		global $configArr;
		@ $connect = new mysqli( $configArr['host'],$configArr['name'],$configArr['pwd'],$configArr['db'] );
		$connect->query(" set names 'utf8'");
		if( mysqli_connect_errno() ){
			printf("Connect failed: %s\n", $connect->connect_error);
			exit;
		}
		return $connect;
	}
	
	//增加图片
	function addPic($file){
		$conn = Connect();
		$sql = "insert into c(`img`) values('".addslashes($file)."')";
		$result = $conn->query($sql);
		echo $conn->error;
		$id = $conn->insert_id;
		return $id;
	}

    /*
     * 返回图片信息
     */
    function getPic($id){
    	$conn = Connect();
		$id = intval($id);
        $sql = "select * from c where id=$id";
        $result = $conn->query($sql);

        if($result){
            $rs = $result->fetch_array(MYSQLI_ASSOC);
            return $rs['img'];
        }
    }


?>