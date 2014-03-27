<script>
$(document).ready(function(){
	<?php if($judul=='Daftar Rute Angkot'){?>
	$("#search").hide();
	<?php }?>
    $('#searchbtn').on('click', function(event) {        
         $('#search').toggle('show');
    });
});
</script>
<div id="search">
<ul data-role="listview" data-divider-theme="e">
  <li data-role="list-divider" style="text-align: center;" data-icon="search">Cari Rute Angkot</li>
  </ul>
<br>
<form action='<?php echo $this->config->site_url();?>/find' method="get" data-ajax="false"> 
	<center><?php if (isset($error)){?>
	<hr>
		<a><h5 style="color: red; margin: 0 auto 0;"><?php echo $error; ?></h5></a>
		<hr>
<?php }?></center>
<div data-role="fieldcontain">
	<label for="dari">Dari:</label>
	<input type="search" name="dari" id="dari" value="<?php if(isset($dari)) echo $dari;?>"/>
	</div>
	<div data-role="fieldcontain">
	<label for="ke">Ke:</label>
	<input type="search" name="ke" id="ke" value="<?php if(isset($ke)) echo $ke;?>"/>
	</div>
	<div data-role="controlgroup">
	<input id="btncari" class="btncari" type="submit" name="submit" data-icon="search" data-iconpos="right" style="white-space: normal" value="Cari Rute" />
	<?php if($judul=='Hasil Pencarian Rute Angkot'){?>
	<a href="<?php echo $this->config->site_url();?>/daftarRute"
			data-role="button" data-icon="arrow-r" data-iconpos="right" style="white-space: normal" rel="external">Lihat Daftar
			Rute</a>
	<?php }?>
	</div>
</form>
<br>
</div>
<ul data-role="listview" data-divider-theme="e">
  <li data-role="list-divider" style="text-align: center;" data-icon="search" data-inline="true">
  <?php if ($judul=='Daftar Rute Angkot'){?>
<a id="searchbtn" data-role="button" data-icon="search" data-iconpos="notext" data-mini="true" data-inline="true" class="ui-btn-right"></a>
<?php }  
	echo $judul;
	if ($judul=='Daftar Rute Angkot'){?>
	<a id="searchbtn" data-role="button" data-icon="add" data-iconpos="notext" data-mini="true" data-inline="true" class="ui-btn-right"></a>
	<?php }
	?>
  </li>
  </ul>
<br>
<center>
<div data-inline="true" data-mini="true">
<?php 
foreach ($routes as $routes_table) { ?>
		<a href="<?php echo $this->config->site_url();?>/find#dialog" data-theme="b" data-rel="dialog" data-role="button" data-inline="true" data-mini="true" id="<?php echo json_encode($routes_table); ?>"
		onClick='run("<?php echo $routes_table['id_rute']; ?>", "<?php echo $routes_table['dari']; ?>","<?php echo $routes_table['ke']; ?>")'>
		Dari <?php echo $routes_table['dari'];?> ke <?php echo $routes_table['ke'];?>
		<hr>
		Rp <?php echo $routes_table['totalHarga'];?>
		</a>
<?php } ?>
</div>
</center>
<br>
<ul data-role="listview" data-divider-theme="e">
  <li data-role="list-divider" style="text-align: center;" data-icon="search"></li>
 </ul>
