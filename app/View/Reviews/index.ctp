<div class="review_page">
<? 
    $categorys = $this->requestAction('categorys/index');
    $posts = $this->requestAction('posts/index');
?>
<h3 class="title">Review</h3>
    
<?php
    foreach ($rws as $rw ){
?>    
    <div class="columns large-8 " >
       <p><b>Review Date:</b><?=$rw['Review']['date']?></p>
        <p><b>Provider Name:</b> <?
        foreach($posts as $post){
            ?>
        <?=($post['Post']['ID'] == $rw['Review']['post_id'])? $post['Post']['title']:'';?> 
        <?}?>
        </p>
        <p><b>Categry:</b> 
        <?
        foreach($categorys as $category){
        ?>
        <?=($category['Category']['ID'] == $rw['Review']['post_id'])? $category['Category']['category_name']:''; ?>
        <?}?></p>
        <p><b>Description of Experience:</b> <?=$rw['Review']['details']?></p>
        <p><b>Provider Response:</b> <?=$rw['Review']['provider']?></p>
    </div>
    <div class="columns large-4 no-padding-right overall_review" >
        <div class="columns small-10 no-padding" >
            <ul>
                <li><b>Overall</b></li>
                <li>Availability</li>
                <li>Office Environment</li>
                <li>Punctuality</li>
                <li>Staff Friendliness</li>
                <li>Bedside Manner</li>
                <li>Communication</li>
                <li>Effectiveness of Treatment</li>
                <li>Billing and Administration</li>                
            </ul>
        </div>
        <div class="columns small-2  " >
            <ul>
                <li><b><?=$rw['Review']['overall']?></b></li>
                <li><?=$rw['Review']['availability']?></li>
                <li><?=$rw['Review']['office']?></li>
                <li><?=$rw['Review']['punctuality']?></li>
                <li><?=$rw['Review']['staff']?></li>
                <li><?=$rw['Review']['bedside']?></li>
                <li><?=$rw['Review']['communication']?></li>
                <li><?=$rw['Review']['treatment']?></li>
                <li><?=$rw['Review']['billing']?></li>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
    <hr />
    <?php } ?> 
</div> 
