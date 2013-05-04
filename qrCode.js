define(function(require,exports,module){
	function qrCode(urlId){
		var _url = document.getElementById(urlId).value;
		document.getElementById('j-qr-url').innerHTML = "https://chart.googleapis.com/chart?cht=qr&chs=150x150&choe=UTF-8&chld=L|4&chl="+_url;
		document.getElementById('j-qr-img').src="https://chart.googleapis.com/chart?cht=qr&chs=150x150&choe=UTF-8&chld=L|4&chl="+_url;
	};
	module.exports = qrCode;
});