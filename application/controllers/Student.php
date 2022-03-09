<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Student_Model','person');
    }

    public function pdf($id)
	{
        $data['output'] = $this->person->get_by_id_view($id);
        $html = $this->load->view('admin/pdfstudent',$data,true);
        $mpdf = new \Mpdf\Mpdf([
            'format'=>'A4',
			'default_font_size' => 9,
			'default_font' => 'avenir'
		]);
        $mpdf->WriteHTML($html);
        $url = 'student.pdf';
        $mpdf->Output($url,'D'); // opens in browser
        // $mpdf->Output(); 
	}

    public function Load_Student()
    {
    	$this->load->view('admin/student_view');
    }

    public function ajax_list()
    {
        $list = $this->person->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->stdid;
            $row[] = $person->firstName;
            $row[] = $person->lastName;
            $row[] = $person->email;
            $row[] = $person->phone;
            // $row[] = $person->gender;
            // $row[] = $person->address;
            // $row[] = $person->dob;
            // $row[] = $person->subject;
            // $row[] = $person->campus;

            //add html for action
        $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>
            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="student View" onclick="view_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-circle-arrow-right"></i></a>
            <a class="btn btn-sm btn-info" href="javascript:void(0)" title="PDF view" onclick="view_pdf('."'".$person->id."'".')"><i class="glyphicon glyphicon-file"></i></a>';

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
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('phone','Phone','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('dob','Dob','required');
		$this->form_validation->set_rules('subject','Subject','required');
		$this->form_validation->set_rules('campus','Campus','required');
		if($this->form_validation->run() == true){
            
			$data = array(
                'stdid' => $this->input->post('stdid'),
                'firstName' => $this->input->post('firstName'),
                'lastName' => $this->input->post('lastName'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'gender' => $this->input->post('gender'),
                'address' => $this->input->post('address'),
                'dob' => $this->input->post('dob'),
                'subject' => $this->input->post('subject'),
                'campus' => $this->input->post('campus'),
            );

            $P_data = array(
                'parentfirstName' => $this->input->post('parentfirstName'),
                'parentlastName' => $this->input->post('parentlastName'),
                'parentemail' => $this->input->post('parentemail'),
                'parentphone' => $this->input->post('parentphone'),
                'parentgender' => $this->input->post('parentgender'),
            );

            $C_data = array(
                'contactfirstName' => $this->input->post('contactfirstName'),
                'contactlastName' => $this->input->post('contactlastName'),
                'contactemail' => $this->input->post('contactemail'),
                'contactphone' => $this->input->post('contactphone'),
                'contactgender' => $this->input->post('contactgender'),
            );
        	$insert = $this->person->save($P_data, $C_data, $data);

			echo json_encode(array("status" => TRUE));
		}
    }

    public function ajax_update()
    {
        $data = array(
            'stdid' => $this->input->post('stdid'),
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'gender' => $this->input->post('gender'),
            'address' => $this->input->post('address'),
            'dob' => $this->input->post('dob'),
            'subject' => $this->input->post('subject'),
            'campus' => $this->input->post('campus'),
        );

        $P_data = array(
            'parentfirstName' => $this->input->post('parentfirstName'),
            'parentlastName' => $this->input->post('parentlastName'),
            'parentemail' => $this->input->post('parentemail'),
            'parentphone' => $this->input->post('parentphone'),
            'parentgender' => $this->input->post('parentgender'),
        );

        $C_data = array(
            'contactfirstName' => $this->input->post('contactfirstName'),
            'contactlastName' => $this->input->post('contactlastName'),
            'contactemail' => $this->input->post('contactemail'),
            'contactphone' => $this->input->post('contactphone'),
            'contactgender' => $this->input->post('contactgender'),
        );

    $this->person->update(array('stdid' => $this->input->post('stdid')),$data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->person->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    public function list_by_id($id){

        $data['output'] = $this->person->get_by_id_view($id);
        $this->load->view('admin/view_Details_std', $data);
    }
}