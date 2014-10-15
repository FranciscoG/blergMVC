<?php 
  $this->layout = '~/views/shared/defaultLayout.php';
?>
<h1>This file has no controller and is begin loaded by defaultAction method</h1>

<?php $this->insert('shared/part'); ?>

<?php $this->start('test'); ?>
  <p>I am an inline section</p>
<?php $this->end();  ?>