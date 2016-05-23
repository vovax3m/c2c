var $=jQuery;
var content='<i title="<?php echo $title;?>" id="c2c_push" onclick="c2c_switch();" <?php if($start_delay):?>style="display:none"<?php endif;?> class="c2c_widget <?php echo $widget_name; ?> <?php echo $animation; ?> ">&#<?php echo $widget_code; ?>;</i><div id="c2c_block" class="c2c_block " style="display:none" align="center"><div class="c2c_table" align="center"><div class="c2c_table_row" align="center" ><span id="c2c_title" class="c2c_title"><?php echo $title?></span></div><div class="c2c_table_row"><div class="c2c_table_col" align="center" ><div  contenteditable="true" class="c2c_number" id="c2c_number" title="74951234567"></div></div><div class="c2c_table_col" align="center" ><?php if($call_icon):?><i onclick="c2c_call();" class="c2c_button_icon <?php echo $call_icon; ?>">&#<?php echo $call_code; ?>;</i><?php else:?><div class="c2c_submit"  onclick="c2c_call();"><?php echo $btn_value; ?></div><?php endif;?></div></div></div><div id="c2c_status"></div><span onclick="c2c_switch();" class="c2c_close" title="закрыть">x</span></div>';
 
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
 
 jQuery(document).ready(function ($) {
  
	<?php if($start_delay):?>
		setTimeout(c2c_show,<?php echo $start_delay*1000 ;?>);
	<?php endif;
		  if ($start_delay && $end_delay):?>
		setTimeout(c2c_hide,<?php echo $end_delay*1000 ;?>);
	<?php endif?>
	
	$("body").append(content);
	
	//styles
	
     var style =" \
				.c2c_close{ \
					top: 5px; \
					right: 5px; \
					align:right; \
					cursor: pointer; \
					font-size:<?php echo $font_size;?>px ; \
					position: absolute; \
				} \
				.c2c_title{ \
					font-size: <?php echo $font_size;?>px ; \
					color: <?php echo $title_text_color;?> ; \
				} \
				.c2c_options{ \
					font-size: <?php echo $font_size;?>px ; \
					color: <?php echo $title_text_color;?> ; \
				} \
				.c2c_table{ \
				display:table; \
					width:auto; \
				} \
				.c2c_table_row{ \
				     display: table-row;\
					  width: auto;\
					  clear: both;\
					} \
					.c2c_table_col{\
					   float: left;\
					   display: table-column;\
					} \
				.c2c_block { \
					font-family:Helvetica, Arial, sans-serif;\
					position:fixed; \
					top:<?php echo $top;?>; \
					right: <?php echo $right;?>; \
					padding: 5px; \
					background: <?php if ($bg_gradient_type):?>linear-gradient(<?php echo $bg_gradient_type;?>, <?php echo $bg_color;?>, <?php echo $bg_color2;?>);<?php else:?><?php echo $bg_color;?><?php endif;?>\
					border-radius: <?php echo $block_radius;?>px ;\
					border: 1px solid <?php echo $block_border_color;?> ;\
					width: <?php echo $block_width;?> ; \
					color: <?php echo $text_color;?> ; \
					z-index: 999 ; \
				} \
				.c2c_submit{ \
					border: 1px solid black ; \
					background: <?php echo $btn_color;?> ; \
					border-radius: 2px ; \
					font-size: <?php echo $font_size;?> ; \
					color: <?php echo $text_color;?> ; \
					margin: 5px ; \
					padding: 5px ; \
					width: "+$('#c2c_block').width()+"px ; \
					cursor: pointer; \
				} \
				.c2c_opt_span{ \
					cursor: pointer; \
					font-family: c2c-gear; \
					font-style: normal; \
					font-weight: normal; \
					display: inline-block; \
					font-size: <?php echo $font_size;?> ; \
					color: <?php echo $title_text_color;?> ; \
				} \
				.c2c_number{ \
					background: white ;\
					border: 1px solid black ; \
					border-radius: 2px ; \
					width: "+$('#c2c_block').width()+"px ; \
					margin: 5px ; \
					padding: 5px ; \
					font-size: <?php echo $font_size;?> ; \
				} \
				@font-face {font-family: 'c2c-gear';src: url('http://<?php echo $domain;?>/css/font/c2c-gear.eot?8963093');src:local('c2c'), url('http://<?php echo $domain;?>/css/font/c2c-gear.eot?8963093#iefix') format('embedded-opentype'),url('http://<?php echo $domain;?>/css/font/c2c-gear.woff?8963093')format('woff'),url('http://<?php echo $domain;?>/css/font/c2c-gear.ttf?8963093')format('truetype'),url('http://<?php echo $domain;?>/css/font/c2c-gear.svg?8963093#c2c-gear') format('svg');} \
				@font-face {font-family: 'c2c';	src: url('http://<?php echo $domain;?>/css/font/c2c.eot?51981102');src:local('c2c'), url('http://<?php echo $domain;?>/css/font/c2c.eot?51981102#iefix') format('embedded-opentype'),url('http://<?php echo $domain;?>/css/font/c2c.woff?51981102')format('woff'),url('http://<?php echo $domain;?>/css/font/c2c.ttf?51981102')format('truetype'),url('http://<?php echo $domain;?>/css/font/c2c.svg?51981102#c2c') format('svg');} \
				.c2c_widget { \
					z-index: 999 ; \
					margin: 5px ; \
					padding: 5px ; \
					position: fixed; \
					top:<?php echo $top;?>; \
					right: <?php echo $right;?>; \
					color: <?php echo $bg_color;?>;\
					cursor: pointer; \
					font-size: <?php echo $widget_size;?>px; \
					line-height: <?php echo $widget_size/2;?>px; \
					font-family: c2c; \
					font-style: normal; \
					font-weight: normal; \
					display: inline-block; \
					text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5);  \
				} \
				.c2c_button_icon { \
					color: <?php echo $text_color;?>; \
					cursor: pointer; \
					font-size: <?php echo $font_size*1.7;?>px;\
					line-height: <?php echo $font_size*2;?>px; \
					font-family: c2c; \
					font-style: normal; \
					font-weight: normal; \
					display: inline-block; \
				} \
				.c2c_widget:hover { \
					color: black; \
					-webkit-animation-play-state: paused;animation-play-state: paused;\
				";
			
	 $('<style type="text/css">' + style + '</style>').appendTo('head');
//	$('<style type="text/css">' + style + '</style>').insertAfter('body');
	$('<link rel="stylesheet" href="http://c2c.sip64.ru/css/animation/<?php echo $animation; ?>.css">').appendTo('head');
	
});

function c2c_call(){
		var no=$("#c2c_number").text();
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

