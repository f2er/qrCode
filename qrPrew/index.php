<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>二维码预览图</title>
        <link href="http://ks.4399ued.com/assets/css/ks.min.css" rel="stylesheet"/>
		<style>
			.qr_side{width:4px;background:#c7a521;position:fixed;left:0;top:0;height:100%;}
			.qr_box{width:900px;height:800px;position:absolute;left:50%;top:50%;margin:-400px 0 0 -450px;}
			.m_imgprew{ position:relative;zoom:1;width:600px;margin:150px auto 0;height:120px;}
			.m_imgprew .m_file{position:absolute;left:50%;margin-left:-140px;top:0;width:280px;height:80px;z-index:10;opacity:0;cursor:pointer;}
			.m_imgprew .m_file_mask{ position:absolute;left:50%;margin-left:-140px;top:0;background:#c7a521;width:280px;height:80px;z-index:1;color:#fff;font-size:20px;text-align:center;line-height:80px;
				font-weight:700;font-family:"microsoft Yahei"
			}
			.m_url{line-height:2;font-size:20px;font-family:"Arial"}
			.m_url a{ color:#333;}
			.m_url a:hover{ color:#f00;}
			
			.m_prew{ margin:50px auto;width:150px;height:150px;}
			.menu{ position:fixed;right:0;top:0;color:#fff;height:32px;line-height:32px;}
			.menu li .url{ color:#fff;text-decoration:none;background:#65b5f8;display:block;padding:0 10px;}
			.menu li .url:hover{ background:#f00}
		</style>
  </head>
  <body>
		<div class="qr_box">
			<!--m_upload-->
			<div class="m_imgprew">
				<input type="file" value="" id="j-file" class="m_file" name="file_upload"/>
				<span class="m_file_mask">点击上传</span>
			</div>
			<!--/m_imgprew-->
			<!--m_url-->
			<p class="m_url">图片预览地址：<a href="#" id="j-url" target="_blank">http://prew.4399ued.com/</a></p>
			<!--/m_url-->
			<!--m_prew-->
			<div class="m_prew" id="j-prew"></div>
			<!--/m_prew-->
			<ul class="menu">
				<li><a href="http://qr.4399ued.com" target="_blank" class="url">网址二维码</a></li>
			</ul>
		</div>
		<div class="qr_side"></div>
		
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script>
            !(function(){
                var qrPrew = qrPrew || {};
                qrPrew = {
					surl:"http://location/xmf2e/qrPrew/",
                    doUpload : function(){
                        var _file = document.getElementById('j-file').files[0];
                        var _reader = new FileReader();
                        _reader.readAsDataURL(_file);
                        _reader.onload = function(){
                            $.post("reader.php",{"fileUrl":this.result},function(data){
                                if(data.code == 100){
                                    qrPrew.qrImg(data.url);
									document.getElementById('j-url').href = document.getElementById('j-url').innerHTML = qrPrew.surl+data.url;
                                }
                            },'json');
                        }
                    },
                    qrImg : function(url){
						if( document.getElementById('j-qr')){
							document.getElementById('j-prew').removeChild(document.getElementById('j-qr'));
						}
                        var _img = document.createElement('img');
                        _img.id = "j-qr";
                        _img.src="https://chart.googleapis.com/chart?cht=qr&chs=150x150&choe=UTF-8&chld=L|4&chl="+qrPrew.surl+url;
                        document.getElementById('j-prew').appendChild(_img);
                    },
                    init : function(){
                        var _file = document.getElementById('j-file');
                        _file.onchange = function(){
                            qrPrew.doUpload();
                        }
                    }
                };
                qrPrew.init();
            })();
        </script>
  </body>
</html>