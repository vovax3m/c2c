<table>
<tr class="minititle">
		<td>
			����
		</td>
		<td>
			�����
		</td>
		<td>
			IP
		</td>
		<td>
			��������
		</td>
		<td>
			�������
		</td>
		<td>
			�������� IP
		</td>
		<td>
			����������
		</td>
	</tr>
<?php
foreach($log as $item): 
?>
	<tr id="bid<?php echo $item['id']; ?>">
<?php
endforeach;
 ?>