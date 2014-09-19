<?php
    $posts = $this->requestAction('posts/lastposts/5');
    echo '<h3 class="title_sidebar">Recent Posts</h3>';
    echo "<ul>";
    foreach($posts as $post):
        echo "<li>";
        echo $this->Html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'information', $post['Post']['ID']));
        echo "</li>";
    endforeach;
    echo "</ul>";
?>