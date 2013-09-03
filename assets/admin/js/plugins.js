$(document).ready(function(){
    
    
    /* LEFT SIDE DATEPICKER */
    $("#menuDatepicker").datepicker();
    /* UI elements datepicker */        
    $("#Datepicker").datepicker();
        
    
    

    // SELECT2       
        $("#s2_1").select2();
        $("#s2_2").select2();
        
    // CHECKBOXES AND RADIO
        $(".row-form,.dialog,.loginBox,.block-fluid").find("input:checkbox, input:radio, input:file").not(".skip").uniform();
    
    
    // MASKED INPUTS
        
        $("#mask_phone").mask('99 (999) 999-99-99');
        $("#mask_credit").mask('9999-9999-9999-9999');
        $("#mask_date").mask('99/99/9999');
        $("#mask_tin").mask('99-9999999');
        $("#mask_ssn").mask('999-99-9999');
        
    //FORM VALIDATION

        $("#adminform").validationEngine({promptPosition : "topLeft", scroll: true});        
        
    // CUSTOM SCROLLING
    
        $(".scroll").mCustomScrollbar();
    
    // ACCORDION 
    
        $(".accordion").accordion();
        
    // TABS
    
        $( ".tabs" ).tabs();

   // TOOLTIPSborder:{

        $('.tt').qtip({ style: {name: 'aquarius' },
                        position: {
                            corner: {
                                target: 'topRight',
                                tooltip: 'bottomLeft'
                            }
                        } 
                    });
        
        $('.ttRC').qtip({ style: { name: 'aquarius' },
                        position: {
                            corner: {
                                target: 'rightMiddle',
                                tooltip: 'leftMiddle'
                            }
                        } 
                    });        

        $('.ttRB').qtip({ style: { name: 'aquarius' },
                        position: {
                            corner: {
                                target: 'bottomRight',
                                tooltip: 'topLeft'
                            }
                        } 
                    });
                    
        $('.ttLT').qtip({ style: { name: 'aquarius' },
                        position: {
                            corner: {
                                target: 'topLeft',
                                tooltip: 'bottomRight'
                            }
                        } 
                    });
        
        $('.ttLC').qtip({ style: { name: 'aquarius' },
                        position: {
                            corner: {
                                target: 'leftMiddle',
                                tooltip: 'rightMiddle'
                            }
                        } 
                    });        

        $('.ttLB').qtip({ style: { name: 'aquarius' },
                        position: {
                            corner: {
                                target: 'bottomLeft',
                                tooltip: 'topRight'
                            }
                        } 
                    });
                    
                    
        // SORTABLE       
            $("#sort_1").sortable({placeholder: "placeholder"});
            $("#sort_1").disableSelection();    
            
        // SELECTABLE
            $("#selectable_1").selectable();
            
            
        // WYSIWIG HTML EDITOR
            if($("#wysiwyg").length > 0){
                editor = $("#wysiwyg").cleditor({width:"100%", height:"100%"})[0].focus();                
            }                                          
            
         // Sortable table
         if($("#tSortable_2").length > 0)
         {
            $("#tSortable").dataTable({"iDisplayLength": 5, "aLengthMenu": [5,10,25,50,100], "sPaginationType": "full_numbers", "aoColumns": [ { "bSortable": false }, null, null, null, null]});
            $("#tSortable_2").dataTable({"iDisplayLength": 10, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": false }, null, null, null, null, null, null]});
         }
		 
		 if($("#tSortable_3").length > 0)
         {
            $("#tSortable_3").dataTable({"iDisplayLength": 10, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": false }, null, null, null, null, null, null, null]});
         }
		 
		 if($("#tSortable_4").length > 0)
         {
            $("#tSortable_4").dataTable({"iDisplayLength": 10, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": false }, null, null, null, null, null, null, null]});
         }
		 
		 if($("#tSortable_5").length > 0)
         {
            $("#tSortable_5").dataTable({"iDisplayLength": 10, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": false }, null, null, null, null]});
         }
         
         
         // File uploader
         if($("#uploader_v5").length > 0){
            $("#uploader_v5").pluploadQueue({		
                    runtimes : 'html5',
                    url : 'upload/upload.php',
                    max_file_size : '1mb',
                    chunk_size : '1mb',
                    unique_names : true,
                    dragdrop : true,

                    resize : {width : 320, height : 240, quality : 100},

                    filters : [
                            {title : "Image files", extensions : "jpg,gif,png"},
                            {title : "Zip files", extensions : "zip"}
                    ]
            });
         }
         if($("#uploader_v4").length > 0){
            $("#uploader_v4").pluploadQueue({		
                    runtimes : 'html4',
                    url : 'upload/upload.php',
                    unique_names : true,
                    filters : [
                            {title : "Image files", extensions : "jpg,gif,png"},
                            {title : "Zip files", extensions : "zip"}
                    ]
            });
         }
         
         
         
});

$(window).resize(function() {

    if($("#wysiwyg").length > 0) editor.refresh();

    
});
