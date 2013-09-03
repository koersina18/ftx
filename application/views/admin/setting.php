<?php echo error_success($this->session)?>
<?php echo ($error !='')? error_message($this->session) : ''?>
<div class="row-fluid">
	<div class="span12">
		<div class="head">
			<div class="isw-documents"></div>
			<h1>{page_title}</h1>
			<div class="clear"></div>
		</div>
		<div class="block-fluid">                        
			<?php echo form_open_multipart('admin/setting/save','id = "adminform"') ?>
								
			<div class="row-form">
				<div class="span2">Contact Email:</div>
				<div class="span10"><input type="text" name="contact_email" placeholder="Contact Email" value="{contact_email}"/></div>
				<div class="clear"></div>
			</div> 
			<div class="row-form">
				<div class="span2">Content:</div>
				<div class="span10">                                                                
					<?php 
						$opt = array('id' 		=> 'address',
									 'name' 	=> 'address',
									 'value' 	=> $address,
									 'placeholder' 	=> 'Address',
									 'style' 	=> 'width:100%;height:300px;',
									 );
						
						echo form_textarea($opt) 
					?>
				</div>
				<div class="clear"></div>
			</div> 
			<div class="row-form">
				<div class="span2">Website Title:</div>
				<div class="span10"><input type="text" name="website_title" placeholder="Website Title" value="{website_title}"/></div>
				<div class="clear"></div>
			</div>
			<div class="row-form">
				<div class="span2">Meta Key:</div>
				<div class="span10"><input type="text" name="meta_key" placeholder="Meta Key" value="{meta_key}"/></div>
				<div class="clear"></div>
			</div>
			<div class="row-form">
				<div class="span2">Meta Description:</div>
				<div class="span10"><input type="text" name="meta_desc" placeholder="Meta Description" value="{meta_desc}"/></div>
				<div class="clear"></div>
			</div>
			<div class="row-form">
				<div class="span2">Facebook Fanpage:</div>
				<div class="span10"><input type="text" name="facebook_page" placeholder="Facebook Fan Page URL" value="{facebook_page}"/></div>
				<div class="clear"></div>
			</div>
			<div class="row-form">
				<div class="span2">Facebook Access Token:</div>
				<div class="span10"><input type="text" name="fb_token" placeholder="Facebook Access Token" value="{fb_token}"/></div>
				<div class="clear"></div>
			</div>
			<div class="row-form">
				<div class="span2">Twitter Account:</div>
				<div class="span10"><input type="text" name="twitter_account" placeholder="Twitter Account" value="{twitter_account}"/></div>
				<div class="clear"></div>
			</div>		
			<div class="row-form">
				<div class="span12"><button class="btn" type="submit" id="btnsimpan">Simpan</button></div>
				<div class="clear"></div>
			</div> 
			<?php echo form_close() ?>
		</div>
	</div>
	
</div>
<!-- WYSISYG -->

<script type="text/javascript" src="{tinymce_path}tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "imagemanager,filemanager,safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,|,insertfile,insertimage",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		//content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		//template_external_list_url : "lists/template_list.js",
		//external_link_list_url : "lists/link_list.js",
		//external_image_list_url : "lists/image_list.js",
		//media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Arvano",
			staffid : "123"
		}
	});
</script>

<!-- WYSISYG END -->