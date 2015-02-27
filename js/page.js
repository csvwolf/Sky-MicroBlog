function Page(pageNumber) {
}

Page.prototype.getPageNumber = function() {
	var self = this;
	$.ajax({
		type: 'GET',
		url: 'core/get-page-numbers.php',
		data: {},
		success: function(data) {
			self.pageNumber = data.page;
		}
	});
}

Page.prototype.changePages = function() {
	$('.pages>ul').remove();
}

Page.prototype.switchPage = function(pageNumber) {

}

Page.prototype.setCurrentPage = function() {
	
}
