<?php

class PostsController extends AppController {
    
    var $helpers = array('Rating');
    function add() {
      if (!empty($this->data)) {
        $this->Movie->create();
        if ($this->Movie->save($this->data)) {
            $this->Session->setFlash(__('The movie has been saved', true));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The movie could not be saved. Please, try again.', true));
        }
      }
      $ratings = $this->Movie->Rating->find('list', array(
        'order' => array('Rating.rating_order'))
      );
      $this->set(compact('ratings', 'genres'));
    }
    
    function beforeFilter(){
        
    }
    
    
    function index() {
        $this->Post->recursive = 0;
        $this->set('posts', $this->paginate());
        $posts = $this->Post->find('all');
        
        if(!empty($this->request->params['requested'])){
            return $posts;
        }
                
   	    if ($this->request->is('post')) {
            
            $this->Post->create();
            //$tmp_images = $this->request->data['Post']['images'];
            
            //$this->request->data['Post']['images'] = '';
            
            if ($this->Post->save($this->request->data )) {
             	$this->set('Error',"0");
                /*
                $this->request->data['Post']['images'] = $tmp_images;
                
                if($this->data['Post']['images']['name']!=''){
                    $name=$this->data['Post']['images']['name'];
                    $tmp_name=$this->data['Post']['images']['tmp_name'];
                    
                    $newfile = 'files/uploads/'.$name;
                    move_uploaded_file($tmp_name, $newfile);
                    $id = mysql_insert_id();
                    $this->Post->query("update posts set images = '$name' where ID = '$id'");
                    
                }*/
                $this->Session->setFlash('Insert finish');
                
                $this->redirect(array('action' => 'manager'));
                
            } else {
                $this->Session->setFlash('Error data');
  		    }
		}
        
    }
    
    function category($id = null) {
            $this->set('posts', $this->Post->find('all', array('conditions'=>array('Post.category_id'=>$id)) ));
            $this->set('id',$id);
    }
    
    function information($id = null) {
            $this->set('post', $this->Post->find('first', array('conditions'=>array('Post.ID'=>$id)) ));
    }
    
    function manager() {
            $this->set('posts',$this->Post->find('all'));
   	        
    }
    
    function search(){
        //print_r($_GET);
        if($_GET){
            $name = (isset($_GET['s']))?$_GET['s']:'';
            $ct = (isset($_GET['ct']))?$_GET['ct']:'';
            
            $name = ($name == 'Search...')?'':$name;
            $this->set('ct',$ct);
            $this->set('name',$name);
            if($name){
                if($ct){
                    $rows = $this->Post->query("select * from posts where category_id = '$ct' and title like '%$name%' order by created DESC");
                } else {
                    $rows = $this->Post->query("select * from posts where title like '%$name%' order by created DESC");
                }
                $this->set('posts',$rows);
            }elseif($ct){
                $rows = $this->Post->query("select * from posts where category_id = '$ct' order by created DESC");
                $this->set('posts',$rows);
            } else {
               // $this->Session->setFlash('Null');
               $rows = $this->Post->query("select * from posts order by created DESC");
               $this->set('posts',$rows);
            }
              
        }
    }
   
   public function edit($id = null) {
        
        if (!$id) {
            throw new NotFoundException(__('Data null'));
        }
    
        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Data null'));
        }
        
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Post->id = $id;
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('Update finish');
                $this->redirect(array('action' => 'manager'));
            } else {
                $this->Session->setFlash('Update error');
            }
        }
    
        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }
   
   public function delete($id) {
        if (!$this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
    
        if ($this->Post->delete($id)) {
            $this->Session->setFlash('Post: ' . $id . ' is delete.');
            $this->redirect(array('action' => 'manager'));
        }
    }
    public function lastposts($limit=5){
	/* We retrieve only the required fields, and configure the query. */
    	$posts = $this->Post->find('all', array('fields'=>array('Post.ID', 'Post.title', 'Post.created'),
    							   'recursive'=>0,
    							   'order'=>array('Post.ID desc'),
    							   'limit'=>$limit));
     
    	if(isset($this->params['requested']))
    	{
    		return $posts;
    	}
     
    	$this->set('lastposts', $posts);
    }
    public function lastposts1($limit=5){
	/* We retrieve only the required fields, and configure the query. */
    	$posts = $this->Post->find('all', array('fields'=>array('Post.ID', 'Post.title', 'Post.created', 'Post.category_id', 'Post.content', 'Post.user_id'),
    							   'recursive'=>0,
    							   'order'=>array('Post.ID desc'),
    							   'limit'=>$limit)
                                   );
     
    	if(isset($this->params['requested']))
    	{
    		return $posts;
    	}
     
    	$this->set('lastposts1', $posts);
    }
     
	
}
?>
