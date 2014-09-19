<div class="register">
	<h3 class="title">REGISTER</h3>
    
		<?php
		 echo $this->Form->create();
	     echo $this->Form->input('name',array('type'=>'text','label'=>'Name','required'=>'required' ));
         
         $sex_options = array('male'=>'Male','female'=>'Female');
         echo $this->Form->input('sex', array('type'=>'select', 'label'=>'Sex', 'options'=>$sex_options));
         
		 echo $this->Form->input('birthday',array('label'=>'Birthday','type'=>'date', 'minYear' => date('Y') - 10, 'maxYear' => date('Y') - 60,'dateFormat' => 'DMY'));
		 echo $this->Form->input('address',array('label'=>'Address','required'=>'required'));
		
		 echo $this->Form->input('check_admin',array('type' =>'hidden' ,'hidden'=>true,'value'=>'2','label'=>false));
		 echo $this->Form->input('email',array('type'=>'email','label'=>'Email ','required'=>'required'));
		 
		
		 echo $this->Form->input('password',array('label'=>'Password','type'=>'password' ));
		
		 echo "<div  class='btn'>".$this->Form->end('Register')."</div>";
           // echo $this->Session->read('islogin');
        ?>
</div>