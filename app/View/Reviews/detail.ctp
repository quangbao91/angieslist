<div class="thongtin">
    <? 
    $categorys = $this->requestAction('categorys/index');
    $posts = $this->requestAction('posts/index');
    $id= $post_id['Review']['post_id'];
    ?>
    <div class="info">
        <?
        foreach($posts as $post){
            ?>
        <h4><?=($post['Post']['ID'] == $post_id['Review']['post_id'])? $post['Post']['title']:'';?></h4>   
        <?}?>
        <p class="lienhe address">Categry: 
        <?
        foreach($categorys as $category){
        ?>
        <?=($category['Category']['ID'] == $post_id['Review']['post_id'])? $category['Category']['category_name']:''; ?>
        <?}?>
        </p>
    </div>
    <p><a href="<?php echo $this->webroot; ?>Reviews/review/<?=$id?>">Write A Review</p></a>
    
</div>
 