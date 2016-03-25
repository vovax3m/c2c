
 var content='<div id="c2c_block" class="c2c_block" <?php if($start_delay):?>style="display:none"<?php endif;?>><span id="c2c_title" class="c2c_title"><?php echo $title?></span><br><input type="text" class="c2c_number" id="c2c_number" placeholder="74951234567"><input class="c2c_submit" type="submit" value="<?php echo $btn_value; ?>" onclick="c2c_call();"> <span class="c2c_opt_span" onclick="c2c_toggle();"><i class="icono-gear spin"></i></span><div id="c2c_options" style="display:none"><br>немедленно или <select id="c2c_day"></select></div><br><div id="c2c_status"></div></div>';
 /* <?php /* $days='';
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
  */
 $(function(){
	<?php if($start_delay):?>
		setTimeout(c2c_show,<?php echo $start_delay*1000 ;?>);
	<?php endif;
		  if ($start_delay && $end_delay):?>
		setTimeout(c2c_hide,<?php echo $end_delay*1000 ;?>);
	<?php endif?>
	
	$("#<?php echo $block?>").html(content);
	
	//styles
	
     var style = " \
				.c2c_title{ \
					font-size: <?php echo $font_size;?>px !important; \
					color: <?php echo $title_text_color;?> !important; \
				} \
				.c2c_block{ \
					background: <?php echo $bg_color;?> !important; \
					border-radius: <?php echo $block_radius;?>px !important;\
					border: 1px solid <?php echo $block_border_color;?> !important;\
					width: <?php echo $block_width;?> !important; \
					text-align: center;\
					color: <?php echo $text_color;?> !important; \
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
				} \
				.c2c_number{ \
					background: white !important;\
					border: 1px solid black !important; \
					border-radius: 2px !important; \
				} \
				.icono-gear:before{position:absolute;left:50%;top:50%;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.icono-gear:hover{-webkit-animation:loading-spinner 2s  infinite linear;animation:loading-spinner  2s infinite linear}@-webkit-keyframes loading-spinner {0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}100%{-webkit-transform:rotate(180deg);transform:rotate(180deg)}}@keyframes loading-spinner{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}100%{-webkit-transform:rotate(180deg);transform:rotate(180deg)}}.icono-gear{width:30px;height:30px;border:3px dotted <?php echo $title_text_color;?> ;border-radius:50%;margin:1px }.icono-gear:before{width:20px;height:20px;box-shadow:0 0 0 3px,0 0 0 2px inset;border-radius:50%;border:6px solid transparent;box-sizing:border-box}.icono-filter{width:0;height:0;border:10px solid ;border-bottom:none;border-left-color:transparent;border-right-color:transparent;padding:3px;box-shadow:inset 0 7px;margin:9px 4px}.icono-sitemap{width:24px;height:2px;box-shadow:0 -5px;margin:21px 5px 11px}.icono-sitemap:before{width:6px;height:6px;border-radius:2px;box-shadow:inset 0 0 0 32px,11px 0,-11px 0,0 -14px 0 1px}.icono-sitemap:after{width:2px;height:10px;box-shadow:0 -7px,11px -5px,-11px  -5px} [class*=icono-]{display:inline-block;vertical-align:middle;position:relative;font-style:normal;color:<?php echo $title_text_color;?>;text-align:left;text-indent:-9999px;direction:ltr;cursor:pointer}[class*=icono-]:after,[class*=icono-]:before{content:'';pointer-events:none}[class*=icono-][class*=Circle]{border-radius:50%;width:25px;height:25px;margin:2px}[class*=icono-],[class*=icono-] *{box-sizing:border-box} \
				";
 
	$('<style type="text/css">' + style + '</style>').appendTo('head');
	
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
		$("#c2c_block").show();
}
function c2c_hide(){
		$("#c2c_block").hide();
}
function c2c_toggle(){
	$("#c2c_options").toggle();
}