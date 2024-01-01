$(document).ready(function() {
	$("li").click(function() {
        // Clear các thẻ li có Class click cũ
		$("li").removeClass("click");
        // Thêm Class
		$(this).addClass("click");
	});
});