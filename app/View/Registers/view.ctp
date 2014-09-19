<h3 class="title">MANAGER USER</h3>
<div class="columns large-2">STT</div>
<div class="columns large-3">Name</div>
<div class="columns large-2">Sex</div>
<div class="columns large-3">Email</div>
<div class="columns large-2">Action</div>
<div class="clear"></div>   
<?php
    $count = 1;
foreach ($users as $user )
   
{
  
?>
    <div class="columns large-2"><?=$count?></div>
    <div class="columns large-3"><?=$user['Register']['name']?></div>
    <div class="columns large-2"><?=$user['Register']['sex']?></div>
    <div class="columns large-3"><?=$user['Register']['email']?></div>
    <div class="columns large-2">
        <a href="<?= $this->webroot ?>registers/edit/<?=$user['Register']['ID']?>">Edit</a> <span> | </span>
        <a href="<?= $this->webroot ?>registers/delete/<?=$user['Register']['ID']?>">Delete</a>
    </div>
<?
    $count+=1;
}
?>    