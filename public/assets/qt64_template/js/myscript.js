function ConfirmMess(msg) {
	if (window.confirm(msg)) {
		return true;
	} else {
		return false;
	}
}

jQuery(document).ready(function($) {
	$(".result_msg,.error_msg").delay(3000).slideUp();
});
