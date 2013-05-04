define(function(require,exports,module){
	function _$(id){
		return typeof id == "string" ? document.getElementById(id) : id;
	}
	function qrCode(urlId){
		var _url = _$(urlId).value;
		if(_url==""){
			_$('j-tip').innerHTML = _$('j-tip').getAttribute('data-tip');
			return;
		}
		if(_$('j-tip').innerHTML != ""){
			_$('j-tip').innerHTML = "";
		}
		_$('j-qr-url').innerHTML = "https://chart.googleapis.com/chart?cht=qr&chs=150x150&choe=UTF-8&chld=L|4&chl="+_url;
		_$('j-qr-img').src="https://chart.googleapis.com/chart?cht=qr&chs=150x150&choe=UTF-8&chld=L|4&chl="+_url;
		
	};
	module.exports = qrCode;
});