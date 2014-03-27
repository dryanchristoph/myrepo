<?php
class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('routes_model');
		$this->load->helper('form');
		$this->load->helper('assets');
		$this->load->library('form_validation');		
	}
	
	public function view($page = 'home', $data = null)
	{
		if ( ! file_exists('application/views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
// 		$this->load->view('pages/test');
		$this->load->view('templates/links');
		$this->load->view('templates/header');
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer');
		if($page=='daftarRute')
		$this->load->view('dialogs/daftarRute');
	}
	
	public function testing () {
		echo 'hao';
		$load->view('welcome_message');
	}
	
	public function find()
	{
		$dari = $this->input->get('dari');
		$ke = $this->input->get('ke');
		$data = null;
		$page = 'home';
		if($dari==null) $dari=''; if($ke==null) $ke='';
		if($dari!='' || $ke!=''){
		if($this->routes_model->check_routes($dari, $ke)==FALSE){
			if ($dari!=null || $ke!=null){
			$data['error'] = 'Data Tidak Tersedia';
			$data['dari'] = $dari;
			$data['ke'] = $ke;
 			}
		}
		else{			
			$data['routes'] = $this->routes_model->check_routes($dari, $ke);
			$data['judul'] = 'Hasil Pencarian Rute Angkot';
			$data['dari'] = $dari;
			$data['ke'] = $ke;
			$page = 'daftarRute';
		}
		}
		$this->view($page,$data);	
	}
	
	public function daftarRute(){
		$data['routes'] = $this->routes_model->get_routes();
		$data['judul'] = 'Daftar Rute Angkot';
		$page = 'daftarRute';
		$this->view($page,$data);
	}
	
	public function tambahRute(){
		/* $data['routesdari'] = $this->routes_model->get_routes_dist('dari');
		$data['routeske'] = $this->routes_model->get_routes_dist('ke'); */
		$page = 'tambahRute';
		$this->view($page);
	}
	
	public function lihatRute(){
		$id = $this->input->get('id');
		$data['main'] = $this->routes_model->get_main($id);
		$data['routes'] = $this->routes_model->get_details($id);
		$data['waypts'] = $this->routes_model->get_waypoints($id);
		$page = 'lihatRute';
		$this->view($page,$data);
	}
public function save_route(){
		$datax = $this->input->post('rleg');
		$datax2 = $this->input->post('awal');
		$action = $this->input->post('action');
		$id = $this->input->post('id');
		$data=json_decode($datax);
		$data2=json_decode($datax2);
		if($action=='update'){
			$this->routes_model->update_route($data,$data2,$id);
		} else
		$this->routes_model->save_route($data,$data2);
		/* foreach($data as $rleg){
					echo $rleg->start_location->mb.'<br>';
		} */
	//echo $data["start"]->lokasi;
	}
	
	public function edit_route(){
		$id = $this->input->get('id');
		$data['main'] = $this->routes_model->get_main($id);
		$data['routes'] = $this->routes_model->get_details($id);
		$data['waypts'] = $this->routes_model->get_waypoints($id);
		$page = 'editRute';
		$this->view($page,$data);
		
	}
	
	public function hapus_route(){
		$id = $this->input->get('id');
		$this->routes_model->hapus_route($id);
		$this->view('daftarRute');
	}
}
