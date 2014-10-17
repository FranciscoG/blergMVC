<?php
class nestedController extends Controller {

    protected function init(){
        // do some db connection, etc
    }
    
  
    public function index(){
      // lets make some fake data for testing
      $data = array(
        "name" => "blerg", 
        "title" => "blerg master", 
        "blerg" => "yeah!", 
        'test' => array(
            "test" => "nested", 
            "nest2" => array(
              "test" => "nested more"
            )
          ), 
        "test2" => array(1,2,3,4)
      );
      
      // make $data availale in the view as $items
      $this->view->set('items',$data);
      
      // we can also view the data in our debug.log with this
      Helpers::log($data);
      
      return $this->view();
    }

    public function test(){
      //$this->forceSSL();
      return $this->view();
    }

}