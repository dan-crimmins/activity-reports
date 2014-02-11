<?php
$header_color = (strtolower($store) == 'sears') ? '#0033CC' : '#FF0000';
?>

<html>
<head>
</head>

<body>

<font color="gray" size="10" face="Arial">
	
	<table width="33%"  bgcolor="#F0F0F0" border="1" cellspacing="0" cellpadding="3" rules="rows">
		<tr>
			<th colspan="2" align="center" bgcolor="<?php echo $header_color;?>"><font color="white"><?php echo ucfirst($store);?> Community Monthly Activity Report</font></th>
		</tr>
		<tr>
			<td colspan="2" bgcolor="#000000" align="center" style="color: #FFFFFF; font-size: 12px; font-style: italic"><?php echo date('F Y');?></td>
		</tr>		
		<tr>
			<td width="33%" align="left">Registered Users:</td>
			<td width="66%"><?php echo $data->users;?></td>
		</tr>
		<tr bgcolor="#F8F8F8">
			<td align="left">Comments:</td>
			<td><?php echo $data->comments;?></td>
		</tr>
		<tr>
			<td align="left">Answers:</td>
			<td><?php echo $data->answers;?></td>
		</tr>
		<tr bgcolor="#F8F8F8">
			<td align="left">Questions:</td>
			<td><?php echo $data->questions;?></td>
		</tr>
		<tr>
			<td align="left">Tips &amp; Ideas:</td>
			<td><?php echo $data->posts;?></td>
		</tr>
		<tr bgcolor="#F8F8F8">
			<td align="left">Forum Threads:</td>
			<td><?php echo $data->threads;?></td>
		</tr>
		<tr>
			<td align="left">Forum Replies:</td>
			<td><?php echo $data->replies;?></td>
		</tr>
	</table>
</font>

</body>
</html>
