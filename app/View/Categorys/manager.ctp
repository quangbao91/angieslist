<h3 class="title">MANAGER NEWS</h3>

<div class="columns large-2">
STT
</div>
<div class="columns large-6">
Category
</div>
<div class="columns large-4">
Action
</div>
<div class="clear"></div>
   
    <?php
    $count = 1;
    foreach ($categorys as $category )
       
    {
      
    ?>
            <div class="columns large-2"><?=$count?></div>
            <div class="columns large-6"><?=$category['Category']['category_name']?></div>
            <div class="columns large-4">
                <a href="<?= $this->webroot ?>categorys/view">View</a> <span> | </span>
                <a href="<?= $this->webroot ?>categorys/edit/<?=$category['Category']['ID']?>">Edit</a> <span> | </span>
                <a href="<?= $this->webroot ?>categorys/delete/<?=$category['Category']['ID']?>">Delete</a>
            </div>
            <div class="clear"></div>
    <?
        $count+=1;
    }
    ?>    