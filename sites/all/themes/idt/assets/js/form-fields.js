$(document).ready(function(){
	var clicks = 0;
	$('#addItem').click(function(e){
		
		clicks++;
		console.log("e", e);
		if(clicks <= 5){
			$('#reg-items').append('<hr><div id="reg' + clicks +'" style="margin-bottom: 30px;">'
			+ '<label for="name">Full name:</label> <input type="text" id="name" name="form[reg' + clicks + '][name]" />'
        	+ '<label for="email">Email Address:</label> <input type="email" id="email" name="form[reg' + clicks + '][email]" />'
        	+ '<label for="organization">School:</label> <input type="text" id="organization" name="form[reg' + clicks + '][organization]" />'
			+ '</div>');
		}
		
	});					
});