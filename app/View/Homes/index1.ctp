<div class="home">
        <?php
        $posts = $this->requestAction('posts/lastposts1/10');
        $categorys = $this->requestAction('categorys/index');
        $count = 1;
        foreach ($posts as $post ) {
            $content=$post['Post']['content'];
            $color = ($count%2 == 0)?'#ffffff':'#F4F6FA';
            
        ?>
           <div  style="background-color: <?=$color?>;padding: 10px;">
                <h3 class="list-title"><a href="<?php echo $this->webroot."posts/information/".$post['Post']['ID']; ?>/"><?=$post['Post']['title']?></a></h3>
                <span class="date-picker-field"> Date :<?=$post['Post']['created']?></span>
                <p class="lienhe address">Categry: 
                <?
                foreach($categorys as $category){
                ?>
                <?=($category['Category']['ID'] == $post['Post']['category_id'])? $category['Category']['category_name']:''; ?>
                <?}?>
                </p>  
                <p><?php   
                    echo substr($content, 0, 200);
                    if (strlen($content) > 200) echo " ..."; 
                    ?>
                </p>
                <div class="read_more"><a href="<?php echo $this->webroot."posts/information/".$post['Post']['ID']; ?>/">Read more</a></div>
            </div>
        <?
        
            $count+=1;
        }
        ?>    
</div>