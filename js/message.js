function Message() {
}

Message.prototype.getMessage = function(pageNumber) {
	var self = this;
	if (pageNumber)
		url = 'core/get-message.php?page=' + pageNumber;
	else
		url = 'core/get-message.php';
	$.ajax({
		type: 'GET',
		url: url,
		data: {},
		dataType: 'json',
		beforeSend: function() {
			$('.contents').children().remove();
			$('.contents').append('<div class="loading">正在努力加载内容...</div>');
		},
		success: function(data) {
			switch(data.status) {
				case 'success':
					if (data.messageNumber > 0 && page.messageNumber > 0) {
						$('.contents>.loading').remove();
						var array = data.result;
						console.log('Pass');
						var i, message;
						$.each(array, function(i, message) {
							self.addNew(message.id, message.content, message.time, false, true);
						});
					} else if (page.messageNumber == 0) {
						page.changeLoadingStatus('adding', '还没有一条微博呢，快发射吧');
					} else {
						page.changeLoadingStatus('error', '还没有开耕到这里');
					}
					break;
				case 'input error':
					page.changeLoadingStatus('error', '你似乎输入了错误的页码');
					break;
				case 'sql error':
					page.changeLoadingStatus('error', '数据库查询失败');
					break;
				case 'database error':
					page.changeLoadingStatus('error', '数据库载入失败');
					break;
			}
		},
		error: function() {
			page.changeLoadingStatus('error', '未知错误');
		}
	});	
}

Message.prototype.postMessage = function() {
	var self = this;
	if (!this.checkMessageForm($('.post-message>textarea'))) {
		alert('数据为空，不开心');
	} else {
		$.ajax({
			type: 'POST',
			url: 'core/post-message.php',
			data: $('.post-message').serialize(),
			dataType: 'json',
			success: function(data) {
				var status = data.status;
				switch(status) {
					case 'success':
						if (page.messageNumber == 0) {
							$('.contents>.loading').remove();
						}
						message.addNew(data.id, data.content, data.time, true);
						self.clearMessageForm($('.post-message>textarea'));
						page.getPageNumber(page.changePages, [page.currentPage]);
						break;
					case 'not login':
						alert('您还未登录...');
						window.location.href = 'index.php';
						break;
					case 'sql error':
						alert('插入失败，请重试');
						break;
					case 'database error':
						alert('数据库载入失败');
						break;
				}
			},
			error: function() {
				alert('未知错误');
			}
		});
	}
}

Message.prototype.editMessage = function(parentElement, id, content, callback) {
	var backContent;
	var success = false;
	if (!this.checkMessageForm(parentElement.find('textarea'))) {
		alert('数据为空，不开心');
	} else {
		$.ajax({
			type: 'POST',
			url: 'core/edit-message.php',
			data: {id: id, content: content},
			dataType: 'json',
			success: function(data) {
				switch(data.status) {
					case 'database error':
						alert('数据库载入失败');
						break;
					case 'sql error':
						alert('数据库查询失败');
						break;
					case 'not login':
						alert('您还未登录');
						break;
					case 'success':
						success = true;
						backContent = data.content;
						break;
				}
			},
			error: function() {
				alert('未知错误');
			},
			complete: function() {
				if (success) {
					callback(backContent);
				}
			}
		});
	}

}

Message.prototype.deleteMessage = function(id) {
	$.ajax({
		type: 'POST',
		url: 'core/delete-message.php',
		data: {id, id},
		dataType: 'json',
		success: function(data) {
			switch(data.status) {
				case 'sql error':
					alert('数据库查询失败');
					break;
				case 'database':
					alert('数据库载入失败');
					break;
				case 'content missing':
					alert('错误的ID值');
					break;
				case 'not login':
					alert('您还未登录');
					break;
			}
		},
		error: function(data) {
			alert('出现未知错误');
		}
	});
}

Message.prototype.addNew = function(id, content ,time, fade, load) {
	var self = this;

	/* append DOM part */
	if (load)
		$('.contents').append('<div style="display:none" class="blog-text">');
	else
		$('.contents').prepend('<div style="display:none" class="blog-text">');

	if (fade)
		$('.blog-text').fadeIn(1000);
	else
		$('.blog-text').css({display: 'block'});
	if (load)
		var parentContainer = $('.blog-text:last-child');
	else
		var parentContainer = $('.blog-text:first-child');		
	
	parentContainer.append('<div class="text-main">');
	parentContainer.children('.text-main').html(content);
	parentContainer.append('<div class="text-messages">');
	parentContainer.children('.text-messages').append('<ul>');
	parentContainer.find('ul').append('<li id="time">Time:' + time +'</li>');
	parentContainer.find('ul').append('<div class="operate">');
	parentContainer.find('.operate').append('<li><a id="edit" href="#">Edit</a></li><li><a id="delete" href="#">Delete</a></li>');
	parentContainer.find('.text-messages').append('<button id="cancel-edit">取消编辑</button><button id="confirm-edit">提交编辑</button>');
	parentContainer.find('button').css({display: 'none'});


	if ($('.blog-text').length > 5) {
		$('.blog-text:last-child').remove();
	}	

	/* DOM event part */
	var editBtn = parentContainer.find('#edit');
	var delBtn = parentContainer.find('#delete');


	editBtn.click(function(){
		var parent = $(this).parents('.blog-text');
		var text = parent.find('.text-main').html();
		parent.find('.text-main').html('<textarea>' + text + '</textarea>');
		parent.find('ul').css({display: 'none'});
		parent.find('button').css({display: 'block'});
		var cancel = parent.find('#cancel-edit');
		var confirm = parent.find('#confirm-edit');

		cancel.click(function(){
			parent.find('.text-main').html(text);
			parent.find('ul').css({display:'block'});
			parent.find('button').css({display: 'none'});
		});

		confirm.click(function() {
			var content = parent.find('textarea').val();
			var result = self.editMessage(parent, id, content, function(backContent){
				parent.find('.text-main').html(backContent);
				parent.find('ul').css({display:'block'});
				parent.find('button').css({display: 'none'});				
			});
			console.log(result);
		});
		return false;
	});

	delBtn.click(function(){
		self.deleteMessage(id);
		$(this).parents('.blog-text').fadeOut(1000, function(){
			$(this).remove();
		});
		return false;
	});
}

Message.prototype.clearMessageForm = function(textClass) {
	textClass.val('');
}

Message.prototype.checkMessageForm = function(textClass) {
	return textClass.val().trim() == '' ? false : true;
}

var message = new Message();

$('.post-message>input[type="submit"]').click(function(){
	message.postMessage();
	return false;
});