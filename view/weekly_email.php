<?php 

$has_deltas = ($data->deltas !== null) ? true : false;
$header_color = (strtolower($store) == 'sears') ? '#0033CC' : '#FF0000';
$delta_neg = 'style="color: #990000"';
$delta_pos = 'style="color: #009900"';
?>
<html>
<head>
</head>

<body>

<font color="gray" size="10" face="Arial">

<table width="33%"  bgcolor="#F0F0F0" border="1" cellspacing="0" cellpadding="3" rules="rows">
<tr>
<th colspan="3" align="center" bgcolor="<?php echo $header_color;?>"><font color="white"><?php echo ucfirst($store);?> Community Weekly Activity Report</font></th>
</tr>
<tr>
<td colspan="3" bgcolor="#000000" align="center" style="color: #FFFFFF; font-size: 12px; font-style: italic"><?php echo date('m-d-Y', strtotime('-1 week'));?> to <?php echo date('m-d-Y');?></td>
</tr>
<tr>
<td width="33%" align="left">Registered Users:</td>
<td width="15%"><?php echo $data->users;?></td>
<td width="47%" <?php if($has_deltas && $data->deltas->users > 0): echo $delta_pos; elseif($has_deltas && $data->deltas->users < 0): echo $delta_neg; endif;?>>
	<?php echo ($data->deltas !== null) ? $data->deltas->users : 'NA';?> from last week</td>
</tr>
<tr bgcolor="#F8F8F8">
<td align="left">New Comments:</td>
<td><?php echo $data->comments;?></td>
<td <?php if($has_deltas && $data->deltas->comments > 0): echo $delta_pos; elseif($has_deltas && $data->deltas->comments < 0): echo $delta_neg; endif;?>>
	<?php echo ($data->deltas !== null) ? $data->deltas->comments : 'NA';?> from last week</td>
</tr>
<tr>
<td align="left">New Answers:</td>
<td><?php echo $data->answers;?></td>
<td <?php if($has_deltas && $data->deltas->answers > 0): echo $delta_pos; elseif($has_deltas && $data->deltas->answers < 0): echo $delta_neg; endif;?>>
	<?php echo ($data->deltas !== null) ? $data->deltas->answers : 'NA';?> from last week</td>
</tr>
<tr bgcolor="#F8F8F8">
<td align="left">New Questions:</td>
<td><?php echo $data->questions;?></td>
<td <?php if($has_deltas && $data->deltas->questions > 0): echo $delta_pos; elseif($has_deltas && $data->deltas->questions < 0): echo $delta_neg; endif;?>>
	<?php echo ($data->deltas !== null) ? $data->deltas->questions : 'NA';?> from last week</td>
</tr>
<tr>
<td align="left">New Tips &amp; Ideas:</td>
<td><?php echo $data->posts;?></td>
<td <?php if($has_deltas && $data->deltas->posts > 0): echo $delta_pos; elseif($has_deltas && $data->deltas->posts < 0): echo $delta_neg; endif;?>>
	<?php echo ($data->deltas !== null) ? $data->deltas->posts : 'NA';?> from last week</td>
</tr>
<tr bgcolor="#F8F8F8">
<td align="left">New Forum Threads:</td>
<td><?php echo $data->threads;?></td>
<td <?php if($has_deltas && $data->deltas->threads > 0): echo $delta_pos; elseif($has_deltas && $data->deltas->threads < 0): echo $delta_neg; endif;?>>
	<?php echo ($data->deltas !== null) ? $data->deltas->threads : 'NA';?> from last week</td>
</tr>
<tr>
<td align="left">New Forum Replies:</td>
<td><?php echo $data->replies;?></td>
<td <?php if($has_deltas && $data->deltas->replies > 0): echo $delta_pos; elseif($has_deltas && $data->deltas->replies < 0): echo $delta_neg; endif;?>>
	<?php echo ($data->deltas !== null) ? $data->deltas->replies : 'NA';?> from last week</td>
</tr>
</table>
</font>

</body>
</html>
