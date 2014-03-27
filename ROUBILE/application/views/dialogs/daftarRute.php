
<div id="dialog" data-role="page" data-external-page="true" style="vertical-align: middle;">
	<div data-role="header">
		<h1>ROUBILE</h1>
		<h4 class="dataHeader" style="margin: 0 auto 0;">Route Angkot for
			Mobile</h4>
	</div>
	<div data-role="content">
		<center>
			<hr>
			Rute dari <a id="ddari"></a> ke <a id="dke"></a>
			<hr>
			<div data-inline="true">
				<a href="<?php echo $this->config->site_url();?>/lihatRute"
					data-role="button" data-icon="search" data-inline="true" id="lihat" rel="external">Lihat Rute</a>
				<a href="<?php echo $this->config->site_url();?>/edit_route" data-role="button" data-icon="check" data-inline="true" id="edit" rel="external">Edit
					Rute</a>
			</div>
			<div data-inline="true">
				<a href="#hapusRute"  data-rel="popup" data-position-to="window" data-transition="pop" data-role="button" data-icon="delete" data-inline="true">Hapus
					Rute</a> <a href="<?php echo $this->config->site_url();?>/daftarRute" data-role="button" data-icon="back"
					data-inline="true">Cancel</a>
			</div>
		</center>
	</div>
	<div data-role="footer">
		<h1>Developed by Tel-U Team</h1>
	</div>
	<div data-role="popup" id="hapusRute" data-theme="a" class="ui-corner-all">
		<h3>Hapus Rute?</h3>
	<p>Apakah anda yakin akan menghapus rute ini?</p>
	<a href="<?php echo $this->config->site_url(); ?>/hapus_route" id="hapus" data-ajax="false" data-role="button" data-theme="b" data-icon="check" data-inline="true" data-mini="true">Hapus</a>
	<a href="#" data-role="button" data-rel="back" data-inline="true" data-mini="true">Batal</a>
	</div>
</div>
</body>
</html>
