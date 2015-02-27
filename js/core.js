$(document).ready(function() {
	var init_url = window.location.pathname;
	var init_title = $('title').html();

	var message = new Message();
	/* Page Switch Ajax */
	var pajax = function(targetUrl, targetTitle) {
		$.ajax({
			dataType: 'html',
			type: 'GET',
			url: targetUrl,
			headers: {
				Pjax: true
			},
			success: function(data) {
				$('body').contents().remove();
				$('body').append(data);
				console.log(data);
				$('title').html(targetTitle);
				window.history.pushState({url: targetUrl, title: targetTitle}, 'Hello', targetUrl);
			}
		});		
	};

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

	$('.post-message>input[type="submit"]').click(function(){
		$.ajax({
			type: 'POST',
			url: 'core/post-message.php',
			data: $('.post-message').serialize(),
			dataType: 'json',
			success: function(data) {
				//alert(data.id);
				message.addNew(data.id, data.content, data.time, true);
			},
			error: function() {

			}
		});
		return false;
	});

	window.addEventListener('popstate', function(e){  
      	var url;
      	var title;
		if (window.history.state){  
			var state = e.state;
			url = state.url;
			title = state.title;
		} else {
			url = init_url;
			title = init_title;
		}

		$.ajax({
			dataType: 'html',
			type: 'GET',
			url: url,
			headers: {
				Pjax: true
			},
			success: function(data) {
				$('body').contents().remove();
				$('body').append(data);
				console.log(data);
				$('title').html(title);
			}
		});      
    });  
});