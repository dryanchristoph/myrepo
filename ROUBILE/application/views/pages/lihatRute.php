<script type="text/javascript">
    var assetLink = <?php echo json_encode($this->config->base_url().'assets/'); ?>;
    
    var main = <?php echo json_encode($main); ?>;
    
    var routes = <?php echo json_encode($routes); ?>;
    
    var waypts = <?php echo json_encode($waypts); ?>;
    
    var idRute = <?php echo json_encode($_GET['id']); ?>;
</script>
<style type="text/css">
	label {
	font-weight:bold;
	}
</style>
<script src="<?php echo js_url('lihatRute.js');?>"></script>
<div align="center" style="z-index:5; width:100%">
      		<input id="target" type="text" placeholder="Cari Alamat" width="100%">
      </div>
      
<div id="panel" style="position: relative;">
		
      <div align="center" id="toolbar" style="position:absolute; z-index:5; width:auto; margin:530px 5%; ">
			<div data-role="fieldcontain">
      		<fieldset data-role="controlgroup" data-type="horizontal">
      			<input type="button" name="radio_toolbar" id="simpan" data-icon="check" title="simpan" value="Simpan">
      		</fieldset>      		
      		</div>
      	</div>
		<div id="map_canvas" style=" width: 100%; height: 600px;"></div>
	</div>
	<div id='ajax'>
	
	</div>

	<div data-role="popup" id="noDelete" data-theme="a" class="ui-corner-all">
	<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-left">Close</a>
		<p>Anda tidak dapat menghapus posisi awal dan akhir.</p>
	</div>