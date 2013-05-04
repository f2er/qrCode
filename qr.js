define(function(require){
	var qr = require('qrCode.js');
	document.getElementById('j-btn-qr').onclick = function(){
		qr('j-url');
	};
});