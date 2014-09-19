<div class="page_search">
    <?php
    $categorys = $this->requestAction('categorys/index');
    ?>
    <h3 class="title">Search Results for: <?=$name?></h3>
    <?
        foreach($categorys as $category){
        ?>
        <?=($category['Category']['ID'] == $ct )?'<h5 class="title">and category : '.$category['Category']['category_name'].'</h5>':''; ?>
        <?}?>
    <?
    
    if(count($posts)){
        ?>
        <ul class="show_title_post">
            <?php
            foreach ($posts as $post ) {
            ?>
               <li><a href="<?php echo $this->webroot."posts/information/".$post['posts']['ID']; ?>/"><?=$post['posts']['title']?></a></li>
            <?
            }
            ?>  
        </ul> 
        <?php
    } else {
    ?>
    <p class="error">Nothing Found <br />Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
    <?    
    }
    ?>
</div>    