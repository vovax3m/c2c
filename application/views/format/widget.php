
 var content='<i title="<?php echo $title;?>" id="c2c_push" onclick="c2c_switch();" <?php if($start_delay):?>style="display:none"<?php endif;?> class="c2c_widget c2c-sort-numeric-outline <?php echo $animation; ?> ">&#xe809;</i><div id="c2c_block" class="c2c_block " style="display:none" align="center"><table class="c2c_table" align="center"><tr><td colspan="3" align="center" ><span id="c2c_title" class="c2c_title"><?php echo $title?></span></td></tr><tr><td><input type="text" class="c2c_number" id="c2c_number" placeholder="74951234567"></td><td><input class="c2c_submit" type="submit" value="<?php echo $btn_value; ?>" onclick="c2c_call();"><span onclick="c2c_switch();" class="c2c_close" title="закрыть">x</span></td></tr></table><br><div id="c2c_status"></div></div>';
 /*
 <td><span class="c2c_opt_span" onclick="c2c_toggle();"><i class="c2c_gear_6 spin">&#xe803;</i></span></td><div id="c2c_options" style="display:none" class="c2c_options "><br>additionals <select id="c2c_day"></select></div><br>
 */
 
  <?php /* $days='';
	   	   $ti='';
		foreach($work_time as $k=>$v){
	 $time='';
	 $days.=$k.'-';
	 for($t=$v[0];$t<=$v[1];$t++){
		 $time.=$t.'-';
	 }
	 $ti[$k]=$time;	 
	 unset($time);
 }
 echo 'console.log("'.$days.'");';
 #echo 'console.log("'; print_r($ti); echo'");';
 */
 ?>
 <?php $domain=$_SERVER['SERVER_NAME'];?>
  
 $(function(){
	<?php if($start_delay):?>
		setTimeout(c2c_show,<?php echo $start_delay*1000 ;?>);
	<?php endif;
		  if ($start_delay && $end_delay):?>
		setTimeout(c2c_hide,<?php echo $end_delay*1000 ;?>);
	<?php endif?>
	
	$("body").append(content);
	
	//styles
	
     var style = " \
				.c2c_close{ \
					top: 5px; \
					right: 5px; \
					align:right; \
					cursor: pointer; \
					font-size:<?php echo $font_size;?>px !important; \
					position: absolute; \
				} \
				.c2c_title{ \
					font-size: <?php echo $font_size;?>px !important; \
					color: <?php echo $title_text_color;?> !important; \
				} \
				.c2c_options{ \
					font-size: <?php echo $font_size;?>px !important; \
					color: <?php echo $title_text_color;?> !important; \
				} \
				.c2c_table,.c2c_table tr,.c2c_table td{\
				background: <?php echo $bg_color;?> !important; \
				border: 0px !important;\
				color: <?php echo $text_color;?> !important; \
				margin: 0px !important; \
				padding:0px !important; \
				width:auto; \
				}\
				.c2c_block{ \
					font-family:Helvetica, Arial, sans-serif;\
					position:fixed; \
					top:20%; \
					right: 5%; \
					background: <?php echo $bg_color;?> !important; \
					border-radius: <?php echo $block_radius;?>px !important;\
					border: 1px solid <?php echo $block_border_color;?> !important;\
					width: <?php echo $block_width;?> !important; \
					color: <?php echo $text_color;?> !important; \
					z-index: 999 !important; \
				} \
				.c2c_submit{ \
					border: 1px solid black !important; \
					background: <?php echo $btn_color;?> !important; \
					border-radius: 2px !important; \
					font-size: <?php echo $font_size;?> !important; \
					color: <?php echo $text_color;?> !important; \
					margin: 5px !important; \
					padding: 5px !important; \
					width: 100px !important; \
				} \
				.c2c_opt_span{ \
					cursor: pointer; \
					font-family: c2c-gear; \
					font-style: normal; \
					font-weight: normal; \
					display: inline-block; \
					font-size: <?php echo $font_size;?> !important; \
					color: <?php echo $title_text_color;?> !important; \
				} \
				.c2c_number{ \
					background: white !important;\
					border: 1px solid black !important; \
					border-radius: 2px !important; \
					width: 130px !important; \
					margin: 5px !important; \
					padding: 5px !important; \
					font-size: <?php echo $font_size;?> !important; \
				} \
				@font-face {font-family: 'c2c-gear';src: url('http://<?php echo $domain;?>/css/font/c2c-gear.eot?8963093');src:local('c2c'), url('http://<?php echo $domain;?>/css/font/c2c-gear.eot?8963093#iefix') format('embedded-opentype'),url('http://<?php echo $domain;?>/css/font/c2c-gear.woff?8963093')format('woff'),url('http://<?php echo $domain;?>/css/font/c2c-gear.ttf?8963093')format('truetype'),url('http://<?php echo $domain;?>/css/font/c2c-gear.svg?8963093#c2c-gear') format('svg');} \
				@font-face {font-family: 'c2c';	src: url('http://<?php echo $domain;?>/css/font/c2c.eot?51981102');src:local('c2c'), url('http://<?php echo $domain;?>/css/font/c2c.eot?51981102#iefix') format('embedded-opentype'),url('http://<?php echo $domain;?>/css/font/c2c.woff?51981102')format('woff'),url('http://<?php echo $domain;?>/css/font/c2c.ttf?51981102')format('truetype'),url('http://<?php echo $domain;?>/css/font/c2c.svg?51981102#c2c') format('svg');} \
				.c2c_widget { \
					z-index: 999 !important; \
					margin: 5px !important; \
					padding: 5px !important; \
					position: fixed; \
					top:20%; \
					right: 5%; \
					color: <?php echo $bg_color;?>; \
					cursor: pointer; \
					font-size: 100px; \
					line-height: 50px; \
					font-family: c2c; \
					font-style: normal; \
					font-weight: normal; \
					display: inline-block; \
					text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5);  \
				} \
				.c2c_widget:hover { \
					color: black; \
					-webkit-animation-play-state: paused;animation-play-state: paused;\
				";
	$('<style type="text/css">' + style + '</style>').appendTo('head');
	$('<link rel="stylesheet" href="http://c2c.sip64.ru/css/animation/<?php echo $animation; ?>.css">').appendTo('head');
	
	console.log('');
});

function c2c_call(){
		var no=$("#c2c_number").val();
		var key='<?php echo $key;?>';
		var headID = document.getElementsByTagName("head")[0]; 
		var newScript = document.createElement('script');
		newScript.type = 'text/javascript';
		newScript.src = 'http://c2c.sip64.ru/call/make/'+no+'?form=1&key='+key+'&cb=<?php if($callback) echo $callback;?>';
		headID.appendChild(newScript);
		headID.removeChild(newScript);
}
function c2c_cb(){
	console.log(data)
}
function c2c_show(){
		$("#c2c_push").show();
}
function c2c_hide(){
		$("#c2c_push").hide();
}
function c2c_toggle(){
	$("#c2c_options").toggle();
}
function c2c_switch(){
	$("#c2c_push").toggle();
	$("#c2c_block").toggle();
	
}