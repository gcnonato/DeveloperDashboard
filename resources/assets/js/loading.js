window._ = require('lodash');

// Button loading animation
window.buttonLoad = function(link) {
	document.getElementById("load").innerHTML = '<div class=\"mb-2\">Contacting People</div><div><i class=\"fas fa-question fa-3x fa-spin\"></i></div>';

	setTimeout(function(){
  	window.location.href = link;
  }, 3000);
}
