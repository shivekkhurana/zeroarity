<?php view_header()?>
<div class="container">
	<div class="row">
		<div class="fourcol">
			<span class="loud"><?php echo $name?></span><br/>
			Estimated completion time : <?php echo $total_time?> minutes
		</div>
		<div class="timer" class="fourcol last">
			<div>
				<span class="quiet">Use this timer to <strong>map your workout</strong>. We'll save it later.</span>
			</div>
			<div>
				<button id="pause_handle" value="pause" class="init_button blue">Pause / Start</button>
				<button id="finish_handle" value="finish" class="init_button black">Click when completed</button>
				<h1><span class="minutes">0</span>:<span class="seconds pause"></span></h1>
			</div>
		</div>

		<ul id="exercises" class="row">
			<?php foreach($exercises as $e):?>
				<li class="sixcol">
					<ul>
						<li class="steps pinkish"><?php echo $e['name'];?> for <?php echo $e['time'];?> minute</li>
						<li><?php echo $e['description'];?></li>
						<?php if( strlen($e['equipments']) > 0 ):?>
						<li><?php echo $e['equipments'];?></li>
						<?php endif?>
						<?php if( strlen($e['caution']) > 0 ):?>
						<li><?php echo $e['caution'];?></li>
						<?php endif;?>			
						<?php if( count($e['images']) > 0 ):?>	
						<ul>		
						<?php foreach($e['images'] as $i):?>
							<li><img src=<?php echo $i;?> ></li>
						<?php endforeach;?>
						</ul>
						<?php endif;?>
					</ul>	
				</li>
			<?php endforeach;?>
		</ul>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type='text/javascript'>//<![CDATA[ 
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
			        if(total > 0){
						$.ajax({
							type: "POST",
							url: '<?php echo site_url("/routine/finished")?>',
							data:{seconds : total, <?php echo $this->security->get_csrf_token_name()?>:'<?php echo $this->security->get_csrf_hash()?>'},
							success: function(msg){
								alert("Congratulations !");
								window.location = '<?php echo site_url("/routine/save_or_show")?>';
							}
						});
					}
					else{
						$("#finish_handle").attr("disabled", false);
							$.fn.timer();
					}
			    }
			}

			$("#pause_handle").click(function () {
				$("#pause_handle").attr("disabled", true);
			    $(".seconds").toggleClass("pause");
			});

			$("#finish_handle").click(function () {
				$("#finish_handle").attr("disabled", true);
			    finish = true;
			});
			$.fn.timer();
		});//]]>  

		</script>
</div><!--end:.container-->
<?php view_footer();?>