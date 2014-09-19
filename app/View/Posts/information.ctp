<h3 class="title">NEWS</h3>


<div class="thongtin">
    <?
    $loged = $this->Session->read('loged');
    $id = $loged['Register']['ID'];
    $check_admin = $loged['Register']['check_admin']; 
    $categorys = $this->requestAction('categorys/index');
    $posts = $this->requestAction('posts/index');
    ?>
    <img class="thumb" src="<?php echo $this->webroot; ?>files/uploads/<?= $post['Post']['images']?>" />
    
    <div class="info">
        <h4><?= $post['Post']['title']?></h4>
        <? if($loged){ ?>
                <div id="tab-Testing">
                    <form id="form3B">
            	        <div class="Clear">
            	             <input class="hover-star" type="radio" name="ranking" value="1" title="Very poor"/>
            	             <input class="hover-star" type="radio" name="ranking" value="2" title="Poor"/>
            	             <input class="hover-star" type="radio" name="ranking" value="3" title="OK"/>
            	             <input class="hover-star" type="radio" name="ranking" value="4" title="Good"/>
            	             <input class="hover-star" type="radio" name="ranking" value="5" title="Very Good"/>
            	        </div><br/><div class="msg"></div> <div class="rank-d"></div> 
                            <input class="product_id" name="rank1" value="<?=$post['Post']['ID']?>" type="hidden"  />
                            <input class="user_id" name="rank" value="<?=($id)?$id:''?>" type="hidden"  />
            	    </form>
                </div>  
                
               <? }?>    
        <p class="lienhe address">Categry: 
        <?
        foreach($categorys as $category){
        ?>
        <?=($category['Category']['ID'] == $post['Post']['category_id'])? $category['Category']['category_name']:''; ?>
        <?}?>
        </p>
        <p class="lienhe ngaythang">Date: <?= $post['Post']['created']?></p>

        <p><?= $post['Post']['content']?></p>
    </div>
    <? if($check_admin) { ?>
    <p><a href="<?php echo $this->webroot; ?>Reviews/review/<?=$post['Post']['ID']?>">Write A Review</p></a>
    <?}?>
    
    
    <? if($check_admin == 1) { ?>
        <div class="read_more"><a href="<?php echo $this->webroot."posts/edit/".$post['Post']['ID']; ?>/">Edit</a></div>
    <?}?>
    
</div>
 