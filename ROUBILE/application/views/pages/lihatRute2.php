<script>
    var assetLink = <?php echo json_encode($this->config->base_url().'assets/'); ?>;
</script>
<script src="<?php echo js_url('lihatRute.js');?>"></script>
<div align="center" style="z-index:5; width:100%">
      		<input id="target" type="text" placeholder="Cari Alamat" width="100%">
      </div>
<div id="panel" style="position: relative;">
		<div id="map_canvas" style=" width: 100%; height: 400px;"></div>
	</div>