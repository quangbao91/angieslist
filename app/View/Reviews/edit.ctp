<div class="">
	<h3 class="title">UPDATE</h3>
    
		<?php
	
		
		 echo $this->Form->create();
		  $status_options = array('Cancel'=>'Cancel','Aprroved'=>'Aprroved','Pending'=>'Pending');
         echo $this->Form->input('status', array('type'=>'select', 'label'=>'', 'options'=>$status_options));
		 echo "<div class='btn'>".$this->Form->end('Update')."</div>";

        ?>
</div>