
<div align="center"><a href="http://c2c.sip64.ru/call/help" class="c2c_submit">api help</a> <a href="http://c2c.sip64.ru/call/help/form" class="c2c_submit">form help</a> <a href="http://c2c.sip64.ru/call/help/contact" class="c2c_submit">contact us</a></div>
<div class="left">
	<div align="center" style="font-family:Play, sans-serif;border:0px solid red;margin:10px;padding:10px;">
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
	  var style='.c2c_ir2{'+
	  'color: red;' +
      'font-size: 80px;'+
	  'line-height: 30px;'+
      'font-family: "c2c";'+
      'font-style: normal;' +
      'font-weight: normal;'+
      'display: inline-block;' +
	  'cursor:pointer;'+
	  'margin:3px;' +
	  'padding:5px;'+
      'text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5);'+
	  '}'+
	  '.c2c_ir2:hover{'+
	  'color: #016CB0;}'
	  ;
	  $('#result').attr('class',$('#widget_name').val()).html('&#'+ $('#widget_code').val() + ';');
	  $('#c2c_widget').remove();	
	  $('<style type="text/css" id="c2c_widget">' + style + '</style>').appendTo('head');	
	}
	$('<link rel="stylesheet" href="/css/animation/tada.css">').appendTo('head');
	$('<link rel="stylesheet" href="/css/animation/scale.css">').appendTo('head');
	$('<link rel="stylesheet" href="/css/animation/ring.css">').appendTo('head');
	// .css("line-height", this.value/2+"px" );
	</script>
	<p class="title">Выбор виджета</p>
	<p> 
		<i class="c2c_icon_list c2c-phone-circled" onclick="$('#widget_name').val('c2c_ir2 c2c-phone-circled'); $('#widget_code').val('xe812');preview();">&#xe812;</i>
	    <i class="c2c_icon_list c2c-phone-squared" onclick="$('#result').attr('class',' c2c_ir c2c-phone-squared').html('&#xe801;');">&#xe801;</i>
		<i class="c2c_icon_list c2c-phone" onclick="$('#result').attr('class','c2c_ir c2c-phone').html('&#xe800;');">&#xe800;</i>
		<i class="c2c_icon_list c2c-call" onclick="$('#result').attr('class','c2c_ir c2c-call').html('&#xe80f;');">&#xe80f;</i>
		<i class="c2c_icon_list c2c-phone-3" onclick="$('#result').attr('class','c2c_ir c2c-phone-3').html('&#xe813;');">&#xe813;</i>
        <i class="c2c_icon_list c2c-phone-1" onclick="$('#result').attr('class','c2c_ir c2c-phone-1').html('&#xe806;');">&#xe806;</i>
        <i class="c2c_icon_list c2c-phone-outline" onclick="$('#result').attr('class','c2c_ir c2c-phone-outline').html('&#xe807;');">&#xe807;</i>
		<i class="c2c_icon_list c2c-phone-2" onclick="$('#result').attr('class','c2c_ir c2c-phone-2').html('&#xe808;');">&#xe808;</i>		
		<i class="c2c_icon_list c2c-sort-numeric" onclick="$('#result').attr('class','c2c_ir c2c-sort-numeric').html('&#xe80a;');">&#xe80a;</i>
        <i class="c2c_icon_list c2c-sort-numeric-outline" onclick="$('#result').attr('class','c2c_ir c2c-sort-numeric-outline').html('&#xe809;');">&#xe809;</i>		
	</p>
	<p>	
		<i class="c2c_icon_list c2c-bell-1" onclick="$('#result').attr('class','c2c_ir c2c-bell-1').html('&#xe811;');">&#xe811;</i>
        <i class="c2c_icon_list c2c-bell" onclick="$('#result').attr('class','c2c_ir c2c-bell').html('&#xe803;');">&#xe803;</i>
        <i class="c2c_icon_list c2c-bell-alt" onclick="$('#result').attr('class','c2c_ir c2c-bell-alt').html('&#xe804;');">&#xe804;</i> 
        <i class="c2c_icon_list c2c-rocket" onclick="$('#result').attr('class','c2c_ir c2c-rocket').html('&#xe805;');">&#xe805;</i>
        <i class="c2c_icon_list c2c-mobile-1" onclick="$('#result').attr('class','c2c_ir c2c-mobile-1').html('&#xe80e;');">&#xe80e;</i>
        <i class="c2c_icon_list c2c-mobile" onclick="$('#result').attr('class','c2c_ir c2c-mobile').html('&#xe80b;');">&#xe80b;</i>
        <i class="c2c_icon_list c2c-mobile-alt" onclick="$('#result').attr('class','c2c_ir c2c-mobile-alt').html('&#xe80c;');">&#xe80c;</i>
		<i class="c2c_icon_list c2c-fax" onclick="$('#result').attr('class','c2c_ir c2c-fax').html('&#xe802;');">&#xe802;</i> 
        <i class="c2c_icon_list c2c-calendar" onclick="$('#result').attr('class','c2c_ir c2c-calendar').html('&#xe80d;');">&#xe80d;</i>
        <i class="c2c_icon_list c2c-info-circled" onclick="$('#result').attr('class','c2c_ir c2c-info-circled').html('&#xe810;');">&#xe810;</i>
	</p>
	
	<p class="title">Цвет виджета</p> 
	<p>Выберите <input type="color" name="col" onchange="$('#bg_color').val(this.value); value="#ff6666"> или введите <input type="text" onchange="$('#bg_color').val(this.value);" > </p>
	
	<p class="title">Цвет виджета при наведении</p>
	<p>Выберите <input type="color" name="col" onchange="$('#hover').val(this.value); value="#ff6666"> или введите <input type="text"  onchange="$('#hover').val(this.value);"> </p>
	<!--p><input type="button" onclick="console.log (document.getElementById('result').style.width)" value="get"></p-->
	
	<p class="title">Размер виджета</p> 
	<p>Введите <input type="text" onchange="$('#widget_size').val(this.value);"></p>
	
	<p class="title">Анимация</p> 
	<p>
		<i class="c2c_icon_list c2c-phone-circled tada" onclick="$('#animation').val('tada');preview();">&#xe812;</i>
		<i class="c2c_icon_list c2c-phone-circled scale" onclick="$('#animation').val('scale');preview();">&#xe812;</i>
		<i class="c2c_icon_list c2c-phone-circled blink1 " onclick="$('#animation').val('scale');preview();">&#xe812;</i> 
	</p> 
	
	<p class="title">Задержка появления в секундах</p> 
	<p>Введите <input type="text" onchange="$('#start_delay').val(this.value);"></p>
	
	<p class="title">Задержка скрытия в секундах</p> 
	<p>Введите <input type="text" onchange="$('#end_delay').val(this.value);"></p>
	
	<p class="title">Заголовок блока</p> 
	<p>Введите <input type="text" onchange="$('#title').val(this.value);"></p>
	
	<p class="title">Цвет текста заголовка</p> 
	<p>Выберите <input type="color" name="col" onchange="$('#title_text_color').val(this.value); value="#ff6666"> или введите <input type="text"  onchange="$('#title_text_color').val(this.value);"> </p>
	
	<p class="title">Ширина блока</p> 
	<p>Введите <input type="text" onchange="$('#block_width').val(this.value);">
		<select onchange="$('#width_type').val(this.value);">
			<option value="px">Пикселей</option>
			<option value="%">Процентов</option>
		</select>
	</p>
	<p class="title">Закругление углов блока</p> 
	<p>Введите <input type="text" onchange="$('#block_radius').val(this.value);"></p>		
	
	<p class="title">Цвет рамки блока</p> 
	<p>Выберите <input type="color" name="col" onchange="$('#block_border_color').val(this.value); value="#ff6666"> или введите <input type="text"  onchange="$('#block_border_color').val(this.value);"> </p>
	
	<p class="title">Текст кнопки</p> 
	<p>Введите <input type="text" onchange="$('#btn_value').val(this.value);"></p>
    
	<p class="title">Цвет фона кнопки</p> 	
	<p>Выберите <input type="color" name="col" onchange="$('#btn_color').val(this.value); value="#ff6666"> или введите <input type="text"  onchange="$('#btn_color').val(this.value);"> </p>
	
	<p class="title">Цвет текста кнопки</p> 	
	<p>Выберите <input type="color" name="col" onchange="$('#text_color').val(this.value); value="#ff6666"> или введите <input type="text"  onchange="$('#text_color').val(this.value);"> </p>
	
	<p class="title">Размер текста в блоке</p> 
	<p>Введите <input type="text" onchange="$('#text_color').val(this.value);"></p>
	
	<table ><tr><td colspan=3><p class="title">Время работы </p> </td></tr>
	<tr><td>
	Понедельник:</td><td> c <select id="mo_from"  onchange="worktime('mo');">
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
	<tr><td>
	Вторник:</td><td> c <select id="tu_from"  onchange="worktime('tu');">
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
	<tr><td>
	Среда:</td><td> c <select id="we_from"  onchange="worktime('we');">
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
	<tr><td>
	Четверг:</td><td> c <select id="th_from"  onchange="worktime('th');">
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
	<tr><td>
	Пятница:</td><td> c <select id="fr_from"  onchange="worktime('fr');" >
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
	<tr><td>
	Суббота:</td><td> c <select id="sa_from"  onchange="worktime('sa');">
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
		<td>
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
		<input type="submit" name="submit" value="Сохранить">
	</form>
 </div>
 <div class="right">
	<p class="title">Выбор</p>
	<p>Виджет</p>
	<p ><i id="result" ></i></p>
 </div>
	  

