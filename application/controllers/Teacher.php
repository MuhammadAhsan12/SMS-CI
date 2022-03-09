<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Teacher_Model','person');
    }

	public function index()
	{
		$this->load->view('admin/dashboard');
	}

    public function pdf($id)
	{
        $data['output'] = $this->person->get_by_id_view($id);
        $html = $this->load->view('admin/pdfteacher',$data,true);
        $mpdf = new \Mpdf\Mpdf([
            'format'=>'A4',
			'default_font_size' => 9,
			'default_font' => 'avenir'
		]);
        $mpdf->WriteHTML($html);
        $url = 'teacher.pdf';
        $mpdf->Output($url,'D'); // opens in browser
        // $mpdf->Output(); 
	}

    public function Load_Teacher()
    {
    	$this->load->view('admin/teacher_view');
    }

    public function Load_SchoolProfile()
    {
        $this->load->view('admin/chart');
    }

    public function Load_Subjek()
    {
        $this->load->view('admin/subjek');
    }

    public function Load_Activity()
    {
        $this->load->view('admin/activity');
    }

        public function Load_Notes()
    {
        $this->load->view('admin/notes');
    }

        public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url().'home/index/');
    }

    public function ajax_list()
    {
        $list = $this->person->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->firstName;
            $row[] = $person->lastName;
            $row[] = $person->gender;
            $row[] = $person->address;
            $row[] = $person->dob;

            //add html for action
        $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>
            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="View" onclick="view_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-circle-arrow-right"></i></a>
            <a class="btn btn-sm btn-info" href="javascript:void(0)" title="pdf" onclick="view_pdf('."'".$person->id."'".')"><i class="glyphicon glyphicon-file"></i></a>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->person->count_all(),
                        "recordsFiltered" => $this->person->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->person->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_add()
    {
		$this->form_validation->set_rules('firstName','FirstName','required');
		$this->form_validation->set_rules('lastName','LastName','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('dob','Dob','required');
		if($this->form_validation->run() == true){
			$data = array(
                'firstName' => $this->input->post('firstName'),
                'lastName' => $this->input->post('lastName'),
                'gender' => $this->input->post('gender'),
                'address' => $this->input->post('address'),
                'dob' => $this->input->post('dob'),
            );
        	$insert = $this->person->save($data);
			echo json_encode(array("status" => TRUE));
		}
    }

    public function ajax_update()
    {
        $data = array(
                'firstName' => $this->input->post('firstName'),
                'lastName' => $this->input->post('lastName'),
                'gender' => $this->input->post('gender'),
                'address' => $this->input->post('address'),
                'dob' => $this->input->post('dob'),
            );
        $this->person->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->person->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

        public function list_by_id($id)
        {
    $data['output'] = $this->person->get_by_id_view($id);
    $this->load->view('admin/view_Detail', $data);
}

}
