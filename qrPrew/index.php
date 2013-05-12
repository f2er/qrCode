<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>二维码预览图</title>
        <link href="static/css/weitocao.min.css" rel="stylesheet"/>
  </head>
  <body>
        <!--m_upload-->
        <div class="m_imgprew">
            <input type="file" value="" id="j-file" name="file_upload"/>
        </div>
        <!--/m_imgprew-->
        <!--m_prew-->
        <div class="m_prew" id="j-prew"></div>
        <!--/m_prew-->
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script>
            !(function(){
                var qrPrew = qrPrew || {};
                qrPrew = {
                    doUpload : function(){
                        var _file = document.getElementById('j-file').files[0];
                        var _reader = new FileReader();
                        _reader.readAsDataURL(_file);
                        _reader.onload = function(){
                            $.post("reader.php",{"fileUrl":this.result},function(data){
                                if(data.code == 100 ){
                                    qrPrew.qrImg(data.url);
                                }
                            },'json');
                        }
                    },
                    qrImg : function(url){
						if( document.getElementById('j-qr')){
							document.getElementById('j-prew').removeChild(document.getElementById('j-qr'));
						}
						var _urlLocation = "http://location/xmf2e/qrPrew/"
                        var _img = document.createElement('img');
                        _img.id = "j-qr";
                        _img.src="https://chart.googleapis.com/chart?cht=qr&chs=150x150&choe=UTF-8&chld=L|4&chl="+_urlLocation+url;
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