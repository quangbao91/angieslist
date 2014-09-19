<?php

class SearchsController extends AppController {
    
    function beforeFilter(){
        
    }
    
    
    function index() {
        
        if($_GET){
            $name = $_GET['s'];
            $ct = $_GET['ct'];
            
            if($name){
                if($ct){
                    $this->set('posts', $this->Post->find('all', array('conditions'=>array('Post.category_id'=>$ct)) ));
                } else {
                    
                }
            }elseif($ct){
                
            } else {
                $this->Session->setFlash('Data null');
            }
              
        }  
   	 
    }	
}
?>
