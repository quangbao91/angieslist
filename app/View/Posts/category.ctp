<div class="post_cate">
     <? 
    $categorys = $this->requestAction('categorys/index');
    foreach ($categorys as $category ) {
        if($category['Category']['ID']==$id) {
            ?>
            <h3 class="title">Category : <? echo $category['Category']['category_name'] ?> </h3>
            <?
        }
    }
    ?>
    
   
    <ul class="show_title_post">
        <?php
        foreach ($posts as $post ) {
        ?>
           <li><a href="<?php echo $this->webroot."posts/information/".$post['Post']['ID']; ?>/"><?=$post['Post']['title']?></a></li>
        <?
        }
        ?>  
    </ul>  
    <div style="padding-bottom: 100px;"></div>
</div>