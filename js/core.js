$(document).ready(function() {
	var init_url = window.location.pathname;
	var init_title = $('title').html();

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

	$('button').click(function() {
		$.ajax({
			dataType: 'html',
			type: 'GET',
			url: 'blog.php',
			success: function(data) {
				$('html').children().remove();
				$('body').html(data);
				window.history.pushState({url: 'blog.php'}, 'Hello', 'blog.php');
			}
		});
	});

	window.addEventListener('popstate', function(e){  
      	//alert('hello');
      	var url;
      	var title;
		if (window.history.state){  
			var state = e.state;
			url = state.url;
			title = state.title;
		//do something(state.url, state.title); 
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