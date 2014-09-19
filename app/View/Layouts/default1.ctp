<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine" />
	<title>
		Angie's List | <?php echo $title_for_layout; ?>
	</title>
    
    <?php
    echo $this->Html->css('style.css');
    echo $this->Html->css('foundation.min.css');
    echo $this->Html->css('jquery.rating.css');
    echo $this->Html->script('jquery.js');
    echo $this->Html->script('jquery.rating.js');
    echo $this->Html->script('foundation.min.js');
    echo $this->Html->script('modernizr.js');
    echo $this->Html->script('foundation.dropdown.js');
    echo $this->Html->script('foundation.topbar.js');
   
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
    ?>  
<script type="text/javascript">
$(document).ready(function(){
    
    $('#tab-Testing form').click(function(){
        var countRank = 0;
        var pid = $('.product_id').attr('value');
        var user_id = $('.user_id').attr('value');
        $('input',this).each(function(){
           if(this.checked){ 
        	    countRank = $(this).attr('value');
           	};
           		
        	});
         alert(countRank + pid + user_id) ;
        $.ajax({
          url: '<?php echo $this->webroot; ?>/ranks?countRank='+ countRank + '&pid='+ pid + '&user_id='+ user_id,
          success: function(data) {
            //$('.rank-d').html(data);
          }
        }); 
    });
});
</script>
<script>
jQuery(document).ready(function($){
 $('.hover-star').rating({
  focus: function(value, link){
    var tip = $('#hover-test');
    tip[0].data = tip[0].data || tip.html();
    tip.html(link.title || 'value: '+value);
  },
  blur: function(value, link){
    var tip = $('#hover-test');
    $('#hover-test').html(tip[0].data || '');
  }
 });
});
</script>

</head>

<body>

<div id="wrapp" class="row">
    <div id="header">

        <div id="logo">
            <div class="large-6 columns"><img style="display: none;" src="<?php echo $this->webroot; ?>images/logo.png" /><div class="slogan">Angie's List</div></div>
            
            <div class="large-6 columns right_login">
                <b>Welcome:</b>
                <?
                $loged = $this->Session->read('loged');
                $name = $loged['Register']['name'];
                $check_admin = $loged['Register']['check_admin'];
                
                if($name){
                    echo $name;
                
                ?>
                    &nbsp;<span>&nbsp; | &nbsp;</span>
                    <span><a href="<?php echo $this->webroot; ?>registers/logout">Log out</a></span>
                <?} else { ?>
                    Customers&nbsp;<span>&nbsp;&nbsp;</span>
                    <span><a href="<?php echo $this->webroot; ?>registers/login">Login</a></span> <span>&nbsp; | &nbsp;</span>
                    <span><a href="<?php echo $this->webroot; ?>registers">Register</a></span>
                <?}?>
                
            </div>
            
            <div class="clear"></div>
        </div>
        <div id="main_menu">
            <nav class="top-bar"   data-topbar="" > 
                <ul class="title-area"> 
                <li class="name"><h1></h1></li>
                    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li> 
                </ul> 
                <section class="top-bar-section"> 
                <ul> 
                <li><a href="<?php echo $this->webroot; ?>">Home</a></li>               
                    <?php 
                    $category_db = $this->requestAction('categorys/index');
                    foreach($category_db as $ct)
                    {
                        
                        ?>
                        <li><a href="<?php echo $this->webroot."posts/category/".$ct['Category']['ID']; ?>"><?php echo $ct['Category']['category_name']; ?></a></li>
                        <?php
                    }
                    ?>
                </ul>            
                </section> 
                 
            </nav>
        </div>
        <div class="clear"></div>
        
        <div id="search">
            <?
                $categorys = $this->requestAction('categorys/index');
            ?>
            <form name="search" method="GET" action="<?php echo $this->webroot; ?>posts/search">
                <div class="large-5 columns"><input  type="text" name="s" value="Search..." onblur="if (this.value == '') {this.value = 'Search...';}" onfocus="if (this.value == 'Search...') {this.value = '';}" /></div>
                <div class="large-5 columns"><select id="PostCategoryId" name="ct">
                    <option value="">Category</option>
                <?
                    foreach($categorys as $ct){
                ?>        
                        <option value="<?= $ct['Category']['ID']?>"><?= $ct['Category']['category_name']?></option>
                <?
                     }
                ?>
                </select>
                </div>
                <div class="large-2 columns"><input type="submit" value="Search" /></div>
                
            </form>
            <div class="clear"></div>
        </div>
        
    </div>
    
    <div id="content">
        <div id="main-content" class="large-8 columns no-padding-left">
            <div class="bg_content">
                <?php  echo $this->Session->flash(); ?>
                <?php  echo $this->fetch('content'); ?>
                
            </div>
        </div>
        <div id="sidebar" class="large-4 columns no-padding">
            
            <?
            if($name){
            ?>
            <div class="sidebar-box">
                <h3 class="title_sidebar">Manager</h3>
                <ul>
                    <? if($check_admin == '1'){ ?>
                    <li><a href="<?php echo $this->webroot; ?>registers/view">Account</a></li>
                    <li><a href="<?php echo $this->webroot; ?>categorys/manager">Manager category</a></li>
                    <li><a href="<?php echo $this->webroot; ?>categorys">Insert category</a></li>
                    <li><a href="<?php echo $this->webroot; ?>posts/manager">Manager news</a></li>
                    <li><a href="<?php echo $this->webroot; ?>posts">Insert news</a></li>
                    <li><a href="<?php echo $this->webroot; ?>reviews/view">Review</a></li>
                     <?}
                     elseif($check_admin == '2') {?>
                     <li><a href="<?php echo $this->webroot; ?>reviews/">Review</a></li>   
                     <?}
                     ?>
                </ul>  
            </div>
            <?}?>
            <div class="sidebar-box">
                <?php echo $this->element('all_categorys');?>           
            </div>
            <div class="sidebar-box">
                <?php echo $this->element('recentposts');?>           
            </div>
        </div>
        
        <div class="clear"></div>
    </div>
    
    <div id="footer" class="row">
        &copy; Copyright 2013 - <? echo date('Y')?>, Angie's List.  All Rights Reserved.
    </div>
    <script>
   $(document).foundation();
</script>
</div><!--end #wrapp-->

</body>
</html>