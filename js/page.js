function Page() {
}

Page.prototype.getPageNumber = function(callback) {
	var self = this;
	$.ajax({
		type: 'GET',
		url: 'core/get-page-numbers.php',
		data: {},
		success: function(data) {
			self.pageNumber = data;
		}
	});
}

Page.prototype.changePages = function() {
	$('.pages>ul').remove();
}

Page.prototype.switchPage = function(pageNumber) {
	pajax('#1', 'Page:#{Page}');
}

Page.prototype.setCurrentPage = function() {
	
}

page = new Page();

page.getPageNumber();

$('.pages li').click(function() {
	page.switchPage();
	return false;
});