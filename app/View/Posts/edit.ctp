<div class="login tintuc">
	<h3 class="title">UPDATE NEWS</h3>
    
		<?php
	
		
        
		 echo $post= $this->Form->create('Post', array('enctype' => 'multipart/form-data'));
         
        $posts = $this->request->data;
        $id= $posts['Post']['category_id'];
         $category_db = $this->requestAction('categorys/index'); 
         ?>
         <div class="input select">
            <label for="PostCategoryId">Category</label>
            <select id="PostCategoryId" name="data[Post][category_id]">
            <?
                foreach($category_db as $ct){
            ?>
                <option value="<?= $ct['Category']['ID']?>"  <?=($ct['Category']['ID']==$id)?'selected="selected"':''?>   ><?= $ct['Category']['category_name']?></option>
            <?
            
                 }
            ?>
            </select>
         </div>
         
        
         <?php
         $loged = $this->Session->read('loged');
         $name = $loged['Register']['name'];      
         $uid = $loged['Register']['ID'];
	     echo $this->Form->input('title', array('type'=>'text', 'label'=>'Title' ));
         echo $this->Form->input('content', array('type'=>'textarea', 'label'=>'Content' ));
         echo $this->Form->input('user_id', array('type'=>'hidden', 'hidden'=>true, 'value'=>$uid, 'label'=>false));
         //echo $this->Form->input('images', array('type'=>'file', 'label'=>'Images' ));
         echo $this->Form->input('created', array('readonly','type'=>'hidden', 'hidden'=>true, 'value'=>date('Y-m-d'), 'label'=>false));
		 echo "<div  class='btn'>".$this->Form->end('Update')."</div>";
         
	
        ?>
</div>