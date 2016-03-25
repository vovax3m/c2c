<table>
<tr class="minititle">
		<td>
			дата
		</td>
		<td>
			номер
		</td>
		<td>
			IP
		</td>
		<td>
			Название
		</td>
		<td>
			Активен
		</td>
		<td>
			привязка IP
		</td>
		<td>
			Управление
		</td>
	</tr>
<?php
foreach($log as $item): 
?>
	<tr id="bid<?php echo $item['id']; ?>">
<?php
endforeach;
 ?>