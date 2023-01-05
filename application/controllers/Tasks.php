<?php
class Tasks extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
        $this->load->model('task_model');
    }
    public function index()
    {
        $this->load->library('javascript');

        $data['title'] = 'Tasks';

        $this->load->view('templates/header');
        $this->load->view('tasks/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id = NULL)
    {
        $data['task'] = $this->task_model->get_tasks($id);
        if (empty($data['task'])) {
            show_404();
        }

        $data['title'] = $data['task']['company_name'];

        $this->load->view('templates/header');
        $this->load->view('tasks/view', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('company-name', 'Company name', 'required');
            $this->form_validation->set_rules('contact-phone', 'Contact phone', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('done-by', 'Done by', 'required');
            if ($this->input->post('status') == 'fixed') {
                $this->form_validation->set_rules('fixed-date', 'Fixed date', 'required');
            }
            $this->form_validation->set_rules('reported-issue', 'Reported issue', 'required');
            $this->form_validation->set_rules('reason', 'What caused the issue?', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data = array('response' => "error", 'message' => validation_errors());
            } else {
                $ajax_data = array(
                    'company_name' => $this->input->post('company-name'),
                    'contact_phone' => $this->input->post('contact-phone'),
                    'address' => $this->input->post('address'),
                    'status' => $this->input->post('status'),
                    'done_by' => $this->input->post('done-by'),
                    'reported_issue' => $this->input->post('reported-issue'),
                    'reason' => $this->input->post('reason'),
                );

                $data = array('response' => "success", 'message' => "Task added successfully");
                if ($this->task_model->insert_entry($ajax_data)) {
                    $data = array('response' => "success", 'message' => "Task added successfully");
                } else {
                    $data = array('response' => "error", 'message' => "Failed to create task");
                }
            }

            echo json_encode($data);
        } else {
            echo "'No direct script access allowed'";
        }
    }


    public function fetch()
	{
		if ($this->input->is_ajax_request()) {
			$tasks = $this->task_model->get_tasks();
			echo json_encode($tasks);
		} else {
			echo "'No direct script access allowed'";
		}
	}


    public function delete($id)
	{

			if ($this->task_model->delete_entry($id)) {
                $data['title'] = 'Tasks';

                $this->load->view('templates/header');
                $this->load->view('tasks/index', $data);
                $this->load->view('templates/footer');
			} else {
                $data['title'] = 'Tasks';
                $data['message'] = 'Not delete';

                $this->load->view('templates/header');
                $this->load->view('tasks/index', $data);
                $this->load->view('templates/footer');
			}

			
	}


    public function edit()
	{
		if ($this->input->is_ajax_request()) {

			$id = $this->input->post('id');

			if ($post = $this->task_model->get_task_by_id($id)) {
				$data = array('response' => "success", 'post' => $post);
			} else {
				$data = array('response' => "error", 'message' => "failed");
			}

			echo json_encode($data);
		}
	}

    public function update()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('company-name', 'Company name', 'required');
            $this->form_validation->set_rules('contact-phone', 'Contact phone', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('done-by', 'Done by', 'required');
            if ($this->input->post('status') == 'fixed') {
                $this->form_validation->set_rules('fixed-date', 'Fixed date', 'required');
            }            $this->form_validation->set_rules('reported-issue', 'Reported issue', 'required');
            $this->form_validation->set_rules('reason', 'What caused the issue?', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
                if($this->input->post('status') == 'process'){
                    $ajax_data = array(
                        'id' => $this->input->post('id'),
                        'company_name' => $this->input->post('company-name'),
                        'contact_phone' => $this->input->post('contact-phone'),
                        'address' => $this->input->post('address'),
                        'status' => $this->input->post('status'),
                        'done_by' => $this->input->post('done-by'),
                        'reported_issue' => $this->input->post('reported-issue'),
                        'reason' => $this->input->post('reason'),
                    );
                }else{
                    $ajax_data = array(
                        'id' => $this->input->post('id'),
                        'company_name' => $this->input->post('company-name'),
                        'contact_phone' => $this->input->post('contact-phone'),
                        'address' => $this->input->post('address'),
                        'status' => $this->input->post('status'),
                        'done_by' => $this->input->post('done-by'),
                        'fixed_date' => $this->input->post('fixed-date'),
                        'reported_issue' => $this->input->post('reported-issue'),
                        'reason' => $this->input->post('reason'),
                    );
                }
				
				if ($this->task_model->update_task($ajax_data)) {
					$data = array('response' => "success", 'message' => "Task updated successfully");
				} else {
					$data = array('response' => "error", 'message' => "Failed to update task");
				}
			}

			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}
	}
}
