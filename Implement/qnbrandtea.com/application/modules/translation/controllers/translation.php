<?php

class Translation extends Admin_Controller {

    public function translate() {
        $data = $this->input->post('data');
        $formdata['langId'] = $this->input->post('langId');
        $formdata['itemId'] = $this->input->post('itemId');
        $formdata['langTitle'] = $this->input->post('langTitle');
        
        $myData = unserialize(base64_decode($data));
//        die(base64_decode($data));
        $formdata['items'] = $myData['data'];
        $this->load->view($myData['view'], $formdata);
    }

    public function translateTo($lang) {
        $cookie = array(
            'name' => 'language',
            'value' => $lang,
            'expire' => 86500,
            'secure' => FALSE
        );
        $this->input->set_cookie($cookie);
        
        // Go to previous url
        $ref = $this->input->server('HTTP_REFERER', TRUE);
        redirect($ref);
    }
    function getLang(){
        $this->load->model('mod_translation');
        $itemId = $this->input->post('itemId');
        $table = $this->input->post('table');
        $where = $this->input->post('foreinkey');
//        echo $itemId;
        echo $this->mod_translation->generateHtml($table, $where, $itemId);
    }

}
