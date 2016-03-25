

<!--  ADD -->
<span title="Добавить" class="title hand" onclick="$('#addform').toggle('100')">Добавить </span>  <span class="title" style="display:none" id="editspan"> / <span title="Изменить" class="title hand" onclick="$('#editform').toggle('100')" >Редактировать</span>  </span>
  <span class="title">пользователя</span>
<div id="addform" style="display:none" >
	<form action="/admin/useradd/" method="POST">
		<table>
			<tr>
				<td align="left">
					
					<p><label>Название: </label><br> 
						<input type="text" class="loginform" name="name" id="name" required>
					</p>
					<p><label>Группа: </label><br> 
						<input type="text" class="loginform" name="group" id="group" required>
					</p>
					<p><label>Транк: </label><br> 
						<input type="text" class="loginform" name="trunk" id="trunk" required>
					</p>
					<p><label>IP: </label><br> 
						<input type="text" class="loginform" name="ip" id="ip">
					</p>
					<p>
						<input type="submit"  name="submit" class="loginform" value="Добавить" >
					</p>
					<!--p>Логин <span  OnClick="runPassGen('username')" class="blue hand">придумать</span><br>
						<input type="text" class="addform" name="username" id="username">
					</p-->
					
				</td>
			</tr>
		</table>
	</form>
</div>

<!-- EDIT -->

<div id="editform" style="display:none" >
	<form action="/admin/useredit/" method="POST">
		<table>
			<tr>
				<td align="left">
					
					<p><label>Название: </label><br> 
						<input type="text" class="loginform" name="ename" id="ename" required>
						<input type="hidden"  name="eid" id="eid" required>
					</p>
					<p><label>Группа: </label><br> 
						<input type="text" class="loginform" name="egroup" id="egroup" required>
					</p>
					<p><label>Транк: </label><br> 
						<input type="text" class="loginform" name="etrunk" id="etrunk" required>
					</p>
					<p><label>IP: </label><br> 
						<input type="text" class="loginform" name="eip" id="eip">
					</p>
					<p><label>Счетчик: </label><br> 
						<input type="text" class="loginform" name="ecounter" id="ecounter">
					</p>
					<p><label>Ключ: </label> <span class="arrow_right hand" onclick="gen()"> перегенерировать</span><br> 
						<input type="text" class="loginform" name="eapikey" id="eapikey">
					</p>
					<p><label>Активен: </label><br> 
						<input type="checkbox" class="loginform" name="eactive" id="eactive">
					</p>
					<p>
						<input type="submit"  name="esubmit" class="loginform" value="Изменить" >
					</p>
					<!--p>Логин <span  OnClick="runPassGen('username')" class="blue hand">придумать</span><br>
						<input type="text" class="addform" name="username" id="username">
					</p-->
					
				</td>
			</tr>
		</table>
	</form>
</div>



<!------------------------------------------------ -->
<div align="center" id="temp" class="temp"></div>
<div align="center">
<span class="title"> User list</span>

<br>

<table>
<tr class="minititle">
		<td>
			Название
		</td>
		<td>
			Группа
		</td>
		<td>
			Транк
		</td>
		<td>
			Ключ
		</td>
		<td>
			Активен
		</td>
		<td>
			привязка IP
		</td>
		<td>
			Звонки за день
		</td>
		<td>
			Управление
		</td>
		<td>
			Строка вызова
		</td>
	</tr>
<?php
foreach($users as $user): 
?>
	<tr id="bid<?php echo $user['id']; ?>">
		<td>
			<?php echo $user['name']; ?>
			<input type="hidden"  id="hname<?php echo $user['id']; ?>" value="<?php echo $user['name']; ?>">
		</td>
		<td>
			<?php echo $user['rgroup']; ?>
			<input type="hidden"  id="hgroup<?php echo $user['id']; ?>" value="<?php echo $user['rgroup']; ?>">
		</td>
		<td>
			<?php echo $user['trunk']; ?>
			<input type="hidden"  id="htrunk<?php echo $user['id']; ?>" value="<?php echo $user['trunk']; ?>">
		</td>
		<td>
			<?php echo $user['apikey']; ?>
			<input type="hidden"  id="hapikey<?php echo $user['id']; ?>" value="<?php echo $user['apikey']; ?>">
		</td>
		<td>
			<?php echo $user['active']; ?>
			<input type="hidden"  id="hactive<?php echo $user['id']; ?>" value="<?php echo $user['active']; ?>">
		</td>
		<td>
			<?php echo long2ip($user['pip']); ?>
			<input type="hidden"  id="hip<?php echo $user['id']; ?>" value="<?php echo long2ip($user['pip']); ?>">
		</td>
		<td>
			<?php echo $user['counter']; ?>
			<input type="hidden"  id="hcounter<?php echo $user['id']; ?>" value="<?php echo $user['counter']; ?>">
		</td>
		<td>
			<span class="hand" onclick="edit('<?php echo $user['id']; ?>')">изменить</span>  / <span class="hand" onclick="del('<?php echo $user['id']; ?>')">удалить</span>
		</td>
		<td><span class="hand" data-clipboard-target="#link<?php echo $user['id']; ?>" id="button<?php echo $user['id']; ?>"> в буфер  </span> 
			<input type="text" id="link<?php echo $user['id']; ?>"  class="loginform"  value="http://c2c.sip64.ru/call/make/78452740740?key=<?php echo $user['apikey']; ?>">
			<script> new Clipboard('#button<?php echo $user['id']; ?>'); </script>
		</td>
	</tr>
<?php
endforeach;
 ?>
</table>
</div>
