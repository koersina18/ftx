<?php

function tool_edit($link) {
	$tool = anchor($link,'<span class="ibb-edit"></span>',array('title'=>'Edit'));
	return $tool;
}

function tool_remove($link) {
	$tool =  anchor($link, '<span class="ibb-delete"></span>',array('title' => 'Remove','onClick' => 'return confirm(\'Delete ?\')'));
	return $tool;
}
function tool_active($link) {
	$tool =  anchor($link, '<span class="ibb-ok"></span>',array('title' => 'Active','onClick' => 'return confirm(\'Active ?\')'));
	return $tool;
}
function tool_publish($link) {
	$tool =  anchor($link, '<span class="ibb-up"></span>',array('title' => 'Publish','onClick' => 'return confirm(\'Publish ?\')'));
	return $tool;
}

function tool_unpublish($link) {
	$tool =  anchor($link, '<span class="ibb-down"></span>',array('title' => 'Unpublish','onClick' => 'return confirm(\'Unpublish ?\')'));
	return $tool;
}
function tool_unactive($link) {
	$tool =  anchor($link, '<span class="ibb-cancel"></span>',array('title' => 'Unactive','onClick' => 'return confirm(\'Unactive ?\')'));
	return $tool;
}

function tool_download($link) {
	$tool =  anchor($link, '<span class="ibb-download"></span>', array('title' => 'Download File','target="_blank"'));
	return $tool;
}
?>