<!DOCTYPE html>
<html>
<head>
  <title>MicroMVC</title>
  <meta http-equiv="Content-Type" content="Type=text/html; charset=utf-8" />
  
  <link href='/css/main.css' rel='stylesheet' type='text/css'/>
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <?php $this->renderSection('head');?>
</head>

<body>
  <?php $this->get('test'); ?> 
  <?php $this->renderBody(); ?>
  

</body>
</html>