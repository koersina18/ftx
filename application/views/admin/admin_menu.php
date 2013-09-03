<ul class="navigation">            
	<li <?= ($this->uri->segment(2) == 'home')? 'class="active"':""?>>
		<a href="{site_url}admin/home">
			<span class="isw-cloud"></span><span class="text">Home</span>
		</a>
	</li>   
	<li class="openable <?= (in_array($this->uri->segment(2),array('upms','provinsi','area','region','kota','kelas','spbu','tahapan_audit','user')))? "active":""?>">
		<a href="#"><span class="isw-bookmark"></span><span class="text">Manufacture</span></a>
		<ul>
			<li><a href="{site_url}admin/upms"><span class="icon-leaf"></span><span class="text">UPms</span></a></li>
			<li><a href="{site_url}admin/upms"><span class="icon-road"></span><span class="text">Bahan Baku</span></a></li>
			<li><a href="{site_url}admin/upms"><span class="icon-inbox"></span><span class="text">Article</span></a></li>
			<li><a href="{site_url}admin/upms"><span class="icon-flag"></span><span class="text">Jenis Article</span></a></li>
			
			
		</ul>
	</li>	
	<li class="openable <?= (in_array($this->uri->segment(2),array('elemen','subelemen','point','item')))? "active":""?>">
		<a href="#"><span class="isw-bookmark"></span><span class="text">HRD</span></a>
		<ul>
			<li><a href="#"><span class="icon-leaf"></span><span class="text">Data Karyawan</span></a></li>
			<li><a href="{site_url}admin/subelupmsemen"><span class="icon-leaf"></span><span class="text">Jabatan</span></a></li>
			<li><a href="{site_url}admin/upms"><span class="icon-leaf"></span><span class="text">Departement</span></a></li>
			<li><a href="{site_url}admin/upms"><span class="icon-leaf"></span><span class="text">Absensi</span></a></li>
		</ul>
	</li>	    
	<li <?= ($this->uri->segment(2) == 'home' || $this->uri->segment(2) == 'galleryvideo')? "active":""?>">
		<a href="{site_url}admin/home">
        <span class="isw-picture"></span><span class="text">Accounting</span>
        </a>		
	</li>
    
	<li <?= ($this->uri->segment(2) == 'home')? 'class="active"':""?>>
        <a href="{site_url}admin/home">
            <span class="isw-calendar"></span><span class="text">Laporan</span>
        </a>
    </li>
</ul>
	