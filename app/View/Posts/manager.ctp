<h3 class="title">MANAGER NEWS</h3>
<div class="columns large-1">STT</div>
<div class="columns large-3">Title</div>
<div class="columns large-6">Content</div>
<div class="columns large-2">Action</div>
<div class="clear"></div>
    <?php
    $count = 1;
    foreach ($posts as $post )
    {
      $content=$post['Post']['content'];
    ?>
            <div class="columns large-1"><?=$count?></div>
            <div class="columns large-3"><?=$post['Post']['title']?></div>
            <div class="columns large-6">
                <?php   
                    echo substr($content, 0, 50);
                    if (strlen($content) > 50) echo " ..."; 
                ?>
            </div>
            <div class="columns large-2">
                <a href="<?= $this->webroot ?>posts/edit/<?=$post['Post']['ID']?>">Edit</a> <span> | </span>
                <a href="<?= $this->webroot ?>posts/delete/<?=$post['Post']['ID']?>">Delete</a>
            </div>
            <div class="clear"></div>
    <?
        $count+=1;
    }
    ?>    
    