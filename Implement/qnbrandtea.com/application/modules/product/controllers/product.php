<?php

/**
 * Description of group
 * It is a controller of group. It will controll all action of group management
 * @author Richat
 */
class Product extends Admin_Controller {

    public $photo = '';

    //put your code here
    public function __construct() {
        parent::__construct();
        if (!$this->checkSession()) {
            redirect('authentication/login');
        }
        $this->load->model(array('mod_product', 'category/mod_category', 'group/mod_group', 'translation/mod_translation'));
        $this->load->library('image_lib');
        $this->lang->load('english', 'english');
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
        $data['langs'] = $this->mod_translation->getLanguages();

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

        $this->form_validation->set_rules('txt_pro_name', 'Product Name', 'trim|required|max_length[100]|is_unique[' . table('product') . '.' . field('proName') . ']');
        $this->form_validation->set_rules('txt_pro_price', 'Price', 'trim|required|numeric');
        $this->form_validation->set_rules('txt_pro_qty', 'Quantity', 'trim|required|numeric');
        $this->form_validation->set_rules('txt_pro_dec', 'Description', 'trim|required|max_length[5000]');
        $this->form_validation->set_rules('dro_gro_name', 'Group', 'trim|required');
//        $this->form_validation->set_rules('main_photo', 'Main Photo', 'required');


        if ($this->form_validation->run() == TRUE) {
            $proName = $this->input->post('txt_pro_name');
            $proDec = $this->input->post('txt_pro_dec');
            $proPrice = serialize(array('price' => $this->input->post('txt_pro_price'), 'hide_show' => $this->input->post('price_hide_show')));
            $proQty = serialize(array('qty' => $this->input->post('txt_pro_qty'), 'hide_show' => $this->input->post('qty_hide_show')));
            $groId = $this->input->post('dro_gro_name');
            $proRelated = serialize($this->input->post('ch_tea_related'));
            $fields = $this->input->post('field');
            $labels = $this->input->post('label');
            $hideShows = $this->input->post('hide_show');
            $serielizeFields = serialize(array('label' => $labels, 'field' => $fields, 'hide_show' => $hideShows));
            $relatedKnowledge = serialize($this->input->post('ch_tea_knowledge'));


            $this->photo['photo'] = array();
            $this->photo['main_photo'] = array();
            // Check upload photo first
            if ($this->uploadPhoto('main_photo')) {
                // Resize image
                $this->configResizePhoto($this->photo['main_photo']);
            }
            if ($this->uploadPhoto('photo')) {
                $this->configResizePhoto($this->photo['photo']);
            }


            if ($this->mod_product->addNew($proName, $proPrice, $proQty, $proDec, $proRelated, $groId, $serielizeFields, $this->photo, $relatedKnowledge)) {
                if ($this->input->post('posttofacebook') == 'yes') {
                    // Connect Facebook
                    $user = $this->facebook->getUser();
                    if ($user) {
                        try {
//                            echo base_url().'uploads/products/250x250/'.$this->photo['main_photo'][0]['file_name'];
//                            die();
                            $msg = array(
                                'picture' => base_url().'uploads/products/'.$this->photo['main_photo'][0]['file_name'],
                                'message' => $proName,
                                'link' => base_url().'site/products/detail/'.$this->mod_product->getInsertId(),
                                'name' => $proName,
                                'description' => strip_tags($proDec)
                            );
                            $url = '/1475054486043458/feed';
                            $result = $this->facebook->api($url, 'POST', $msg);
                            if (!$result) {
                                $this->session->set_userdata('ms', 'Can not post to facebook!');
                            }
                        } catch (FacebookApiException $e) {
                            echo $e->facebook->getMessage();
                        }
                    }else{
//                        print_r($this->photo['main_photo']);
//                        echo base_url().'uploads/products/250x250/'.$this->photo['main_photo'][0]['file_name'].'<br />';
//                        echo $proName.'<br />';
//                        echo  base_url().'site/products/detail/'.$this->mod_product->getInsertId().'<br />';
//                        echo $proDec.'<br />';
                        echo 'You are not login! ';
                        echo '<a href="'.$this->facebook->getLoginUrl(array('scope'=>'manage_pages, publish_stream', 'redirect-uri'=>'http://qnbrandtea.com/beta/index.php')).'">Login</a>';
                        die();
                    }
                }
                $this->session->userdata('ms') ? $this->session->set_userdata('ms', $this->session->userdata('ms') . ' ' . $this->lang->line('ms_success')) : $this->session->set_userdata('ms', $this->lang->line('ms_success'));
                $this->photo = '';
                redirect($this->uri->segment(1));
                exit();
            } else {
                $this->session->set_userdata('ms', $this->lang->line('ms_error'));
            }
        }
        $data['pros'] = $this->mod_product->getAllPro();
        $data['relateds'] = $this->mod_product->getRelatedKnowledge();
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
        $this->form_validation->set_rules('txt_pro_name', 'Product Name', 'trim|required|max_length[100]' . $check);
        $this->form_validation->set_rules('txt_pro_price', 'Price', 'trim|required|numeric');
        $this->form_validation->set_rules('txt_pro_qty', 'Quantity', 'trim|required|numeric');
        $this->form_validation->set_rules('txt_pro_dec', 'Description', 'trim|required|max_length[5000]');
        $this->form_validation->set_rules('dro_gro_name', 'Group', 'trim|required');


        if ($this->form_validation->run() == TRUE) {
            $proName = $this->input->post('txt_pro_name');
            $proDec = $this->input->post('txt_pro_dec');
            $proPrice = serialize(array('price' => $this->input->post('txt_pro_price'), 'hide_show' => $this->input->post('price_hide_show')));
            $proQty = serialize(array('qty' => $this->input->post('txt_pro_qty'), 'hide_show' => $this->input->post('qty_hide_show')));
            $groId = $this->input->post('dro_gro_name');
            $proRelated = serialize($this->input->post('ch_tea_related'));
            $fields = $this->input->post('field');
            $labels = $this->input->post('label');
            $hideShows = $this->input->post('hide_show');
            $serielizeFields = serialize(array('label' => $labels, 'field' => $fields, 'hide_show' => $hideShows));
            $relatedKnowledge = serialize($this->input->post('ch_tea_knowledge'));

            // Check upload photo first
            if (!$this->uploadPhoto('photo')) {
                $this->photo['photo'] = array();
            } else {
                // Resize image
                $this->configResizePhoto($this->photo['photo']);
            }
            if (!$this->uploadPhoto('main_photo')) {
                $this->photo['main_photo'] = array();
            } else {
                // Resize image
                $this->configResizePhoto($this->photo['main_photo']);
            }
            if ($this->mod_product->update($this->uri->segment(3), $proName, $proPrice, $proQty, $proDec, $proRelated, $groId, $serielizeFields, $this->photo, $relatedKnowledge)) {
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
        $data['relateds'] = $this->mod_product->getRelatedKnowledge();
        $this->load->view('masterpage/master', $data);
    }

    /**
     * Remove product and all related records
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
            $this->photo[$fieldName] = $this->upload->get_multi_upload_data();
            unset($this->upload->_multi_upload_data);
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

    public function configResizePhoto($photos) {
        $widths = array(100, 250, 500);
        $heights = array(100, 250, 500);
        $sorucePath = './uploads/products/';
        $resizePath = array($sorucePath . 100 . 'x' . 100 . '/', $sorucePath . 250 . 'x' . 250 . '/', $sorucePath . 500 . 'x' . 500 . '/');

        // Loop all photos  uploaded
        foreach ($photos as $photo) {
            $i = 0;
            // Loop all sizes of image to resize
            foreach ($widths as $val) {
                $photoName = $photo['file_name'];
                $width = $photo['image_width'] >= $widths[$i] ? $widths[$i] : $photo['image_width'];
                $height = $photo['image_height'] >= $heights[$i] ? $heights[$i] : $photo['image_height'];
                $this->resizePhoto($sorucePath, $photoName, $resizePath[$i], $width, $height);
                $i++;
            }
        }
    }

    /**
     * Resize image
     */
    public function resizePhoto($sourcePath, $image, $resizePath, $width, $height) {

        $config['image_library'] = 'gd2';
        $config['source_image'] = $sourcePath . $image;
        $config['new_image'] = $resizePath . $image;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = $width;
        $config['height'] = $height;

        $this->image_lib->clear();
        $this->image_lib->initialize($config);

        if (!$this->image_lib->resize()) {
            $this->session->set_userdata('ms_error', $this->lang->line('ms_error'));
        }
    }

    /**
     * Translation
     */
    public function product_translation($id, $lanId) {
        $this->form_validation->set_rules('txt_pro_name', 'Product Name', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('txt_pro_dec', 'Description', 'trim|required|max_length[5000]');

        if ($this->form_validation->run() == TRUE) {
            $proName = $this->input->post('txt_pro_name');
            $proDes = $this->input->post('txt_pro_dec');
            $fields = $this->input->post('field');
            $labels = $this->input->post('label');
            $hideShows = $this->input->post('hide_show');
            $serielizeFields = serialize(array('label' => $labels, 'field' => $fields, 'hide_show' => $hideShows));
            $action = $this->input->post('action');
            if ($this->mod_product->translate($id, $lanId, $proName, $proDes, $serielizeFields, $action)) {
                $this->session->set_userdata('ms', $this->lang->line('ms_success'));
                redirect('product');
            }
        }
        $data['title'] = "Translate";
        $data['page'] = 'product_translation';
        $data['action'] = 'Translate';
        if ($this->input->post('lan_title')) {
            $data['langTitle'] = $this->input->post('lan_title');
            $data['itemId'] = $this->input->post('pro_id');
            $data['langId'] = $this->input->post('lang_id');
            $data['items'] = $this->input->post('pro_data');
        } else {
            redirect('product');
        }

        $this->load->view('masterpage/master', $data);
    }

}
