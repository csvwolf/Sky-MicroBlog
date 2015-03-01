function Page() {
	this.currentPage = parseInt(window.location.hash.substr(1)) || 1;
	this.getPageNumber(this.switchPage, [this.currentPage]);
}

/* Get Total Pages */
Page.prototype.getPageNumber = function(callback, arg) {
	var self = this;
	$.ajax({
		type: 'GET',
		url: 'core/get-page-numbers.php',
		data: {},
		success: function(data) {
			self.pageNumber = data;
//			console.log(self.pageNumber);
			if (callback) {
				callback.apply(self, arg);
			}
		}
	});
}

Page.prototype.changePages = function(targetPageNumber) {
	var self = this;
	//alert(targetPageNumber);
	targetPageNumber = parseInt(targetPageNumber);
	$('.pages>ul').children().remove();
	console.log('NowPages:' + this.pageNumber);
	if (targetPageNumber != 1) {
		$('.pages>ul').append('<li class="prev">Prev</li>');
	}
	for (var i = -2; i < 3; i++) {
/*		console.log(i);
		console.log('targetPageNumber:' + targetPageNumber);
		console.log('TotalPages:'+ this.pageNumber);
		console.log(targetPageNumber + i);
		console.log(targetPageNumber + i > 0);*/
		if (targetPageNumber + i > 0 && targetPageNumber + i <= this.pageNumber) {
			if (i == 0)
				$('.pages>ul').append('<li class="current">' + (targetPageNumber + i));
			else
				$('.pages>ul').append('<li class="number">' + (targetPageNumber + i));
		}
	}
	if (targetPageNumber != this.pageNumber)
		$('.pages>ul').append('<li class="next">Next</li>');

	$('.pages>ul .prev').click(function() {
		self.switchPage(self.currentPage - 1);
		self.currentPage--;
	});

	$('.pages>ul .next').click(function() {
		self.switchPage(self.currentPage + 1);
		self.currentPage++;
	});

	$('.pages>ul .number').click(function() {
		var targetPage = $(this).html();
		self.switchPage(targetPage);
		self.currentPage = targetPage;
	});
}

Page.prototype.switchPage = function(targetPageNumber) {
	this.getPageNumber(function() {
		message.getMessage(targetPageNumber);
		this.changePages(targetPageNumber);
		var targetUrl = 'microblog.php#' + targetPageNumber;
		console.log(this.pjax);
		if (!this.pjax) {
			window.history.pushState({type: 'page', pageNumber: targetPageNumber, title: 'MicroBlog', url: targetUrl}, 'MicroBlog', targetUrl);
		}
		this.pjax = false;
	});
}

page = new Page();