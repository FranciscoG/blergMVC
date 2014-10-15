<?php
class blogController extends Controller {

    
    protected function init(){
        //$this->db = new MySqlDataAdapter($this->cfg['db']['hostname'], $this->cfg['db']['username'], 
        //$this->cfg['db']['password'], $this->cfg['db']['database']);
    }
    
  
    public function index(){
      // basic implementation to just return the view
      return $this->view();
    }

    /*
     * another example of returning a view with model data
     * 
    
    public function index(){
      $data = $this->_model->read();
      
      if( Helpers::isAjax()){
        header('Content-type: application/json');
        echo $data;
      } else{
        $this->view->set('items',$data);
        return $this->view();
      }
    }
    
    */
}