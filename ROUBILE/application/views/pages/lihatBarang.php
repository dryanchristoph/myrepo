<h2>Data Barang Kategori <?php echo $jenis;?></h2>
<br>
<table data-role="table" class="ui-responsive">
	<thead>
		<td>
			<th>Nama Barang</th>
			<th>Harga Barang</th>
		</td>
	</thead>
	<tbody>	
		<?php
			foreach($barang as $brg){
?>
		<td>
			<tr> <?php echo $brg['nama_barang'];?></tr>
			<tr> <?php echo $brg['harga_barang'];?></tr>
		</td>
<?php 
}
		?>
	</tbody>
</table>

