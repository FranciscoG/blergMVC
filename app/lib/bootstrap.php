<?php 
  // Ensure we have session
  if(session_id() === ""){
      session_start();
  }
  // the config file path
  $path = ROOT . DS . APP_DIR . DS . 'config' . DS . 'config.php';
   
  // include the config settings
  require_once($path);
  
  /**
   * This will autoload all Classes, Controllers, and Models with matching names when you instantiate a new class
   */
  spl_autoload_register(function($className) {
   
      $rootPath = ROOT . DS . APP_DIR . DS;
      $valid = false;
      
      // check root directory of library
      $valid = file_exists($classFile = $rootPath . 'lib' . DS . $className . '.class.php');

      // if we cannot find any, then find application/controllers directory
      if(!$valid){
          $valid = file_exists($classFile = $rootPath . 'controllers' . DS . $className . '.php');
      }
      
      // if we cannot find any, then find application/models directory
      if(!$valid){
          $valid = file_exists($classFile = $rootPath . 'models' . DS . $className . '.php');
      }
     
      // if we have valid fild, then include it
      if($valid){
         require_once($classFile); 
      }else{
          /* Error Generation Code Here */
      }    
  });
   
  // Set error reporting
  // TODO:  Set ENV 
  Helpers::setReporting(true);
   
  // remove the magic quotes
  Helpers::removeMagicQuotes();
   
  // unregister globals
  Helpers::unregisterGlobals();
   
  // register route
  $router = new Router($_route);
   
  // finaly we dispatch the output
  $router->dispatch();
   
  // close session to speed up the concurrent connections
  // http://php.net/manual/en/function.session-write-close.php
  session_write_close();