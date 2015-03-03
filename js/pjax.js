/*init = {};
*//* Page Switch Ajax */
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
			window.history.pushState({type:'url', url: targetUrl, title: targetTitle}, 'Hello', targetUrl);
		}
	});		
};

$(document).ready(function() {

/*	window.addEventListener('hashchange', function(e) {
		console.log(1);
		window.history.replaceState({type: 'page', pageNumber: page.currentPage, title: 'microblog'}, 'Hello', 'microblog.php');
	});*/

	window.addEventListener('popstate', function(e){ 
		console.log('2');
	  	var url;
	  	var title;
	  	var type;
		if (window.history.state){  
			var state = e.state;
			url = state.url;
			title = state.title;
			type = state.type;
		}

		if (type != 'page') {
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
		} else {
			page.pjax = true;
			page.switchPage(state.pageNumber);
		}
	});  
});