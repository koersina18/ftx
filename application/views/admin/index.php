<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

    <title>SPBU Audit Checklist TUV Rheinland</title>
    
    <link href="{css_path}stylesheets.css" rel="stylesheet" type="text/css" />
    <link rel='stylesheet' type='text/css' href='{css_path}fullcalendar.print.css' media='print' />
    
    <script type='text/javascript' src='{js_path}jquery.min.js'></script>
    <script type='text/javascript' src='{js_path}jquery-ui.min.js'></script>
    <script type='text/javascript' src='{js_path}pluginsadmin/jquery/jquery.mousewheel.min.js'></script>
    
    <script type='text/javascript' src='{js_path}pluginsadmin/cookie/jquery.cookies.2.2.0.min.js'></script>
    
    <script type='text/javascript' src='{js_path}pluginsadmin/bootstrap.min.js'></script>
    
    <script type='text/javascript' src='{js_path}pluginsadmin/charts/excanvas.min.js'></script>
    <script type='text/javascript' src='{js_path}pluginsadmin/charts/jquery.flot.js'></script>    
    <script type='text/javascript' src='{js_path}pluginsadmin/charts/jquery.flot.stack.js'></script>    
    <script type='text/javascript' src='{js_path}pluginsadmin/charts/jquery.flot.pie.js'></script>
    <script type='text/javascript' src='{js_path}pluginsadmin/charts/jquery.flot.resize.js'></script>
    
    <script type='text/javascript' src='{js_path}pluginsadmin/sparklines/jquery.sparkline.min.js'></script>
    
    <script type='text/javascript' src='{js_path}pluginsadmin/fullcalendar/fullcalendar.min.js'></script>
    
    <script type='text/javascript' src='{js_path}pluginsadmin/select2/select2.min.js'></script>
    
    <script type='text/javascript' src='{js_path}pluginsadmin/uniform/uniform.js'></script>
    
    <script type='text/javascript' src='{js_path}pluginsadmin/maskedinput/jquery.maskedinput-1.3.min.js'></script>
    
    <script type='text/javascript' src='{js_path}pluginsadmin/validation/languages/jquery.validationEngine-en.js' charset='utf-8'></script>
    <script type='text/javascript' src='{js_path}pluginsadmin/validation/jquery.validationEngine.js' charset='utf-8'></script>
    
    <script type='text/javascript' src='{js_path}pluginsadmin/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>
        
    <script type='text/javascript' src='{js_path}pluginsadmin/qtip/jquery.qtip-1.0.0-rc3.min.js'></script>
    
    
    
    <script type='text/javascript' src='{js_path}pluginsadmin/dataTables/jquery.dataTables.min.js'></script>    
    
    <script type='text/javascript' src='{js_path}pluginsadmin/fancybox/jquery.fancybox.pack.js'></script>
    
    <script type='text/javascript' src='{js_path}cookies.js'></script>
    <script type='text/javascript' src='{js_path}actions.js'></script>
    <script type='text/javascript' src='{js_path}charts.js'></script>
    <script type='text/javascript' src='{js_path}plugins.js'></script>
	<?php if($template=='home'){?>
    <script type='text/javascript'>
	$(document).ready(function(){
		/* CALENDAR */
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

		var calendar = $('#calendar').fullCalendar({
				columnFormat:{month: 'dddd'},
				header: {		
						left: 'prev,next',
						center: 'title',
						right: ''
						//right: 'month,agendaWeek,agendaDay'
				},
				selectable: false,
				selectHelper: true,
				select: function(start, end, allDay) {
						var title = prompt('Nama Event:');
						if (title) {
								calendar.fullCalendar('renderEvent',
										{
												title: title,
												start: start,
												end: end,
												allDay: allDay
										},
										true // make the event "stick"
								);
						}
						calendar.fullCalendar('unselect');
				},
				editable: true,
				events: [
						{event_dashboard}
						{
							title: '{evnamaevent}',
							start: new Date('{evtanggal}'),
							end: new Date('{evsampai}'),
							url: '{site_url}admin/event/update/{evid}'
						},
						{/event_dashboard}
				],
				dayNames:["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"],
				dayNamesShort:["Min","Sen","Sel","Rab","Kam","Jum","Sab"],
				monthNames:["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember"],
				monthNamesShort:["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nop","Des"],
				
				//columnFormat:[{',week: "dd M/d",day: 'dddd M/d'}]
		
				
		});
    });
	</script>
    <?php } ?>
</head>
<body>
    
    <div class="header">
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    
    <div class="menu">                
        
        <div class="breadLine">            
            <div class="arrow"></div>
            <div class="adminControl active">
                Hi, {usrname}
            </div>
        </div>
        
        <div class="admin">
            <div class="image">
                <img src="{avatar_tpath}{usravatar}" class="img-polaroid"/>                
            </div>
            <ul class="control">                
                <li><span class="icon-share-alt"></span><a href="{site_url}admin/user/logout">Logout</a></li>
                <li><span class="icon-share-alt"></span><a href="{site_url}admin/user/myaccount">My Account</a></li>
            </ul>
            <div class="info">
                <span>Welcome!<br/> Last Login: {usrlast_login}</span><br/>
                <span>Logged in as {usrrole}</span>
            </div>
        </div>
        <!--#include virtual="menu.html" -->
        <?php $this->load->view('admin/admin_menu') ?>

    </div>
        
    <div class="content">       
        <div class="breadLine">
            
            <ul class="breadcrumb">
               <?php echo admin_breadcrum($breadcrum)?>
            </ul>
            <!--            
            <ul class="buttons">                    
                <li>
                    <a href="#" class="link_bcPopupSearch"><span class="icon-search"></span><span class="text">Cari</span></a>
                    
                    <div id="bcPopupSearch" class="popup">
                        <div class="head">
                            <div class="arrow"></div>
                            <span class="isw-zoom"></span>
                            <span class="name">Pencarian</span>
                            <div class="clear"></div>
                        </div>
                        <div class="body search">
                            <input type="text" placeholder="Masukan Kata Kunci Pencarian..." name="search"/>
                        </div>
                        <div class="footer">
                            <button class="btn" type="button">Cari</button>
                            <button class="btn btn-danger link_bcPopupSearch" type="button">Tutup</button>
                        </div>
                    </div>                
                </li>
            </ul>
            -->
        </div>
        
        <div class="workplace">
		 <?php $this->load->view('admin/'.$template) ?> 
			<?php //echo $template; ?>
        </div>
        
    </div>   
    
</body>
</html>
