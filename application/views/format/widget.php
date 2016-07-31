var $=jQuery;

var c2c_widget = '<i title="<?php echo $title;?>" id="c2c_push" onclick="c2c_switch();" <?php if($start_delay):?>style="display:none"<?php endif;?> class="c2c_widget <?php echo $widget_name; ?> <?php echo $animation; ?> ">&#<?php echo $widget_code; ?>;</i><div id="c2c_block" class="c2c_block " style="display:none" align="center"></div>';

var c2c_call_form ='<div class="c2c_table" align="center"><div class="c2c_table_row" align="center" ><span id="c2c_title" class="c2c_title"><?php echo $title?></span></div><div class="c2c_table_row" align="center"><div class="c2c_table_col" align="center" ><div contenteditable="true" class="c2c_number" id="c2c_number" placeholder="89011231234"></div></div><div class="c2c_table_col" align="center" ><?php if($call_icon):?><i onclick="c2c_call();" class="c2c_button_icon" id="c2c_button_icon" <?php echo $call_icon; ?>">&#<?php echo $call_code; ?>;</i><?php else:?><div class="c2c_submit" id="c2c_submit"  onclick="c2c_call();"><?php echo $btn_value; ?></div><?php endif;?></div></div><div class="c2c_table_row" align="center" ><span id="c2c_text" class="c2c_text"><?php echo $custom_text_1?></span></div></div><span onclick="c2c_switch();" class="c2c_close" title="закрыть">x</span>';

 var c2c_feedback_form ='<div class="c2c_table" align="center"><div class="c2c_table_row" align="center" ><span id="c2c_fb_title" class="c2c_title"><?php echo $fb_title;?></span></div><div class="c2c_table_row" align="center" ><div class="c2c_table_col" align="center" ><div contenteditable="true" class="c2c_number" id="c2c_fb_name" placeholder="Ваше Имя"></div></div><div class="c2c_table_col" align="center" ><div contenteditable="true" class="c2c_number" id="c2c_fb_email" placeholder="ivanov@mail.com"></div></div><div class="c2c_table_col" align="center" ><div class="c2c_submit" id="c2c_fb_submit" onclick="c2c_fb_send();"><?php echo $fb_btn_value; ?></div></div>	</div><div class="c2c_table_row" align="center"><span id="c2c_fb_text" class="c2c_text"><?php echo $fb_custom_text;?></span></div>	<div class="c2c_table_row"><div contenteditable="true" class="c2c_fb_message" id="c2c_fb_message" placeholder="сообщение для нас" ></div></div></div><span onclick="c2c_switch();" class="c2c_close" title="закрыть">x</span>';
 
 var c2c_final_screen='<div class="c2c_table" align="center"><div class="c2c_table_row" align="center" ><span id="c2c_title" class="c2c_title"><?php echo $final_title?></span></div></div><div class="c2c_table_row" align="center" ><span id="c2c_text" class="c2c_text"><?php echo $final_custom_text?></span></div></div><span onclick="c2c_switch();" class="c2c_close" title="закрыть">x</span>';

 var c2c_number;
 
<?php 
	
function logger( $title, $mess, $debug ) {
	if ( isset( $debug ) and $debug ){
		echo 'console.log("'.$title.' = '.$mess.'");';
	}
};

if ( isset( $wt_type ) and $wt_type ){
	// обработка рабочего времени
	date_default_timezone_set('Europe/Moscow');
	$show_widget=false;
	$day=date('w');
	$hour=date('G');
	$days=array(0=>'sa',1=>'mo', 2=>'tu', 3=>'we', 4=>'th', 5=>'fr', 6=>'su' );

	if ( isset( ${$days[$day]} ) and ${$days[$day]}  ) $working_hours=${$days[$day]};
	if ( isset($working_hours) and $working_hours  ) $work_h_arr=explode('-', $working_hours );

	if ( isset( $work_h_arr[0] ) and isset( $work_h_arr[1] ) ) {
		logger( "Worktime condition", $work_h_arr[0].' <= '.$hour.' < '.$work_h_arr[1] );
		
		//if hour between worktime range
		if ($work_h_arr[0] <= $hour  and $hour < $work_h_arr[1] ) $show_widget='true';	
		logger( "Start hour", $work_h_arr[0], $debug );
		logger( "End hour", $work_h_arr[1], $debug );
		
	}		
		logger( "Day of week", $days[$day], $debug );
		logger( "Current hour", $hour, $debug );
}
else{
	$show_widget='true';
}

logger( "Show widget", addslashes( json_encode( $show_widget ) ), $debug );

$domain=$_SERVER['SERVER_NAME'];
 
