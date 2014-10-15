<?php 
  $this->layout = '~/views/shared/defaultLayout.php';
  $this->section['head']='<script src="http://code.jquery.com/jquery-latest.min.js"></script>'; 
?>
<h1>This is being loaded from controller/action, which is index</h1>

<?php $this->insert('shared/part');  ?>

<?php $this->start('test');  ?>
  <p>I am an inline section</p>
<?php $this->end();  ?>