<!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/static/style/style.css" type="text/css"/>
	<link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/static/style/play.css" type="text/css"/>
	<script type="text/javascript" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/static/js/jquery.js"></script>  
	<script type="text/javascript" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/static/js/main.js"></script> 
	<script src="https://cdn.rawgit.com/zenorocha/clipboard.js/master/dist/clipboard.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="http://c2c.sip64.ru/static/style/form_example.css" type="text/css"/>
	<script type="text/javascript" >
	$(function(event) {
		$("#logo").draggable();
		$("#c2c_drag").draggable();
		
	});
	// $(document).ready(function(){
    // $('#c2c_drag').click(function(event){
 
        // get_coordinates();
        // event.stopPropagation();
    // });
// });

	</script>
</head>
<body>
<div id="pagewidth">
			<div id="header">
				<div class="lefthead">
					<img src="http://dialog64.ru/wp-content/themes/customizr/inc/img/dialog_logo2.png" class="logo" id="logo">
				</div>
				<div class="righthead">
					<table >
						<tr>
							<td>410012, г. Саратов, ул. Московская, д. 66, Офис 408</td>
							<td  class="hand"  onclick="callto('740740');">Абонентский отдел: (8452) 740-740</td>
						</tr>
						<tr>
							<td> E-mail: info@dialog64.ru</td>
							<td  class="hand"  onclick="callto('740909');"> Техническая поддержка: (8452) 740-909 </td>
							<td></td>
						</tr>
					</table>	
				</div>
		</div>
