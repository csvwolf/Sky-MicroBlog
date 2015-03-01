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

window.addEventListener('popstate', function(e){  
  	var url;
  	var title;
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