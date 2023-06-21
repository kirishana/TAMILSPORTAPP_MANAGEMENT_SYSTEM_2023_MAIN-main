$(function(){

	function move404(){
		$('#animate').animate({'left':'-=30%'},2500).delay(100)
					.animate({'left':'+=30%'},2500,function(){
				setTimeout(move404,10);
		});
	}	
	move404();
	
});