if( !$show_widget ) exit;
 ?>
 
 jQuery(document).ready(function ($) {
 
 
	<?php if($start_delay):?>
		setTimeout(c2c_show,<?php echo $start_delay*1000 ;?>);
	<?php endif;
		 if ($start_delay && $end_delay):?>
		setTimeout(c2c_hide,<?php echo $end_delay*1000 ;?>);
	<?php endif?>
	
	$("body").append(c2c_widget);
	$("#c2c_block").html(c2c_call_form);
	
	//styles
	
   var style =" \
	      [contenteditable]:empty:before {content: attr(placeholder);display: block; color:#ccc} \
				.c2c_close{ \
					top: 5px; \
					right: 5px; \
					align:right; \
					cursor: pointer; \
					font-size:<?php echo $font_size;?>px ; \
					position: absolute; \
				} \
				.c2c_title{ \
					font-size: <?php echo $title_font_size;?>px ; \
					color: <?php echo $title_text_color;?> ; \
				} \
				.c2c_options{ \
					font-size: <?php echo $font_size;?>px ; \
					color: <?php echo $title_text_color;?> ; \
				} \
				.c2c_table{ \
					display:table; \
					width: 90%; \
				} \
				.c2c_table_row{ \
				   display: table-row;\
				   width: 90%; \
				   text-align:center;\
				   clear: both;\
				} \
					.c2c_table_col{\
					  display:inline-block\
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
					font-size: <?php echo $font_size;?>px ; \
					color: <?php echo $text_color;?> ; \
					margin: 5px ; \
					padding: 5px ; \
					width: <?php echo $button_width;?>px ; \
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
					width: <?php echo $number_width;?>px ; \
					margin: 5px ; \
					padding: 5px ; \
					font-size: <?php echo $font_size;?>px ; \
				} \
				.c2c_fb_message { \
					overflow:hidden;\
					-moz-appearance: textfield;\
					-webkit-appearance: textfield;\
					background: white ;\
					border: 1px solid black ; \
					border-radius: 2px ; \
					text_align: right; \
					display: block;\
					padding: 5px ; \
					font-size: <?php echo $font_size;?>px ; \
					height: <?php echo $font_size*2;?>px ; \
				}\
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
					text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5); \
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
					color: <?php echo $bg_hover;?>; \
					-webkit-animation-play-state: paused;animation-play-state: paused;\
				";
	$('<style type="text/css">' + style + '</style>').appendTo('head');
	$('<link rel="stylesheet" href="http://<?php echo $domain ?>/css/animation/<?php echo $animation; ?>.css">').appendTo('head');
	
});

function c2c_call(){
		c2c_number=$("#c2c_number").text().replace('+','');
		var key='<?php echo $key;?>';
		var headID = document.getElementsByTagName("head")[0]; 
		var newScript = document.createElement('script');
		newScript.type = 'text/javascript';
		newScript.src = 'http://<?php echo $domain ?>/call/make/'+c2c_number+'?form=1&key='+key+'&cb=<?php if($callback) echo $callback;?>';
		headID.appendChild(newScript);
		headID.removeChild(newScript);
}
function c2c_fb_send(){
	 <?php logger( "Step", 'send email', $debug ); ?>
	no=c2c_number;
	var email=$("#c2c_fb_email").text();
	var name=$("#c2c_fb_name").text();
	var msg=$("#c2c_fb_message").text().replace(/(<([^>]+)>)/ig,"");;
	var key='<?php echo $key;?>';
	var headID = document.getElementsByTagName("head")[0]; 
	var newScript = document.createElement('script');
	newScript.type = 'text/javascript';
	newScript.src = 'http://<?php echo $domain ?>/call/feedback/?key='+key+'&no='+no+'&email='+email+'&msg='+msg+'&name='+name;
	headID.appendChild(newScript);
	headID.removeChild(newScript);
	c2c_show_final_screen();
}

function c2c_set_status(code){
	var count_timer = <?php echo $countdown; ?>;
	
	if (code == 'OK' ){
		<?php logger( "Step", 'calling', $debug ); ?>
		if (count_timer) c2c_countdown();
		c2c_set_inactive();
		var t=30;
		if (count_timer) t=count_timer+2;
		var wait = setInterval(function() {
			if (t== 0) {
				clearInterval(wait);
				c2c_show_feedback();
			}
			t = t -1;
		}, 1000);
	}
	
	switch(code) {
		case 'NOT_DIGITAL':
			$('#c2c_title').html("<?php echo $ERR_NOT_DIGITAL; ?>");
			break;
		case 'WRONG_LENGHT': 
			$('#c2c_title').html("<?php echo $ERR_WRONG_LENGHT; ?>");
			break;
		case 'WRONG_CCODE': 
			$('#c2c_title').html("<?php echo $ERR_WRONG_CCODE; ?>");
			break;
		case 'NOT_DEFINED': 
			$('#c2c_title').html("<?php echo $ERR_NOT_DEFINED; ?>");
			break;
	 }
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
		$("#c2c_block").html(c2c_call_form);
}

function c2c_countdown(){
  <?php logger( "Step", 'countdown', $debug ); ?>
  $("#c2c_status_code").val('');
	var timer =<?php echo $countdown ?>;;
	var timerId = setInterval(function() {
		$('#c2c_title').html('<?php echo $wait_call ?> '+ timer+' сек.');
		if (timer == 0) {
			clearInterval(timerId);
			$('#c2c_title').html('<?php echo $timeout_message ?>');
		}
		timer = timer -1;
	}, 1000);
}
function c2c_set_inactive(){
  <?php logger( "Step", 'set_inactive', $debug ); ?>
	$("#c2c_text").text('<?php echo $custom_text_2?>');
	$("#c2c_number").attr( "contenteditable", "false" );
	$("#c2c_number").css({"border":"1px solid #ccc","color": "#ccc"});
	$("#c2c_submit").css({"border":"1px solid #ccc","color": "#ccc"});
	$("#c2c_submit").removeAttr( "onclick" );
}
function c2c_show_feedback(){
	<?php logger( "Step", 'show_feedback', $debug ); ?>
    $("#c2c_block").html(c2c_feedback_form);
    $("#c2c_fb_message").css('width',$(".c2c_table_row").css('width'));
}

function c2c_show_final_screen(){
	<?php logger( "Step", 'final', $debug ); ?>
	$("#c2c_block").html(c2c_final_screen);
}


