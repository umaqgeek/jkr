jQuery(function($) {
				
	var idd = 0;

	$("button.pekerja").click(function() {
			idd = $(this).attr("idd");
			loading(); // loading
			setTimeout(function(){ // then show popup, deley in .5 second
				loadPopup(idd); // function show popup
			}, 500); // .5 second
	return false;
	});
	
	$("button.komponen").click(function() {
			idd = $(this).attr("idd");
			loading(); // loading
			setTimeout(function(){ // then show popup, deley in .5 second
				loadPopup2(idd); // function show popup
			}, 500); // .5 second
	return false;
	});
	
	$("button.pekerja1").click(function() {
			idd = $(this).attr("idd");
			loading(); // loading
			setTimeout(function(){ // then show popup, deley in .5 second
				loadPopup3(idd); // function show popup
			}, 500); // .5 second
	return false;
	});
	
	$("button.komponen1").click(function() {
			idd = $(this).attr("idd");
			loading(); // loading
			setTimeout(function(){ // then show popup, deley in .5 second
				loadPopup4(idd); // function show popup
			}, 500); // .5 second
	return false;
	});
	
	$("button.lihatlog").click(function() {
			idd = $("#bl_id").val();
			url = $(this).attr("url");
			loading(); // loading
			setTimeout(function(){ // then show popup, deley in .5 second
				loadPopup5(); // function show popup
				$("#loglihat").load(url+'/'+idd);
			}, 500); // .5 second
	return false;
	});

	/* event for close the popup */
	$("div.close").hover(
					function() {
						$('span.ecs_tooltip').show();
					},
					function () {
    					$('span.ecs_tooltip').hide();
  					}
				);

	$("div.close").click(function() {
		disablePopup();  // function close pop up
	});

	$(this).keyup(function(event) {
		if (event.which == 27) { // 27 is 'Ecs' in the keyboard
			disablePopup();  // function close pop up
		}
	});

        $("div#backgroundPopup").click(function() {
		disablePopup();  // function close pop up
	});

	$('a.livebox').click(function() {
		alert('Hello World!');
	return false;
	});

	 /************** start: functions. **************/
	function loading() {
		$("div.loader").show();
	}
	function closeloading() {
		$("div.loader").fadeOut('normal');
	}

	var popupStatus = 0; // set value

	function loadPopup(idd) {
		if(popupStatus == 0) { // if value is 0, show popup
			closeloading(); // fadeout loading
			$("#toPopup1"+idd).fadeIn(0500); // fadein popup div
			$("#backgroundPopup").css("opacity", "0.7"); // css opacity, supports IE7, IE8
			$("#backgroundPopup").fadeIn(0001);
			popupStatus = 1; // and set value to 1
		}
	}
	
	function loadPopup2(idd) {
		if(popupStatus == 0) { // if value is 0, show popup
			closeloading(); // fadeout loading
			$("#toPopup2"+idd).fadeIn(0500); // fadein popup div
			$("#backgroundPopup").css("opacity", "0.7"); // css opacity, supports IE7, IE8
			$("#backgroundPopup").fadeIn(0001);
			popupStatus = 1; // and set value to 1
		}
	}
	
	function loadPopup3(idd) {
		if(popupStatus == 0) { // if value is 0, show popup
			closeloading(); // fadeout loading
			$("#toPopup3"+idd).fadeIn(0500); // fadein popup div
			$("#backgroundPopup").css("opacity", "0.7"); // css opacity, supports IE7, IE8
			$("#backgroundPopup").fadeIn(0001);
			popupStatus = 1; // and set value to 1
		}
	}
	
	function loadPopup4(idd) {
		if(popupStatus == 0) { // if value is 0, show popup
			closeloading(); // fadeout loading
			$("#toPopup4"+idd).fadeIn(0500); // fadein popup div
			$("#backgroundPopup").css("opacity", "0.7"); // css opacity, supports IE7, IE8
			$("#backgroundPopup").fadeIn(0001);
			popupStatus = 1; // and set value to 1
		}
	}
	
	function loadPopup5() {
		if(popupStatus == 0) { // if value is 0, show popup
			closeloading(); // fadeout loading
			$("#toPopup5").fadeIn(0500); // fadein popup div
			$("#backgroundPopup").css("opacity", "0.7"); // css opacity, supports IE7, IE8
			$("#backgroundPopup").fadeIn(0001);
			popupStatus = 1; // and set value to 1
		}
	}

	function disablePopup() {
		if(popupStatus == 1) { // if value is 1, close popup
			$(".toPopup").fadeOut("normal");
			$("#backgroundPopup").fadeOut("normal");
			popupStatus = 0;  // and set value to 0
		}
	}
	/************** end: functions. **************/
}); // jQuery End