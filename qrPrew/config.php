<?php

	$configArr = array( 'host'=>'localhost','name'=>'root','pwd'=>'xxx','db'=>'db_qrprew');
	//Connect
	function Connect(){
		global $configArr;
		@ $connect = new mysqli( $configArr['host'],$configArr['name'],$configArr['pwd'],$configArr['db'] );
		$connect->query(" set names 'utf8'");
		if( mysqli_connect_errno() ){
			exit;
		}
		return $connect;
	}
	
	//query
	function querySql($sql,$charset="utf8"){
		$conn = Connect();
		$result = $conn->query($sql);
		
		if( !$result ){
			$conn->close();
			exit;
		}
		$conn->close();
		return $result;
	}

    /*
     * 返回地址
     * */
    function queryurl($url){
        $urlSql = "select url from tb_prew where url ='".$url."'";
        $urlResult = querySql($urlSql);
        if( $urlResult ){
            $rs = $urlResult->fetch_array();
            return $rs['url'];
        }
    }


?>