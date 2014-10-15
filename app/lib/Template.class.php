<?php
class Template {                      
    protected $_variables = array(),
              $_controller,
              $_action,
              $_bodyContent;

    /**
     * Borrowed from CakePHP.  Allows got inline sections
     * @var array
     */
    protected $_active = array();
    protected $_blocks = array();

    public $viewPath, 
           $section = array(),
           $layout;

    public function __construct($controller, $action) {
        $this->_controller = $controller;
        $this->_action = $action;
        // we set the configuration variables to local variables for rendering
        global $cfg;
        $this->set('cfg',$cfg);
    }

    /** 
    * Set Variables 
    */
    public function set($name, $value) {
        $this->_variables[$name] = $value;
    }
    
    /**
    * set action
    */
    public function setAction($action){
        $this->_action = $action;
    }
    
    /**
    * RenderBody
    */
    public function renderBody(){
      // if we have content, then deliver it
        if(!empty($this->_bodyContent)){
            echo $this->_bodyContent;
        }
    }
    
    /**
     * Renders content stored in the $section array
     * @param  string $section The key in the array where content is saved
     * @return [type]          [description]
     */
    public function renderSection($section){
        if (!empty($this->section) && array_key_exists($section, $this->section)){
            echo $this->section[$section];
        }
    }

    /**
     * Allows template to define inline content that can be rendered anywhere on the template
     * Borrowed from CakePHP
     * @param  string $name
     * @return void
     */
    public function start($name) {
        if (in_array($name, $this->_active)) {
            throw new Exception("A view block with the name '".$name."' is already/still open.");
        }
        $this->_active[] = $name;
        ob_start();
    }

    /**
     * Ends an inline section buffering
     * Borrowed from CakePHP
     * @return void 
     */
    public function end() {
        if (!empty($this->_active)) {
            $active = end($this->_active);
            $content = ob_get_clean();
            if (!isset($this->_blocks[$active])) {
                $this->_blocks[$active] = '';
            }
            $this->_blocks[$active] .= $content;
            array_pop($this->_active);
        }
    }

    /**
     * Gets a section and displayes it
     * Borrowed from CakePHP
     * @param  string $name    
     * @param  string $default A default if section doesn't exist
     * @return void 
     */
    public function get($name, $default = '') {
        if (!isset($this->_blocks[$name])) {
            return $default;
        }
        echo $this->_blocks[$name];
    }


    /** 
    * Display Template 
    */
    public function render() {
        // extract the variables for view pages
        extract($this->_variables);
        // the view path
        //$path = Helpers::UrlContent('~/views/');
        $path = Helpers::UrlContent("~/views/{$this->_controller}/{$this->_action}.php");
        $path2 = Helpers::UrlContent("~/views/{$this->_controller}.php");
        
        // start buffering
        ob_start();
        
        // render page content
        if(empty($this->viewPath)){ 
            if (file_exists($path)) {
              include($path);
            } else if (file_exists($path2)) {
              include($path2);
            }
        }else{
            include ($this->viewPath);
        }
        
        // get the body contents
        $this->_bodyContent = ob_get_contents();
        
        // clean the buffer
        ob_end_clean();

        // check if we have any layout defined
        if (!empty($this->layout) && (!Helpers::isAjax())){
            // we need to check the path contains app prefix (~)
            $this->layout = Helpers::UrlContent($this->layout);
            // start buffer
            ob_start();
            // include the template
            include($this->layout);
        } else {
            ob_start();
            // just output the content
            echo $this->_bodyContent;
        }
        // end buffer
        ob_end_flush();
    }
    
    /**
    * return the renderred html string
    */
    public function __toString(){
        $this->render();
        return '';
    }

    /**
     * Fetch a view part (like a normal include but resolved only to the View folder)
     */
    public function insert($thing) {
        if (!empty($thing)) {
            $path = Helpers::UrlContent('~/views/'.$thing.'.php');
            if (file_exists($path)) {
                include($path);
            }
        }
    }
}   