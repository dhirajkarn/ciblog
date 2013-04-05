$(document).ready(function(){
		function move_div() {
			win_width = $(window).width();
			win_height = $(window).height();

			div_width = $('#verycenter').width();
			div_height = $('#verycenter').height();

			$('#verycenter').css('top', (win_height/2) - (div_height/2)).css('left', (win_width/2) - (div_width/2));
		}
		move_div();

		$(window).resize(function() {
			move_div();
		});
	});