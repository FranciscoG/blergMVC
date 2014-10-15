<?php   
/*************************************************************
* Required parameters for system
* if the system is located at different site, these parameter 
* should be changed for each site's identity
**************************************************************/

/**
* Site name
*/
$cfg['site']['name'] = '';

/**
* site address
*/
$cfg['site']['address'] = '';


/************************************************************* 
* Database related settings
************************************************************* /
/**
* default local DB connection parameters
*/
$cfg['db']['hostname'] = 'localhost'; // use 127.0.0.1 instead of localhost in windows
$cfg['db']['username'] = 'root';
$cfg['db']['password'] = '';
/**
* The Default selected DB
*/
$cfg['db']['database'] = 'test';

/************************************************************* 
* PHP ini settings - Please refer \apache\bin\php.ini
*************************************************************/
/**
* Change the session timeout value to 8*60*60 = 8 hours
*/
$cfg['php']['session.gc_maxlifetime'] = 8*60*60; // 8 hours
$cfg['php']['session.gc_probability'] = 1;
$cfg['php']['session.gc_divisor'] = 1;
/**
* Maximum execution time of each script, in seconds
*/
$cfg['php']['max_execution_time'] = 300;
/**
* Maximum amount of time each script may spend parsing request data
*/
$cfg['php']['max_input_time'] = 300;
/**
* Maximum amount of memory a script may consume (16MB)
*/
$cfg['php']['memory_limit'] = '64M';
/**
* Print out errors (as a part of the output).
*/
$cfg['php']['display_errors'] = 'On';
/**
* Whether to allow HTTP file uploads.
*/
$cfg['php']['file_uploads'] = 'Off'; 
/**
* Maximum allowed size for uploaded files. 
*/
$cfg['php']['upload_max_filesize'] = '64M';
/*The maximum size when perform post action*/
$cfg['php']['post_max_size'] = '20M';