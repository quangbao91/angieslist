<div class="login">
    
    <h3 class="title">Login</h3>
    
    <?php
	
		 echo $this->Form->create();

		 echo $this->Form->input('email',array('type'=>'email','label'=>'Email ','required'=>'required'));
		 echo $this->Form->input('password',array('label'=>'Password','type'=>'password' ));
		 echo "<div class='btn'>".$this->Form->end('Login')."</div>";
	
    ?>
 </div>