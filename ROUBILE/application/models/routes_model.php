<?php
class routes_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}


public function check_routes($dari=null, $ke=null)
{
	$this->db->like('dari', $dari);
	$this->db->like('ke', $ke);
	$query = $this->db->get("daftarrute");
	//$query = $this->db->get_where('daftarrute', array('dari' => $dari, 'ke'=>$ke));
	if($query->num_rows()>0){
		return $query->result_array();
	}
	return FALSE;
}

public function get_routes($record=null){
	
   	$query = $this->db->get("daftarrute");
   	if($query->num_rows()>0){
   	return $query->result_array();
   }
   return FALSE;
}

public function get_routes_dist($record=null){
	$this->db->distinct();
	$query = $this->db->select("dari, *");
	$query = $this->db->get('daftarrute');
	if($query->num_rows()>0){
		return $query->result_array();
	}
	return FALSE;
}

public function get_routes_map(){
	$query = $this->db->get("detailrute");
	if($query->num_rows()>0){
		return $query->result_array();
	}
	return FALSE;
}

public function set_news()
{
	$this->load->helper('url');

	$slug = url_title($this->input->post('title'), 'dash', TRUE);

	$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'text' => $this->input->post('text')
	);

	return $this->db->insert('news', $data);
}

public function save_route($data,$data2){
	$i = 0;	
	$id='';
	while(true){
		$i++;
		for($k=strlen((string)$i);$k<4;$k++){
			$id.='0';
		}
		$id.=(string)$i;
		$query = $this->db->get_where('daftarrute',array('id_rute'=>'ROUTE_'.$id));
		if($query->num_rows()<=0){
			break;
		} else $id='';
	}
	$ketStart = $data2->keterangan;
	$lokStart = $data2->lokasi;
	$dataRute = array(
			'id_rute' => 'ROUTE_'.$id,
			'dari' => $lokStart,
			'ke' => $data[count($data)-1]->lokasi
	);
	$this->db->insert('daftarrute', $dataRute);
	$j=0;
	$dataDetailRute = array(
			'id_rute' => 'ROUTE_'.$id,
			'nomorRute' => $j,
			'latitude' => $data[$j]->start_location->mb,
			'longitude' => $data[$j]->start_location->nb,
			'keterangan' => $ketStart,
			'harga' => ''
	);
	$this->db->insert('detailrute', $dataDetailRute);
	$hargaAngkot = 0;
	foreach($data as $rleg){
		$j++;
		$dataDetailRute = array(
			'id_rute' => 'ROUTE_'.$id,
			'nomorRute' => $j,
			'latitude' => $rleg->end_location->mb,
			'longitude' => $rleg->end_location->nb,
			'keterangan' => $rleg->keterangan,
			'harga' => $rleg->harga
		);
		$hargaAngkot+=floatval($rleg->harga);
		$this->db->insert('detailrute', $dataDetailRute);
		foreach($rleg->via_waypoint as $waypts){			
			$dataWaypts = array(
				'id_rute' =>'ROUTE_'.$id,
				'leg' => $j-1,
				'latitude' => $waypts->location->mb,
				'longitude' => $waypts->location->nb
			);
			$this->db->insert('waypoints', $dataWaypts);
		}		
	}
	$this->db->where('id_rute', 'ROUTE_'.$id);
	$this->db->update('daftarrute', array('totalHarga' => $hargaAngkot));
}

public function update_route($data,$data2,$idRute){
	$i = 0;
	$id='';
	$ketStart = $data2->keterangan;
	$lokStart = $data2->lokasi;
	$dataRute = array(
			'dari' => $lokStart,
			'ke' => $data[count($data)-1]->lokasi
	);
	$this->db->where('id_rute', $idRute);
	$this->db->update('daftarrute', $dataRute);
	$j=0;
	$dataDetailRute = array(
			
			'latitude' => $data[$j]->start_location->mb,
			'longitude' => $data[$j]->start_location->nb,
			'keterangan' => $ketStart,
			'harga' => ''
	);
	$this->db->where(array('id_rute'=> $idRute, 'nomorRute' => $j));
	$this->db->update('detailrute', $dataDetailRute);
	$hargaAngkot = 0;
	foreach($data as $rleg){
		$j++;
		$dataDetailRute = array(
				'latitude' => $rleg->end_location->mb,
				'longitude' => $rleg->end_location->nb,
				'keterangan' => $rleg->keterangan,
				'harga' => $rleg->harga
		);
		$hargaAngkot+=floatval($rleg->harga);
		$this->db->where(array('id_rute'=> $idRute, 'nomorRute' => $j));
		$this->db->update('detailrute', $dataDetailRute);
		foreach($rleg->via_waypoint as $waypts){
			$dataWaypts = array(
					'id_rute' =>'ROUTE_'.$id,
					'leg' => $j-1,
					'latitude' => $waypts->location->mb,
					'longitude' => $waypts->location->nb
			);
			$this->db->where('id_rute', $idRute);
			$this->db->update('waypoints', $dataWaypts);
		}

	}
	$this->db->where('id_rute', $idRute);
	$this->db->update('daftarrute', array('totalHarga' => $hargaAngkot));
}

public function get_main($id){
	$query = $this->db->get_where('daftarrute',array('id_rute'=>$id));
	if($query->num_rows()>0){
		return $query->result_array();
	}
}

public function get_details($id){
	$query = $this->db->get_where('detailrute',array('id_rute'=>$id));
	if($query->num_rows()>0){
		return $query->result_array();
	}
}

public function get_waypoints($id){
	$query = $this->db->get_where('waypoints',array('id_rute'=>$id));
	if($query->num_rows()>0){
		return $query->result_array();
	}
}

public function hapus_route($id){
	$this->db->where('id_rute', $id);
	$this->db->delete('waypoints');
	$this->db->where('id_rute', $id);
	$this->db->delete('detailrute');
	$this->db->where('id_rute', $id);
	$this->db->delete('daftarrute');
}

}