<?php
    $categorys = $this->requestAction('categorys/index/sort:created/direction:desc/limit:5');
    echo '<h3 class="title_sidebar">Category</h3>';
    echo "<ul>";
    //print_r($categorys);exit;
    foreach($categorys as $category):
        echo "<li>";
        echo $this->Html->link($category['Category']['category_name'], array('controller' => 'Posts', 'action' => 'category', $category['Category']['ID']));
        echo "</li>";
    endforeach;
    echo "</ul>"
?>