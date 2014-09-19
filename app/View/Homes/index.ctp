<div class="home">
    <h2 class="title_cate">Top Categories</h2>
    <?php
    $categorys = $this->requestAction('categorys/index');
    foreach ($categorys as $category ){
    ?>           
        <div class="columns large-4 top_cate no-padding">
            <div class="columns large-2 medium-2 small-2 no-padding-right "><img  src="<?php echo $this->webroot; ?>images/1.png" /></div>
            <div class="columns large-10 medium-10 small-10 no-padding-left"><a href="<?= $this->webroot ?>posts/category/<?=$category['Category']['ID']?>"><?=$category['Category']['category_name']?></a></div>
            <div class="clear"></div>
        </div>      
    <? } ?>  
    <div class="clear"></div>
    <div class="t-button-cate"><a href="<?= $this->webroot ?>categorys/view">View All Categories</a></div>   
</div>