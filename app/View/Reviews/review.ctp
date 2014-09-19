<div class="review">
	<h3 class="title">Review</h3>
    <? 
        $loged = $this->Session->read('loged');
        $id = $loged['Register']['ID'];
        $categorys = $this->requestAction('categorys/index');
        $posts = $this->requestAction('posts/index'); 
    ?>
    <div class="info">
        <?
        foreach($posts as $post){
            ?>
        <h4><?=($post['Post']['ID'] == $post_id)? $post['Post']['title']:'';?></h4>   
        <?}?>
        <p class="lienhe address">Categry: 
        <?
        foreach($categorys as $category){
        ?>
         <?=($category['Category']['ID'] == $post['Post']['category_id'])? $category['Category']['category_name']:''; ?>
        <?}?>
        </p>
    </div>
    <?php 
    echo  $this->Form->create();
    echo $this->Form->input('status',array( 'type' =>'hidden' ,'hidden'=>true,'value'=>'Pending','label'=>false));
    echo $this->Form->input('post_id',array( 'type' =>'hidden' ,'hidden'=>true,'value'=>$post_id,'label'=>false));
    echo $this->Form->input('user_id',array( 'type' =>'hidden' ,'hidden'=>true,'value'=>$id,'label'=>false));
    ?>
        <div class="ratings_1">
            <div class="large-4 columns required_img">Overall</div>
            <div class="large-8 columns">
                <ul class="large-block-grid-6">
                    <li>
                    <?php
                    $options=array('A'=>'A','B'=>'B','C'=>'C','D'=>'D','F'=>'F');
                    $attributes=array( 'separator'=>'</li><li>','legend'=>false,'required'=>'required');
                    echo $this->Form->radio('overall',$options,$attributes);
                    ?>
                </ul>
            </div>
            <div class="clear"></div>
        </div><!--.ratings_1 -->
        <div class="ratings_2">
            <div class="large-4 columns required_img">Availability</div>
            <div class="large-8 columns">
                <ul class="large-block-grid-6">
                    <li>
                    <?php
                    $options=array('A'=>'A','B'=>'B','C'=>'C','D'=>'D','F'=>'F','N/A'=>'N/A');
                    $attributes=array( 'separator'=>'</li><li>','legend'=>false,'required'=>'required');
                    echo $this->Form->radio('availability',$options,$attributes);
                    ?>
                </ul>
            </div>
            <div class="clear"></div>
        </div><!--.ratings_2 -->
        <div class="ratings_3">
            <div class="large-4 columns required_img">Office Environment</div>
            <div class="large-8 columns">
                <ul class="large-block-grid-6">
                    <li>
                    <?php
                    $options=array('A'=>'A','B'=>'B','C'=>'C','D'=>'D','F'=>'F','N/A'=>'N/A');
                    $attributes=array( 'separator'=>'</li><li>','legend'=>false,'required'=>'required');
                    echo $this->Form->radio('office',$options,$attributes);
                    ?>
                </ul>
            </div>
            <div class="clear"></div>
        </div><!--.ratings_3 -->
        <div class="ratings_4">
            <div class="large-4 columns required_img">Punctuality</div>
            <div class="large-8 columns">
                <ul class="large-block-grid-6">
                    <li>
                    <?php
                    $options=array('A'=>'A','B'=>'B','C'=>'C','D'=>'D','F'=>'F','N/A'=>'N/A');
                    $attributes=array( 'separator'=>'</li><li>','legend'=>false,'required'=>'required');
                    echo $this->Form->radio('punctuality',$options,$attributes);
                    ?>
                </ul>
            </div>
            <div class="clear"></div>
        </div><!--.ratings_4 -->
        <div class="ratings_5">
            <div class="large-4 columns required_img">Staff Friendliness</div>
            <div class="large-8 columns">
                <ul class="large-block-grid-6">
                    <li>
                    <?php
                    $options=array('A'=>'A','B'=>'B','C'=>'C','D'=>'D','F'=>'F','N/A'=>'N/A');
                    $attributes=array( 'separator'=>'</li><li>','legend'=>false,'required'=>'required');
                    echo $this->Form->radio('staff',$options,$attributes);
                    ?>
                </ul>
            </div>
            <div class="clear"></div>
        </div><!--.ratings_5 -->
        <div class="ratings_6">
            <div class="large-4 columns required_img">Bedside Manner</div>
            <div class="large-8 columns">
                <ul class="large-block-grid-6">
                    <li>
                    <?php
                    $options=array('A'=>'A','B'=>'B','C'=>'C','D'=>'D','F'=>'F','N/A'=>'N/A');
                    $attributes=array( 'separator'=>'</li><li>','legend'=>false,'required'=>'required');
                    echo $this->Form->radio('bedside',$options,$attributes);
                    ?>
                </ul>
            </div>
            <div class="clear"></div>
        </div><!--.ratings_6 -->
        <div class="ratings_7">
            <div class="large-4 columns required_img">Communication</div>
            <div class="large-8 columns">
                <ul class="large-block-grid-6">
                    <li>
                    <?php
                    $options=array('A'=>'A','B'=>'B','C'=>'C','D'=>'D','F'=>'F','N/A'=>'N/A');
                    $attributes=array( 'separator'=>'</li><li>','legend'=>false,'required'=>'required');
                    echo $this->Form->radio('communication',$options,$attributes);
                    ?>
                </ul>
            </div>
            <div class="clear"></div>
        </div><!--.ratings_7 -->
        <div class="ratings_8">
            <div class="large-4 columns required_img">Effectiveness of Treatment</div>
            <div class="large-8 columns">
                <ul class="large-block-grid-6">
                    <li>
                    <?php
                    $options=array('A'=>'A','B'=>'B','C'=>'C','D'=>'D','F'=>'F','N/A'=>'N/A');
                    $attributes=array( 'separator'=>'</li><li>','legend'=>false,'required'=>'required');
                    echo $this->Form->radio('treatment',$options,$attributes);
                    ?>
                </ul>
            </div>
            <div class="clear"></div>
        </div><!--.ratings_8 -->
        <div class="ratings_9">
            <div class="large-4 columns required_img">Billing and Administration</div>
            <div class="large-8 columns">
                <ul class="large-block-grid-6">
                    <li>
                    <?php
                    $options=array('A'=>'A','B'=>'B','C'=>'C','D'=>'D','F'=>'F','N/A'=>'N/A');
                    $attributes=array( 'separator'=>'</li><li>','legend'=>false,'required'=>'required');
                    echo $this->Form->radio('billing',$options,$attributes);
                    ?>
                </ul>
            </div>
            <div class="clear"></div>
        </div><!--.ratings_9 -->
        <div class="clear"></div>
     <h3 class="title">Details of Your Experience </h3> 
     <p class="required_img">Did the provider perform services? (as opposed to just an estimate, phone call for information, etc.)</p>  
        <?php
            $options=array('1'=>'Yes','2'=>'No');
            $attributes=array('legend'=>false,'required'=>'required');
            echo $this->Form->radio('services',$options,$attributes);
        ?>
        <p class="required_img">Would you use this provider/practice again in the future?</p>
        <?php
            $options=array('1'=>'Yes','2'=>'No');
            $attributes=array('legend'=>false,'required'=>'required');
            echo $this->Form->radio('future',$options,$attributes);
        ?>
        <p class="required_img">Approx. Appointment Date</p>
        <?php echo $this->Form->input('date',array('label'=>'','type'=>'date', 'minYear' => date('Y') - 10, 'maxYear' => date('Y') - 60,'dateFormat' => 'DMY')); ?>
        <div class="clear"></div>
        <p class="required_img">Describe the reason for your appointment and your interaction with the provider.</p>   
        <?php echo $this->Form->input('provider', array('label' => '','type' => 'textarea','required'=>'required'));  ?>  
        <p class="required_img">How'd it go? We want all the details.</p>    
        <?php echo $this->Form->input('details', array('label' => '','type' => 'textarea' ,'required'=>'required'));  ?>
        <h3 class="title">Confirm</h3>  
        <div class="required_img">
        <?php echo $this->Form->input('confirm', array('label' => 'I confirm that the information contained in this Service Evaluation Form (i) is true and accurate and (ii) represents my actual first-hand experience, or experience which I am authorized to discuss.  I acknowledge and understand my responsibilities under the Angie\'s List Membership Agreement, and that Angie\'s List is relying upon the accuracy of the information in order to serve other members.  I confirm that I do not work for, am not in competition with, and am not in any way related to the service provider in this review.','type' => 'checkbox','required'=>'required'));  ?>
        </div> <br /> 
        <?php echo  "<div  class='btn'>".$this->Form->end('Submit Review')."</div>"; ?>
</div>