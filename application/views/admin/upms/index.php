<?php echo error_success($this->session)?>
<div class="row-fluid">
	<div class="span12">                    
		<div class="head">
			<div class="isw-grid"></div>
			<h1>UPMS</h1>      
			<ul class="buttons">
				<li>
					<a href="#" class="isw-settings"></a>
					<ul class="dd-list">
						<li><a href="{site_url}admin/upms/add"><span class="isw-plus"></span> Add UPMS</a></li>
					</ul>
				</li>
			</ul>                        
			<div class="clear"></div>
		</div>
		<div class="block-fluid table-sorting">
			<div class="dataTables_wrapper">
			<table cellpadding="0" cellspacing="0" width="100%" class="table">
				<thead>
					<tr>                                    
						<th width="5%">No.</th>
						<th width="80%">Nama UPMS</th>
						
                        <th width="15%">Action</th>                                                 
					</tr>
				</thead>
				<tbody>
					<?php $no = $this->uri->segment(4) ?>
					<?php foreach($query as $row){ ?>
					<?php $no = $no + 1 ?>
					<tr>                                    
						<td><?= $no?></td>
						<td><?php echo anchor('admin/upms/update/'.$row->id,$row->namaupms) ?></td>						
						
						<td>
							<?php 
								echo tool_edit('admin/upms/update/'.$row->id);
								echo tool_remove('admin/upms/delete/'.$row->id);								
							?>
						</td>                                    
					</tr>                                
					<?php } ?>
				</tbody>
			</table>
			<?php echo $pagination ?>
			
		</div>
		<div class="clear"></div>
	</div>                                
</div>