<?php echo error_success($this->session)?>
<?php if($error != '') echo error_message($error)?>
<div class="row-fluid">
	<div class="span12">
		<div class="head">
			<div class="isw-documents"></div>
			<h1>{page_title}</h1>
			<ul class="buttons">
				<li><a href="{site_url}admin/upms" class="isw-list" title="UPMS List"></a></li>                                                        
			</ul>
			<div class="clear"></div>
		</div>
		<div class="block-fluid">                        
			<?php echo form_open('admin/upms/save','id = "adminform"') ?>
								
			<div class="row-form">
				<div class="span2">Nama UPMS:</div>
				<div class="span10"><input type="text" name="namaupms" placeholder="Nama UPMS" value="{namaupms}"/></div>
				<div class="clear"></div>
			</div> 
            
            
            									
			
			<div class="row-form">
				<div class="span12"><button class="btn" type="submit" id="btnsimpan">Simpan</button></div>
				<div class="clear"></div>
			</div> 
			<?php echo form_hidden('id', $id); ?>
			<?php echo form_close() ?>
		</div>
	</div>
	
</div>
