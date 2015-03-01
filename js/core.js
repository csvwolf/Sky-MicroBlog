$(document).ready(function() {
/*	init.init_url = window.location.pathname;
	init.init_title = $('title').html();*/

	/* Index Login Button Click */
	$('.login>input[type="submit"]').click(function() {
		$.ajax({
			type: 'POST',
			url: 'core/login.php',
			data: $('.login').serialize(),
			dataType: 'json',
			beforeSend: function() {
				$('.tip').html('Loading');
			},
			success: function(data) {
				if (data == '200') {
					$('.tip').html('Success');
					$('.tip').css({color: 'green'});
					setTimeout(function(){
						pajax('microblog.php', 'Hello');
					}, 300);
				} else if (data == '403') {
					$('.tip').html('Error Password');
					$('.tip').css({color: 'red'});
				} else {
					$('.tip').css({color: '#000'});
					$('.tip').html('Develop Error');
				}
			},
			error: function() {
				$('.tip').html('Something Wrong');
			}
		});
		return false;
	});
});