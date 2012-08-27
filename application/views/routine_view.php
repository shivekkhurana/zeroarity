<?php view_header()?>

<div class="outer_container fixed_top">
<div class="container">
<div class="row">
	<div class="twelvecol">
		<button id="pause_handle" value="pause" class="zeta">Pause / Start</button>
		<button value="finished ?" href="#" id="finish_handle" class="zeta">Save !</button>	
		<h2 class=""><span class="minutes">0</span>:<span class="seconds pause"></span></h2> 
	</div>
</div><!--end:.row-->
</div><!--end:.container-->
</div><!--end:.outer_container-->

<div class="outer_container barn woody first">
<div class="container">
<div class="row">
	<div class="fourcol">
		<span class="loud"><?php echo $name?></span><br/>
		Estimated completion time : <?php echo $total_time?> minutes
	</div>
	<div class="fourcol last timer">
		<div class="twelvecol">
			<span class="quiet">Use this timer to <strong>map your workout</strong>. We'll save it later.</span>
		</div>
		<!--div class="twelvecol">
			<button id="pause_handle" value="pause" class="">Pause / Start</button>
			<button value="finished ?" href="#" id="finish_handle" class="">Save !</button>
			
			<h1 class=""><span class="minutes">0</span>:<span class="seconds pause"></span></h1> 
		</div-->
	</div><!--end:.container | nested container-->
</div><!--end:.row-->
</div><!--end:.container-->
</div><!--end:.outer_container-->

<div class="outer_container gray">
<div class="container">
<div class="row">
	<div class="twelvecol">
	<span class="beta">Warmup Exercises</span>
	<span class="quiet">perform one set ie. each exercise below this point <strong>once</strong></span>
	</div>
</div><!--end:.row-->
</div><!--end:.container-->
</div><!--end:.outer_container-->

<div class="outer_container wine_red">
<div class="container">
<ul id="warmup" class="row">
	<?php foreach($warmup as $e):?>
	<li class="twelvecol">
		<ul>
			<li class="exercise_name"><?php echo $e['name'];?> for <?php echo $e['time'];?> minute</li>
			<li class="exercise_description"><?php echo $e['description'];?></li>
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
</ul><!--end:.row-->
</div><!--end:.container-->
</div><!--end:.outer_container-->


<div class="outer_container gray">
<div class="container">
<div class="row">
	<div class="twelvecol">
	<span class="beta">Routine Exercises</span>
	<span class="quiet">perform <span class="bold"><?php echo $repeat?></span> sets, ie. each exercise below this point <?php echo $repeat?> times</span>
	</div>
</div><!--end:.row-->
</div><!--end:.container-->
</div><!--end:.outer_container-->

<div class="outer_container red_bright">
<div class="container">
<ul id="exercises" class="row">
<?php foreach($exercises as $e):?>
	<li class="twelvecol">
		<ul>
			<li class="exercise_name"><?php echo $e['name'];?> for <?php echo $e['time'];?> minute</li>
			<li class="exercise_description"><?php echo $e['description'];?></li>
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
</ul><!--end:.row-->
</div><!--end:.container-->
</div><!--end:.outer_container-->

<div class="outer_container gray">
<div class="container">
<div class="row">
	<div class="twelvecol beta">
	Stay Strong and Continue
	</div>
</div><!--end:.row-->
</div><!--end:.container-->
</div><!--end:.outer_container-->

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
<?php view_footer();?>
