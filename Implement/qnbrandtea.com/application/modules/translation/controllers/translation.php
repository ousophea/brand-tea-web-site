<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of translation
 *
 * @author who
 */
class Translation extends Admin_Controller {

    public function translate() {
        $data = $this->input->post('data');
        $formdata['langId'] = $this->input->post('langId');
        $formdata['itemId'] = $this->input->post('itemId');
        $formdata['langTitle'] = $this->input->post('langTitle');
        
        $myData = unserialize($data);
        $formdata['items'] = $myData['data'];        
        $this->load->view($myData['view'], $formdata);
    }

}

?>
