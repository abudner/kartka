(function ($) {
    $.fn.waliduj = function () {
        if (this.val().length === 0) {
            smoke.signal("Pole nie może być puste!");
			e.preventDefault();
		}
	};
})(jQuery);