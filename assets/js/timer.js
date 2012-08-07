$(window).load(function(){
	var time = 0;
	var finish = false;

	$.fn.timer = function () {
	    $(".seconds").text(time);
	    if ($(".seconds").hasClass('pause') != true) {
	        time++;
	        if (time == 60) {
	            time = 0;
	            var m = parseInt($('.minutes').text());
	            $('.minutes').text(m + 1);
	        }
	     }
	    if (finish == false) {
	        setTimeout("$.fn.timer();", 1000);
	        $("#pause_handle").attr("disabled", false);
	    } else {
	        var total = 60*parseInt($('.minutes').text()) + time;
			$.ajax({
				type: "POST",
				url: '<?php echo site_url("/routine/finished")?>',
				data:{seconds : total, <?php echo $this->security->get_csrf_token_name()?>:'<?php echo $this->security->get_csrf_hash()?>'},
				success: function(msg){
					alert("Congratulations !");
					window.location = '<?php echo site_url("/routine/prompt_to_save")?>';
				
				}
			});
	    }
	}

	$("#pause_handle").click(function () {
		$("#pause_handle").attr("disabled", true);
	    $(".seconds").toggleClass("pause");
	});
	
	$("#finish_handle").click(function () {
	    finish = true;
	});

	$.fn.timer();
});