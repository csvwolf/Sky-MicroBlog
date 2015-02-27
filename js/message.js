function Message() {
	this.getMessage();
}

Message.prototype.getMessage = function() {
	var self = this;
	$.ajax({
		type: 'GET',
		url: 'core/get-message.php',
		data: {},
		success: function(data) {
			$('.contents').children().remove();
			var array = $.parseJSON(data);
			var i, message;
			$.each(array, function(i, message) {
				self.addNew(message.id, message.content, message.time, false);
			});
		},
		error: function() {
			alert('hello');
		}
	});	
}

Message.prototype.editMessage = function(id, content) {
	$.ajax({
		type: 'POST',
		url: 'core/edit-message.php',
		data: {id: id, content: content},
		dataType: 'json',
		success: function(data) {

		},
		error: function() {

		}
	})
}

Message.prototype.addNew = function(id, content ,time, fade) {
	$('.contents').prepend('<div style="display:none" class="blog-text">');
	if (fade)
		$('.blog-text').fadeIn(1000);
	else
		$('.blog-text').css({display: 'block'});
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

	var editBtn = parentContainer.find('#edit');
	var delBtn = parentContainer.find('#delete');

	if ($('.blog-text').length > 5) {
		$('.blog-text:last-child').remove();
	}

	editBtn.click(function(){
		var parent = $(this).parents('.blog-text');
		var text = parent.find('.text-main').html();
		parent.find('.text-main').html('<textarea>' + text + '</textarea>');
		parent.find('ul').css({display: 'none'});
		parent.find('button').css({display: 'block'});

		$('#cancel-edit').click(function(){
			parent.find('.text-main').html(text);
			parent.find('ul').css({display:'block'});
			parent.find('button').css({display: 'none'});
		});

		$('#confirm-edit').click(function() {
			alert(id);
		});
		return false;
	});

	delBtn.click(function(){
		$(this).parents('.blog-text').fadeOut(1000, function(){
			$(this).remove();
		});
		return false;
	});
}

var message = new Message();

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