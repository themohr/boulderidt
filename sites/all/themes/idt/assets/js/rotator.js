function rotator() {
  setInterval(function(){
  
	  $(".carousel-item.active").each(function(index, element) {
		  
		  if($(this).next().index() === -1){
			  
			  $(this).removeClass("active").fadeOut(400,function(){
				  $('.carousel-item').eq(0).addClass("active").fadeIn(400);
				  });
				  
		  } else {
			  
			  $(this).removeClass("active").fadeOut(400,function(){
				  $(this).next().addClass("active").fadeIn(400);
				  });	
		  }
		  
	  });
	  
  },3500);    
}
$(document).ready(rotator());
