<script>
	function worktime(day){
		var from=$('#'+day+'_from').val();
		var to=$('#'+day+'_to').val();
		if(to !="" && from !="" && to > from){
			$('#'+day).val(from+':'+to);
			$('#'+day+'_wt').val(from+':'+to);
		}
		
	}
	function preview(){
	  var bg_color=( $('#bg_color').val()  ? $('#bg_color').val() : 'red'  );
	  var hover=( $('#hover').val()  ? $('#hover').val() : '#016CB0'  );
	  var size=( $('#widget_size').val()  ? $('#widget_size').val() : '60'  );
	  var title=$('#title').val();
	  var font_size=$('#font_size').val();
	  var title_text_color=$('#title_text_color').val();
	  var block_radius=$('#block_radius').val();
	  var text_color=$('#text_color').val();
	  var block_border_color=$('#block_border_color').val();
	  var block_width= $('#block_width').val() + $('#width_type').val();
	  var btn_color=$('#btn_color').val();
	  var posX='';
	  var posY='';
	  var top=($('#position_top').val()>0 ? $('#position_top').val() : 0);
	  var bottom=($('#position_bottom').val()>0 ? $('#position_bottom').val() : 0);
	  var right=($('#position_right').val()>0 ? $('#position_right').val() : 0);
	  var left=($('#position_left').val()>0 ? $('#position_left').val() : 0);
	  if (top > 0 && bottom==0){
			posY='top: '+top +'%';
	  }else if(top ==0 && bottom>0){
		posY='bottom: '+bottom +'%';
	}
	 if (left > 0 && right==0){
			posX='left: '+left +'%';
	  }else if(left ==0 && right > 0){
		posX='right: '+right +'%';
	}		
	  var btn_value=$('#btn_value').val();
	  var style='.c2c_widget { \
						z-index: 999 !important; \
						margin: 5px !important; \
						padding: 5px !important; \
						position: fixed; \
						'+posY+';	\
						'+posX+'	;\
						color:'  +bg_color +'; \
						cursor: pointer; \
						font-size: '+size+'px; \
						line-height: '+(size/2)+'px; \
						font-family: c2c; \
						font-style: normal; \
						font-weight: normal; \
						display: inline-block; \
						text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5);  \
				} \
					.c2c_widget:hover { \
						color: '+hover+'; \
						-webkit-animation-play-state: paused;animation-play-state: paused; \
				}; \
				.c2c_title{ \
					font-size: '+font_size+'px !important; \
					color: '+ title_text_color +' !important; \
				} \
				.c2c_options{ \
					font-size: '+font_size+'px !important; \
					color: '+ title_text_color +' !important; \
				} \
				.c2c_table,.c2c_table tr,.c2c_table td{\
					border: 0px !important;\
					color: '+ text_color+' !important; \
					margin: 0px !important; \
					padding:0px !important; \
					width:auto; \
				}\
				.c2c_block{ \
					font-family:Helvetica, Arial, sans-serif;\
					position:fixed; \
					'+posY+'	;\
					'+posX+'	;\
					background: ' +bg_color +' !important; \
					border-radius: ' + block_radius +'px !important;\
					border: 1px solid '+ block_border_color+' !important;\
					width:'+ block_width+' !important; \
					color: '+ text_color+' !important; \
					z-index: 999 !important; \
				} \
				.c2c_submit{ \
					border: 1px solid black !important; \
					background: '+ btn_color+' !important; \
					border-radius: 2px !important; \
					font-size: '+font_size+' !important; \
					color: '+ text_color+' !important; \
					margin: 5px !important; \
					cursor: pointer; \
					padding: 5px !important; \
					width: 100px !important; \
				} \
				.c2c_opt_span{ \
					cursor: pointer; \
					font-family: c2c-gear; \
					font-style: normal; \
					font-weight: normal; \
					display: inline-block; \
					font-size: '+font_size+'  !important; \
					color: '+ title_text_color +' !important; \
				} \
				.c2c_number{ \
					background: white !important;\
					border: 1px solid black !important; \
					border-radius: 2px !important; \
					width: 130px !important; \
					margin: 5px !important; \
					padding: 5px !important; \
					font-size: ' + font_size + ' !important; \
				} ';
	  
	  var content='<i title="'+title+'" id="c2c_push" onclick="c2c_switch();" class="c2c_widget '+$('#widget_name').val()+' '+$('#animation').val()+ ' ">&#'+ $('#widget_code').val() + ';</i><div id="c2c_block" class="c2c_block " style="display:none" align="center"><div  onclick="c2c_switch();" style="top: 2px;right: 2px;position:absolute;cursor: pointer;font-size:'+font_size+'px !important;color: '+ title_text_color +' !important;" title="закрыть" >x</div><table class="c2c_table" align="center"><tr><td colspan="3" align="center" ><span id="c2c_title" class="c2c_title">'+title+'</span></td></tr><tr><td><div contenteditable="true" class="c2c_number" id="c2c_number" ></div></td><td><div class="c2c_submit"  onclick="alert($(\'#c2c_number\').text());">'+btn_value+'</div></td></tr></table><br><div id="c2c_status"></div></div>';
	  $('#c2c_push').remove();	
	  $('#c2c_block').remove();
	  $('#c2c_widget').remove();	
	  $('#c2c_drag').html(content);
	  $('<style type="text/css" id="c2c_widget">' + style + '</style>').appendTo('head');	
	}
	$('<link rel="stylesheet" href="/css/animation/tada.css">').appendTo('head');
	$('<link rel="stylesheet" href="/css/animation/scale.css">').appendTo('head');
	$('<link rel="stylesheet" href="/css/animation/ring.css">').appendTo('head');
	// .css("line-height", this.value/2+"px" );
	function c2c_show(){ 	$("#c2c_push").show();	}
	function c2c_hide(){	$("#c2c_push").hide();	}
	function c2c_toggle(){$("#c2c_options").toggle();	}
	function c2c_switch(){ console.log("c2c_switch"); $("#c2c_push").toggle();$("#c2c_block").toggle();}
	function get_coordinates(){
	    //$("#c2c_push").prop('onclick', 'console.log("1")');
		 var left=$('#c2c_drag').css('left');
		 var top=$('#c2c_drag').css('top');
		 var screenH=$(document).height();
		 var screenW=$(document).width();
		 console.log(screenH+ ' / '+ screenW + ' L= '+ left + 'T=' + top);
	//	$("#c2c_block").show();
	//	$("#c2c_block").hide();
	} 
	//" 
