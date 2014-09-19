<div class="cate_view">
    <h3 class="title">All Categories</h3>
       
    <?php
        $posts = $this->requestAction('posts/lastposts1/10');
    ?>
    <ul class="small-block-grid-3">
        <?
        foreach ($categorys as $category ){
        ?>           
            <li>
                <h5 class="title_cate"><a href="<?= $this->webroot ?>posts/category/<?=$category['Category']['ID']?>"><?=$category['Category']['category_name']?></a></h5>
                <?php 
                foreach ($posts as $post ){
                if($category['Category']['ID'] == $post['Post']['category_id']){
                    ?>
                    <a class="sub_cate" href="<?php echo $this->webroot."posts/information/".$post['Post']['ID']; ?>/"><?=$post['Post']['title']?></a>
                    <?
                }}?>
            </li>
            
            <?}?>  
    </ul>  
</div>