$(document).ready(function() {
	$("a.list-group-item list-group-item-action").click(function() {
        // Clear các thẻ li có Class click cũ
		$("a.list-group-item list-group-item-action").removeClass("click");
        // Thêm Class
		$(this).addClass("click");
	});
});