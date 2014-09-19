<h3 class="title">Review</h3>
<div class="columns large-2 " >Date</div>
<div class="columns large-6 " >Provider</div>
<div class="columns large-2 " >Status</div>
<div class="columns large-2 " >Action</div>
<div class="clear"></div>
<?php
     
foreach ($rvs as $rv ){
      ?>
<div class="columns large-2 " >
   <?=$rv['Review']['date']?>
</div>
<div class="columns large-6 " >
    <a  title="<?=$rv['Review']['details']?>"><?=$rv['Review']['provider']?></a>
</div>
<div class="columns large-2 " >
    <?=$rv['Review']['status']?>
</div>
<div class="columns large-2 " >
    <a href="<?= $this->webroot ?>reviews/edit/<?=$rv['Review']['ID']?>">Edit</a> <span> | </span>
    <a href="<?= $this->webroot ?>reviews/delete/<?=$rv['Review']['ID']?>">Delete</a>
</div>
<hr />
<div class="clear"></div>
<?php }  
    
  
