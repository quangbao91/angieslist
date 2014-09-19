<div class="login register">
	<h3 class="title">UPDATE CATEGORY</h3>
    
		<?php
	
		
		 echo $this->Form->create();
	     echo $this->Form->input('category_name',array('label'=>'Category','required'=>'required' ));
		
		 echo "<div class='btn'>".$this->Form->end('Update')."</div>";

        ?>
</div>