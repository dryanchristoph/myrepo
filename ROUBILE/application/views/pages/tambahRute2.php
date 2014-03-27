<script src="<?php echo js_url('tambahRute.js');?>"></script>
<script>
    var assetLink = <?php echo json_encode($this->config->base_url().'assets/'); ?>;
</script>
<div id="map_canvas" style=" width: 100%; height: 400px;"></div>