</script>
 <div id="c2c_drag" ondrag="get_coordinates();" ondrop="console.log('123')"  ></div>
<div align="center"><a href="http://c2c.sip64.ru/call/help" class="c2c_submit">api help</a> <a href="http://c2c.sip64.ru/call/help/form" class="c2c_submit">form help</a> <a href="http://c2c.sip64.ru/call/help/contact" class="c2c_submit">contact us</a></div>
<div class="left">
	<!--div align="center" style="font-family:Play, sans-serif;border:0px solid red;margin:10px;padding:10px;"--> 

<table>
		<tr>
			<td colspan=3 align="center"class="title">
				Настройка иконки виджета
			</td>
		</tr>
		<tr>
			<td align="left">
				<p >Иконка виджета</p> 
			</td>
			<td colspan=2>
				<p> 
				<i class="c2c_icon_list c2c-phone-circled" onclick="$('#widget_name').val('c2c-phone-circled'); $('#widget_code').val('xe812');preview();">&#xe812;</i>
				<i class="c2c_icon_list c2c-phone-squared" onclick="$('#widget_name').val('c2c-phone-squared'); $('#widget_code').val('xe801');preview();">&#xe801;</i>
				<i class="c2c_icon_list c2c-phone" onclick="$('#widget_name').val('c2c-phone'); $('#widget_code').val('xe800');preview();">&#xe800;</i>
				<i class="c2c_icon_list c2c-call" onclick="$('#widget_name').val('c2c-call'); $('#widget_code').val('xe80f');preview();">&#xe80f;</i>
				<i class="c2c_icon_list c2c-phone-3" onclick="$('#widget_name').val('c2c-phone-3'); $('#widget_code').val('xe813');preview();">&#xe813;</i>
				<i class="c2c_icon_list c2c-phone-1" onclick="$('#widget_name').val('c2c-phone-1'); $('#widget_code').val('xe806');preview();">&#xe806;</i>
				<i class="c2c_icon_list c2c-phone-outline" onclick="$('#widget_name').val('c2c-phone-outline'); $('#widget_code').val('xe807');preview();">&#xe807;</i>
				<i class="c2c_icon_list c2c-phone-2" onclick="$('#widget_name').val('c2c-phone-2'); $('#widget_code').val('xe808');preview();">&#xe808;</i>		
				<i class="c2c_icon_list c2c-sort-numeric" onclick="$('#widget_name').val('c2c-sort-numeric'); $('#widget_code').val('xe80a');preview();">&#xe80a;</i>
				<i class="c2c_icon_list c2c-sort-numeric-outline" onclick="$('#widget_name').val('c2c-sort-numeric-outline'); $('#widget_code').val('xe809');preview();">&#xe809;</i>		
			</p>
			<p>	
				<i class="c2c_icon_list c2c-bell-1" onclick="$('#widget_name').val('c2c-bell-1'); $('#widget_code').val('xe811');preview();">&#xe811;</i>
				<i class="c2c_icon_list c2c-bell"     onclick="$('#widget_name').val('c2c-bell'); $('#widget_code').val('xe803');preview();">&#xe803;</i>
				<i class="c2c_icon_list c2c-bell-alt" onclick="$('#widget_name').val('c2c-bell-alt'); $('#widget_code').val('xe804');preview();">&#xe804;</i> 
				<i class="c2c_icon_list c2c-rocket" onclick="$('#widget_name').val('c2c-rocket'); $('#widget_code').val('xe805');preview();">&#xe805;</i>
				<i class="c2c_icon_list c2c-mobile-1" onclick="$('#widget_name').val('c2c-mobile-1'); $('#widget_code').val('xe80e');preview();">&#xe80e;</i>
				<i class="c2c_icon_list c2c-mobile" onclick="$('#widget_name').val('c2c-mobile'); $('#widget_code').val('xe80b');preview();">&#xe80b;</i>
				<i class="c2c_icon_list c2c-mobile-alt" onclick="$('#widget_name').val('c2c-mobile-alt'); $('#widget_code').val('xe80c');preview();">&#xe80c;</i>
				<i class="c2c_icon_list c2c-fax" onclick="$('#widget_name').val('c2c-fax'); $('#widget_code').val('xe802');preview();">&#xe802;</i> 
				<i class="c2c_icon_list c2c-calendar" onclick="$('#widget_name').val('c2c-calendar'); $('#widget_code').val('xe80d');preview();">&#xe80d;</i>
				<i class="c2c_icon_list c2c-info-circled" onclick="$('#widget_name').val('c2c-info-circled'); $('#widget_code').val('xe810');preview();">&#xe810;</i>
			</p>
		</td>
	</tr>
	<tr>
		<td align="left">
			<p >Анимация</p> 
		</td>
		<td colspan=2>
			<p>
				<br><br>
				<i class="c2c_icon_list c2c-phone-circled" onclick="$('#animation').val('');preview(); ">&#xe812;</i>&nbsp;&nbsp;&nbsp;
				<i class="c2c_icon_list c2c-phone-circled tada" onclick="$('#animation').val('tada');preview();">&#xe812;</i>&nbsp;&nbsp;&nbsp;
				<i class="c2c_icon_list c2c-phone-circled scale" onclick="$('#animation').val('scale');preview();">&#xe812;</i>&nbsp;&nbsp;&nbsp;
				<i class="c2c_icon_list c2c-phone-circled blink1 " onclick="$('#animation').val('scale');preview();">&#xe812;</i> &nbsp;&nbsp;&nbsp;
			</p>
			<br><br>
		</td>
	</tr>
	<tr>
			<td align="left">
				<p >Цвет виджета</p> 
			</td>
			<td>	
				<input type="color" name="col"  class="input100" id="bg_color_input_color"  onchange="$('#bg_color').val(this.value);$('#bg_color_input_text').val(this.value);preview();" value="#ff6666">
			    &nbsp;&nbsp;
				<input type="text" class="input100" id="bg_color_input_text" onchange="$('#bg_color').val(this.value);$('#bg_color_input_color').val(this.value);preview();" >
			</td>
		</tr>
		<tr>
			<td align="left">
				<p >Цвет виджета при наведении</p>
			</td>
			<td>	
				<input type="color" name="col" class="input100" id="hover_input_color" onchange="$('#hover').val(this.value);$('#hover_input_text').val(this.value);preview();" value="#ff6666">
			&nbsp;&nbsp;
				<input type="text" class="input100" id="hover_input_text" onchange="$('#hover').val(this.value);$('#hover_input_color').val(this.value);preview();">
			</td>
		</tr>
		<tr>
			<td align="left">
				<p >Размер виджета</p> 
			</td>
			<td>
				<select class="input100"  id="ws_input_select"  onchange="$('#widget_size').val(this.value);$('#ws_input_text').val(this.value);preview();">
					<option value=""></option>
					<option value="24">24</option>
					<option value="36">36</option>
					<option value="48">48</option>
					<option value="60">60</option>
					<option value="72">72</option>
					<option value="84">84</option>
				</select>
			&nbsp;&nbsp;
				<input type="text" class="input100" id="ws_input_text"  onchange="$('#widget_size').val(this.value);preview();">
			</td>
		</tr>
		<tr>
			<td align="left">
				<p >Задержка появления </p>
			</td>
			<td>
				<select class="input100" onchange="$('#start_delay').val(this.value);"   onchange="$('#start_delay').val(this.value);$('#start_delay_text').val(this.value);preview();">
					<option value="">сразу</option>
					<option value="3">3 секунды</option>
					<option value="5">5 секунд</option>
					<option value="15">15 секунд</option>
					<option value="30">30 секунд</option>
					<option value="60">1 минута</option>
				</select>
			&nbsp;&nbsp;
				<input type="text" class="input100"  id="start_delay_text" onchange="$('#start_delay').val(this.value);preview();">
			</td>
		</tr>
		<tr>
			<td align="left">
				<p >Задержка скрытия</p> 
			</td>
			<td>
				<select class="input100" onchange="$('#end_delay').val(this.value);$('#end_delay_text').val(this.value);preview();">
					<option value="">никогда</option>
					<option value="30">30 секунд</option>
					<option value="60">1 минута</option>
					<option value="180">3 минуты</option>
					<option value="300">5 минут</option>
					<option value="600">10 минут</option>
				</select>
			&nbsp;&nbsp;
				<input type="text" class="input100"  id="end_delay_text"  onchange="$('#end_delay').val(this.value);preview();">
			</td>
			</tr>
			<tr>
			<td align="left">
				<p >Положение по вертикали</p> 
			</td>
			<td>
				<input type="range" min="0" max="100" step="5"  value="0" class="input210" id="position_top_range" onchange="$('#position_top').val(this.value);preview(); $('#position_top_text').val(this.value);$('#position_bottom').val(0);$('#position_bottom_text').val(0);$('#position_bottom_range').val(0);">&nbsp;&nbsp;
				<input type="text" class="input100"  id="position_top_text"  onchange="$('#position_top').val(this.value);preview();$('#position_top_range').val(this.value);$('#position_bottom').val(0);$('#position_bottom_text').val(0);$('#position_bottom_range').val(0);">
				<br>
				<input type="range" min="0" max="100" step="5" value="0" class="input210" id="position_bottom_range" onchange="$('#position_bottom').val(this.value);preview(); $('#position_bottom_text').val(this.value); $('#position_top').val(0);$('#position_top_text').val(0);$('#position_top_range').val(0);">&nbsp;&nbsp;
				<input type="text" class="input100"   id="position_bottom_text"  onchange="$('#position_bottom').val(this.value);preview();$('#position_bottom_range').val(this.value);$('#position_top').val(0);$('#position_top_text').val(0);$('#position_top_range').val(0);">
			</td>
			</tr>
			<tr>
			<td align="left">
				<p >Положение по горизонтали</p> 
			</td>
			<td>
				<input type="range" min="0" max="100" step="5" value="0" class="input210" id="position_left_range"  onchange="$('#position_left').val(this.value);preview(); $('#position_left_text').val(this.value);$('#position_right').val(0);$('#position_right_text').val(0);$('#position_right_range').val(0);"> &nbsp;&nbsp;
				<input type="text" class="input100"  id="position_left_text"  onchange="$('#position_left').val(this.value);preview();$('#position_right').val(0);$('#position_right_text').val(0);$('#position_right_range').val(0);">
				<br>
				<input type="range" min="0" max="100" step="5" value="0" class="input210" id="position_right_range" onchange="$('#position_right').val(this.value);preview(); $('#position_right_text').val(this.value);$('#position_left').val(0);$('#position_left_text').val(0);$('#position_left_range').val(0);">&nbsp;&nbsp;
				<input type="text" class="input100"  id="position_right_text"  onchange="$('#position_right').val(this.value);preview();$('#position_right_range').val(this.value);$('#position_left').val(0);$('#position_left_text').val(0);$('#position_left_range').val(0);">
			</td>
			</tr>
		</table>
	</div>
	<div class="right">
		<table>
			<tr>
			<td colspan=3 align="center"class="title">
				Настройка окна виджета
			</td>
		</tr>
			<tr>
			<td align="left">
				<p >Заголовок блока</p>
			</td>
			<td>
				<input type="text" class="input210" onchange="$('#title').val(this.value);preview();c2c_switch();">
			</td>
			</tr>
			<tr>
			<td align="left">
				<p >Цвет текста заголовка</p>
			</td>
			<td>
				<input type="color" name="col" class="input100" onchange="$('#title_text_color').val(this.value); value="#ff6666"> 
			&nbsp;&nbsp;
				<input type="text"  class="input100" onchange="$('#title_text_color').val(this.value);">
			</td>
		</tr>
		<tr>
			<td align="left">
				<p >Ширина блока</p> 
			</td>
			<td>
				<input type="text" class="input100" onchange="$('#block_width').val(this.value);">
			&nbsp;&nbsp;
				<select onchange="$('#width_type').val(this.value);" class="input100">
					<option value="px">Пикселей</option>
					<option value="%">Процентов</option>
				</select>
			</td>
		</tr>
		<tr>
			<td align="left">
				<p >Закругление углов блока</p> 
			</td>
			<td>
				<select class="input100" onchange="$('#block_radius').val(this.value);">
					<option value="" selected></option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
					<option value="25">25</option>
				</select>
			&nbsp;&nbsp;
				<input type="text" class="input100" onchange="$('#block_radius').val(this.value);">
			</td>
		</tr>
		<tr>
			<td align="left">
				<p >Цвет рамки блока</p>
			</td>
			<td>
				<input type="color" name="col" class="input100" onchange="$('#block_border_color').val(this.value); value="#ff6666">
			&nbsp;&nbsp;
				<input type="text" class="input100"  onchange="$('#block_border_color').val(this.value);">
			</td>
		</tr>
		<tr>
			<td align="left">
				<p >Текст кнопки</p> 
			</td>
			<td>
				<input type="text" class="input210" onchange="$('#btn_value').val(this.value);">
			</td>
		</tr>
		<tr>
			<td align="left">
				<p >Цвет фона кнопки</p> 	
			</td>	
			<td>
				<input type="color" name="col" class="input100" onchange="$('#btn_color').val(this.value); value="#ff6666">
			&nbsp;&nbsp;
				<input type="text" class="input100" onchange="$('#btn_color').val(this.value);">
			</td>
		</tr>
		<tr>
			<td align="left">
				<p >Цвет текста кнопки</p> 
			</td>
		    <td>
				<input type="color" name="col" class="input100" onchange="$('#text_color').val(this.value); value="#ff6666">
			&nbsp;&nbsp;
				<input type="text"  class="input100" onchange="$('#text_color').val(this.value);">
			</td>
		</tr>
		<tr>
			<td align="left">
				<p >Размер текста в блоке</p>
			</td>
			<td>
				<select class="input100" onchange="$('#text_color').val(this.value);">
					<option value="" selected></option>
					<option value="6">6</option>
					<option value="8">8</option>
					<option value="10">10</option>
					<option value="12">12</option>
					<option value="14">14</option>
					<option value="16">16</option>
					<option value="18">18</option>
					<option value="20">20</option>
				</select>
			&nbsp;&nbsp;
				<input type="text" class="input100" onchange="$('#text_color').val(this.value);">
			</td>
		</tr>
	 <tr>
	<tr>
			<td colspan=3 align="center"class="title">
				Время работы
			</td>
		</tr>
	<tr>
		<td align="left">
			Понедельник:
		</td>
		<td> c <select id="mo_from"  onchange="worktime('mo');">
			<option value="" selected></option>
			<option value="00">00</option>
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
		</select>
		до
		<select id="mo_to" onchange="worktime('mo');">
			<option value="" selected></option>
			<option value="00">00</option>
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
		</select>	
	</td>
	<td>
		<input type="text" id="mo_wt">
	</td>
	</tr>
	<tr>
	<td align="left">
		Вторник:
	</td>
	<td> c <select id="tu_from"  onchange="worktime('tu');">
			<option value="" selected></option>
			<option value="00">00</option>
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
		</select>
		до
		<select id="tu_to" onchange="worktime('tu');">
			<option value="" selected></option>
			<option value="00">00</option>
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
		</select>	
	</td>
	<td>
		<input type="text" id="tu_wt">
	</td>
	</tr>
	<tr>
		<td align="left">
			Среда:	
		</td>
		<td> c <select id="we_from"  onchange="worktime('we');">
			<option value="" selected></option>
			<option value="00">00</option>
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
		</select>
		до
		<select id="we_to" onchange="worktime('we');">
			<option value="" selected></option>
			<option value="00">00</option>
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
		</select>	
	</td>
	<td>
		<input type="text" id="we_wt">
	</td>
	</tr>
	<tr>
		<td align="left">
			Четверг:
		</td>
		<td> c <select id="th_from"  onchange="worktime('th');">
			<option value="" selected></option>
			<option value="00">00</option>
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
		</select>
		до
		<select id="th_to" onchange="worktime('th');">
			<option value="" selected></option>
			<option value="00">00</option>
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
		</select>	
	</td>
	<td>
		<input type="text" id="th_wt">
	</td>
	</tr>
	<tr>
		<td align="left">
			Пятница:
		</td>
		<td> c <select id="fr_from"  onchange="worktime('fr');" >
			<option value="" selected></option>
			<option value="00">00</option>
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
		</select>
		до
		<select id="fr_to" onchange="worktime('fr');">
			<option value="" selected></option>
			<option value="00">00</option>
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
		</select>	
	</td>
	<td>
		<input type="text" id="fr_wt">
	</td>
	</tr>
	<tr>
		<td align="left">
			Суббота:
		</td>
		<td> c <select id="sa_from"  onchange="worktime('sa');">
			<option value="" selected></option>
			<option value="00">00</option>
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
		</select>
		до
		<select id="sa_to" onchange="worktime('sa');">
			<option value="" selected></option>
			<option value="00">00</option>
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
		</select>	
	</td>
	<td>
		<input type="text" id="sa_wt">
	</td>
	</tr>
	<tr>
		<td align="left">
			Воскресенье:
		</td>
		<td>
			c <select id="su_from" onchange="worktime('su');">
					<option value="" selected></option>
					<option value="00">00</option>
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
				</select>
				до
				<select id="su_to" onchange="worktime('su');">
					<option value="" selected></option>
					<option value="00">00</option>
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
				</select>
			</td>
			<td>
				<input type="text" id="su_wt">
			</td>
		</tr>
	</table>
	</div>
	<form action="panel/set" method="POST">
		<input type="text" name="uid" value="<?php $uid ?>">
		<input type="text" id="format" name="format" value="widget">
		<input type="text" id="widget_name" name="widget_name" value="">
		<input type="text" id="widget_code" name="widget_code" value="">
		<input type="text" id="bg_color" name="bg_color" value="#ccc">
		<input type="text" id="hover" name="hover" value="#c00">
		<input type="text" id="widget_size" name="widget_size" value="50">
		<input type="text" id="title" name="title" value="Звонок с сайта">
		<input type="text" id="title_text_color" name="title_text_color" value="#000">
		<input type="text" id="block_width" name="block_width" value="500">
		<input type="text" id="width_type" name="width_type" value="px">
		<input type="text" id="block_radius" name="block_radius" value="5">
		<input type="text" id="block_border_color" name="block_border_color" value="#000">
		<input type="text" id="btn_value" name="btn_value" value="Звонок">
		<input type="text" id="btn_color" name="btn_color" value="#fff">
		<input type="text" id="text_color" name="text_color" value="#000">
		<input type="text" id="font_size" name="font_size" value="18">
		<input type="text" id="start_delay" name="start_delay" value="3">
		<input type="text" id="end_delay" name="end_delay" value="50">
		<input type="text" id="animation" name="animation" value="">
		<input type="text" id="mo" name="mo" value="">
		<input type="text" id="tu" name="tu" value="">
		<input type="text" id="we" name="we" value="">
		<input type="text" id="th" name="th" value="">
		<input type="text" id="fr" name="fr" value="">
		<input type="text" id="sa" name="sa" value="">
		<input type="text" id="su" name="su" value="">
		<input type="text" id="position_top" name="right" value="">
		<input type="text" id="position_bottom" name="bottom" value="">
		<input type="text" id="position_left" name="left" value="">
		<input type="text" id="position_right" name="right" value="">
		<input type="submit" name="submit" value="Сохранить">
	</form>
 </div>
 
	  

