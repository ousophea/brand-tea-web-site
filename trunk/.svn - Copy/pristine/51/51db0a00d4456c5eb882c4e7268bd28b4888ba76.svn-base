<?php

/**
 * Description of group
 * It is a controller of group. It will controll all action of group management
 * @author Richat
 */
class product extends Admin_Controller {

    public $photo = '';

    //put your code here
    public function __construct() {
        parent::__construct();
        if (!$this->checkSession()) {
            redirect('authentication/login');
        }
        $this->load->model('mod_product');
        $this->load->model('category/mod_category');
        $this->load->model('group/mod_group');
    }

    public function index() {
        $this->viewProduct();
    }

    /**
     * View all categories
     * All category will get from table category
     */
    public function viewProduct() {
        $config['base_url'] = base_url() . $this->uri->segment(1) . '/viewProduct/';
        $config['total_rows'] = $this->mod_product->getProNum();
        $config['per_page'] = 25;

        $this->pagination->initialize($config);

        $data['pros'] = $this->mod_product->getProduct($this->uri->segment(3), $config['per_page']);

        $data['title'] = "Product";
        $data['page'] = 'product';
        $data['action'] = 'View Product';
        $this->load->view('masterpage/master', $data);
    }

    public function addnew() {
        $data['title'] = "New Product";
        $data['page'] = 'addnew';
        $data['action'] = 'Add New Product';
        $data['gros'] = $this->mod_group->getAllGro();

        $this->form_validation->set_rules('txt_pro_name', 'Product Name', 'trim|required|max_length[50]|is_unique[' . table('product') . '.' . field('proName') . ']');
        $this->form_validation->set_rules('txt_pro_price', 'Price', 'trim|required|numeric');
        $this->form_validation->set_rules('txt_pro_qty', 'Quantity', 'trim|required|numeric');
        $this->form_validation->set_rules('txt_pro_dec', 'Description', 'trim|required|max_length[500]');
        $this->form_validation->set_rules('dro_gro_name', 'Group', 'trim|required');


        if ($this->form_validation->run() == TRUE) {
            $proName = $this->input->post('txt_pro_name');
            $proDec = $this->input->post('txt_pro_dec');
            $proPrice = $this->input->post('txt_pro_price');
            $proQty = $this->input->post('txt_pro_qty');
            $groId = $this->input->post('dro_gro_name');
            $proRelated = serialize($this->input->post('ch_tea_related'));
            $fields = $this->input->post('field');
            $labels = $this->input->post('label');
            $serielizeFields = serialize(array('label' => $labels, 'field' => $fields));


            // Check upload photo first
            if ($this->uploadPhoto('photo')) {
                if ($this->mod_product->addNew($proName, $proPrice, $proQty, $proDec, $proRelated, $groId, $serielizeFields, $this->photo)) {
                    $this->session->set_userdata('ms', $this->lang->line('ms_success'));
                    $this->photo = '';
                    redirect($this->uri->segment(1));
                    exit();
                } else {
                    $this->session->set_userdata('ms', $this->lang->line('ms_error'));
                }
            } else {
                $this->session->set_userdata('ms', $this->lang->line('ms_upload_fail'));
            }
        }
        $data['pros'] = $this->mod_product->getAllPro();
        $this->load->view('masterpage/master', $data);
    }

    public function edit() {
        $data['title'] = "Update Product";
        $data['page'] = 'edit';
        $data['action'] = 'Update Product';
        $data['gros'] = $this->mod_group->getAllGro();

        $check = '';
        if ($this->input->post('hid_pro_name') != $this->input->post('txt_pro_name')) {
            $check = '|is_unique[' . table('product') . '.' . field('proName') . ']';
        }
        $this->form_validation->set_rules('txt_pro_name', 'Product Name', 'trim|required|max_length[50]' . $check);
        $this->form_validation->set_rules('txt_pro_price', 'Price', 'trim|required|numeric');
        $this->form_validation->set_rules('txt_pro_qty', 'Quantity', 'trim|required|numeric');
        $this->form_validation->set_rules('txt_pro_dec', 'Description', 'trim|required|max_length[500]');
        $this->form_validation->set_rules('dro_gro_name', 'Group', 'trim|required');


        if ($this->form_validation->run() == TRUE) {
            $proName = $this->input->post('txt_pro_name');
            $proDec = $this->input->post('txt_pro_dec');
            $proPrice = $this->input->post('txt_pro_price');
            $proQty = $this->input->post('txt_pro_qty');
            $groId = $this->input->post('dro_gro_name');
            $proRelated = serialize($this->input->post('ch_tea_related'));
            $fields = $this->input->post('field');
            $labels = $this->input->post('label');
            $serielizeFields = serialize(array('label' => $labels, 'field' => $fields));

            // Check upload photo first
            if (!$this->uploadPhoto('photo')) {
                $this->photo = '';
            }
            if ($this->mod_product->update($this->uri->segment(3), $proName, $proPrice, $proQty, $proDec, $proRelated, $groId, $serielizeFields, $this->photo)) {
                $this->session->set_userdata('ms', $this->lang->line('ms_success'));
                redirect($this->uri->segment(1));
                exit();
            } else {
                $this->session->set_userdata('ms', $this->lang->line('ms_error'));
            }
        }
        // Current product
        $data['currentPro'] = $this->mod_product->getPro($this->uri->segment(3))->row_array();

        // Photo
        $data['photos'] = $this->mod_product->getPhoto($this->uri->segment(3));
        // Related product
        $data['pros'] = $this->mod_product->getAllPro();
        $this->load->view('masterpage/master', $data);
    }
    
    /**
     * Remove product and all related record
     */
    public function delete() {
        if ($this->mod_product->delete($this->uri->segment(3))) {
            $this->session->set_userdata('ms', $this->lang->line('ms_success'));
            redirect($this->uri->segment(1));
        }
    }

    public function removePhoto() {
        $phoId = $this->input->post('pho_id');
        $phoUrl = $this->input->post('pho_url');
        $this->mod_product->deleteSinglePhoto($phoId, TRUE, $phoUrl);
        echo $this->lang->line('ms_success');
    }

    /**
     * Check user had logged in or not
     * @return boolean
     */
    public function checkSession() {
        if ($this->session->userdata('admin')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Upload files for product
     */
    public function uploadPhoto($fieldName) {
        $this->load->library('upload');
        $config = array(// takes an array of initialization options
            "upload_path" => "./uploads/products/",
            "overwrite" => FALSE,
            "allowed_types" => "gif|jpg|png"
        );
        $this->upload->initialize($config);
        if ($this->upload->do_multi_upload($fieldName)) { // use same as you did in the input field
            $this->photo = $this->upload->get_multi_upload_data();
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Get fields from category by using ajax jquery
     */
    public function getFields() {
        $groId = $this->input->post('gro_id');
        $fields = $this->mod_group->getFields($groId);
        echo $fields;
    }

    /**
     * Get fields from category by using ajax jquery
     */
    public function getProFields() {
        echo $this->mod_product->getProField($this->input->post('pro_id'));
    }

}
