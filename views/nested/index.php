<?php 
  $this->layout = '~/views/shared/defaultLayout.php';
  $this->section['head']='<script src="http://code.jquery.com/jquery-latest.min.js"></script>'; 
?>
<h1>This is being loaded from controller/action, which is index</h1>

<p>My name is <?=$items['name']?></p>
<p>They call me the <?=$items['title']?></p>
<p><?=$items['blerg']?></p>

<?php
  echo Helpers::debug($items);
?>