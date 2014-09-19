<div class="login tintuc">
	<h3 class="title">IMPORT NEWS</h3>
    
		<?php
	
		
        
		 echo $this->Form->create('Post', array('enctype' => 'multipart/form-data'));
  
         $category_db = $this->requestAction('categorys/index');
  
         ?>
         <div class="input select">
            <label for="PostCategoryId">Category</label>
            <select id="PostCategoryId" name="data[Post][category_id]">
            <?
                foreach($category_db as $ct){
            ?>        
                    <option value="<?= $ct['Category']['ID']?>"><?= $ct['Category']['category_name']?></option>
            <?
                 }
            ?>
            </select>
         </div>
         
        
         <?php
         $loged = $this->Session->read('loged');
                
         $uid = $loged['Register']['ID'];
         
         echo $this->Form->input('title', array('type'=>'text', 'label'=>'Title' ));
         echo $this->Form->input('content', array('type'=>'textarea', 'label'=>'Content' ));
         echo $this->Form->input('user_id', array('type'=>'hidden', 'hidden'=>true, 'value'=>$uid, 'label'=>false));
         //echo $this->Form->input('images', array('type'=>'file', 'label'=>'Images' ));
         echo $this->Form->input('created', array('type'=>'hidden', 'hidden'=>true, 'value'=>date('Y-m-d'), 'label'=>false));
         //echo $this->Form->input('address', array('type'=>'text', 'label'=>'Address' ));
		 echo "<div  class='btn'>".$this->Form->end('Submit')."</div>";
         
	
        ?>
</div>