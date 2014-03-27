<ul data-role="listview" data-split-icon="star" data-divider-theme="e"	data-count-theme="a">
	<li data-role="list-divider"></li>
</ul>
<br>
<center>
	<img
		src="<?php echo $this->config->base_url();?>assets/images/logoRoubile.png"
		style="width: 100%; max-width: 500px;" />
</center>

<br>
<ul data-role="listview" data-divider-theme="e">
	<li data-role="list-divider" style="text-align: center;"
		data-icon="search">Cari Rute Angkot</li>
</ul>
<br>
<form action='<?php echo $this->config->site_url();?>/find' method="get"
	data-ajax="false">
	<div id="error">
		<center><?php if (isset($error)){?>
	<hr>
			<a><h5 style="color: red; margin: 0 auto 0;"><?php echo $error; ?></h5></a>
			<hr>
<?php }?></center>
	</div>
	<div data-role="fieldcontain">
		<label for="dari">Dari:</label> <input type="search" name="dari"
			id="dari" value="<?php if(isset($dari)) echo $dari;?>" />
	</div>
	<div data-role="fieldcontain">
		<label for="ke">Ke:</label> <input type="search" name="ke" id="ke"
			value="<?php if(isset($ke)) echo $ke;?>" />
	</div>
	<input id="btncari" class="btncari" type="submit" name="submit"
		data-icon="search" data-iconpos="right" value="Cari Rute" />
</form>
<br>
<ul data-role="listview" data-split-icon="star" data-divider-theme="e"	data-count-theme="a">
	<li data-role="list-divider"></li>
</ul>
<br>
<div data-role="controlgroup">
	<a href="<?php echo $this->config->site_url();?>/daftarRute"
		data-role="button" data-icon="arrow-r" data-iconpos="right"
		style="white-space: normal" rel="external">Lihat Daftar Rute</a> <a
		href="<?php echo $this->config->site_url();?>/tambahRute" data-role="button" data-icon="plus" data-iconpos="right" rel="external">Tambahkan
		Rute</a>
</div>