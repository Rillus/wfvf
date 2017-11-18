<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Locations extends CI_Controller {
	public function __construct() {
        parent::__construct();

        $this->load->database();

        header("Access-Control-Allow-Origin: *");
        header('Content-type: application/json');
        header('Access-Control-Allow-Methods: GET, POST, PUT, OPTIONS');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, X_FILENAME");
	}

	public function index() {
		$location = $this->db->where('lat !=', '')
							 ->where('lon !=', '')
							 ->get('locations');

		if ($location->num_rows() > 0) {
			echo json_encode($location->result());
		}
	}

	public function no_latlon() {
		$location = $this->db->where('address !=', '')
							 ->where('lat', '')
							 ->where('lon', '')
							 ->get('locations');

		if ($location->num_rows() > 0) {
			echo json_encode($location->result());
		}
	}

	public function no_address() {
		$location = $this->db->where('address', '')
							 ->get('locations');

		// echo $location->num_rows();

		if ($location->num_rows() > 0) {
			echo json_encode($location->result());
		}
	}

	public function no_category() {
		$location = $this->db->where('category', '')
							 ->get('locations');

		echo $location->num_rows();

		if ($location->num_rows() > 0) {
			echo json_encode($location->result());
		}
	}
}
