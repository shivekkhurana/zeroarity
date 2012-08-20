<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('view_header'))
{
	function view_header()
	{
		$b = base_url();
		$b .= "assets";
		echo "
	<doctype html!>
		<html>
		<head>		
			<meta charset='utf-8' />
			<title>zeroarity</title>

			<meta name='viewport' content='width=device-width, initial-scale=1.0' />
					
			<!-- 1140px Grid styles for IE -->
			<!--[if lte IE 9]><link rel='stylesheet' href=' $b/css/ie.css' type='text/css' media='screen' /><![endif]-->

			<!-- The 1140px Grid - http://cssgrid.net/ -->
			<link rel='stylesheet' href='$b/css/1140.css' type='text/css' media='screen' />
					
			<!-- Your styles -->
			<link rel='stylesheet' href='$b/css/styles.css' type='text/css' media='screen' />
				
			<!--css3-mediaqueries-js - http://code.google.com/p/css3-mediaqueries-js/ - Enables media queries in some unsupported browsers-->
			<script type='text/javascript' src='$b/js/css3-mediaqueries.js'></script>
		</head>
		<body>
		";
	}   

	function view_logo_banner(){
		echo "
	<div class='row'>
		<div class='twelvecol last'><span class='loud'>zeroarity</span> 
		<small class='quiet'>We make bodies vintage.</small></div>
	</div><!--end:.row-->";
	}

	function view_footer()
	{
		$b = base_url();
		$b .= "assets";
		echo "
		</body>
	</html>	
		";
	}   
}
