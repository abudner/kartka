/*jslint browser: true, devel: true */
/*global document: false*/
var selectColor, InitColorPalette, over, out, click;

selectColor = function (color) {
	'use strict';
	parent.document.getElementById("editt").contentDocument.execCommand(parent.command, false, color);
	//parent.document.getElementById("editt").body.execCommand("backcolor", false, color);
	//$('#editt').contents().find('body').css('backcolor', 'yellow');
	parent.document.getElementById("colorpalette").style.visibility = "hidden";
	parent.document.getElementById("editt").contentWindow.focus();
};

InitColorPalette = function () {
	'use strict';
	var x, i;
	if (document.getElementsByTagName) {
		x = document.getElementsByTagName('TD');
	} else if (document.all) {
		x = document.all.tags('TD');
	}
	for (i = 0; i < x.length; i += 1) {
		x[i].onmouseover = over;
		x[i].onmouseout = out;
		x[i].onclick = click;
	}
};

over = function () {
	'use strict';
	this.style.border = '2px solid white';
};

out = function () {
	'use strict';
	this.style.border = '1px solid gray';
};

click = function () {
	'use strict';
	selectColor(this.id);
};
