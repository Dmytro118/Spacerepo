<?php 
if(!empty($result['list']))
{
	$i = $result['page']+1;
	foreach($result['list'] as $row)
	{
?>
<tr>
	<td><?php echo $i; ?></td>
	<td>
		<?php echo ucwords($row->organizationName); ?>
	</td>
	<td>
		<?php echo ucwords($row->firstName.' '.$row->lastName); ?>
	</td>
	<td><?php echo $row->businessPhoneCode.$row->businessPhone; ?></td>	
	<td>
		<?php 
		if($row->requestStatus==3)
		{
			echo 'Accept';
		}
		elseif($row->requestStatus==4)
		{
			echo 'Decline';
		}
		?>
	</td>
    <td><?php echo $row->lastModifiedDt; ?></td>
	<td>
		<a class="btn btn-warning btn-xs tooltips" title="View Detail" type="button" href="<?php echo base_url().$this->session->userdata('userType').'/retailer_management/request_history_user_detail/'.id_encrypt($row->organizationId); ?>">
			<i class="fa fa-eye"></i>
		</a>
	</td>
</tr>
<?php
		$i++;
	}
	if(!empty($result['links']))
	{
?>
<tr>
	<td colspan="10" align="right">
		<div class="pagination">
			<?php echo $result['links']; ?>
		</div>
	</td>
</tr>	
<?php
	}
}
else
{
?>
<tr>
	<td colspan="10" align="center">No Data Found</td>
</tr>	
<?php
}
?>