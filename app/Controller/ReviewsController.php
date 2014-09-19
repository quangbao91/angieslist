<?php

class ReviewsController extends AppController {
    function beforeFilter() {
    }
    function review($id = null) {
        //$this->set('post_id', $this->Review->find('first', array('conditions'=>array('Review.post_id'=>$id)) ));
        $this->set('post_id',$id);
   	    if ($this->request->is('post')) {
   	        
            $this->Review->create();
            
            if ($this->Review->save($this->request->data )) {
             	$this->set('Error',"0");
                $this->Session->setFlash('Review finish');
                $this->redirect(array('action' => 'index'));
                
            } else {
        		$this->Session->setFlash('Error data');
    		}
		}
        
    }
    function index() {
            $id = $this->abc();
            $this->set('rws',$this->Review->find('all',array('fields'=>array(
            'Review.user_id','Review.overall','Review.provider',
            'Review.details','Review.date','Review.ID','Review.status',
            'Review.post_id','Review.availability','Review.office'
            ,'Review.punctuality','Review.staff','Review.bedside'
            ,'Review.communication','Review.treatment','Review.billing'),
                             'conditions'=>array('Review.user_id'=>$id,'Review.status'=>'Aprroved')
       )));
    }
   
   public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Data null'));
        }
    
        $post = $this->Review->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Data null'));
        }
    
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Review->id = $id;
            if ($this->Review->save($this->request->data)) {
                $this->Session->setFlash('Update finish');
                $this->redirect(array('action' => 'view'));
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
    
        if ($this->Review->delete($id)) {
            $this->Session->setFlash('Account: ' . $id . ' is delete.');
            $this->redirect(array('action' => 'view'));
        }
    }
    function detail($id = null) {
            $this->set('post_id', $this->Review->find('first', array('conditions'=>array('Review.post_id'=>$id)) ));
            $this->set('review_id', $this->Review->find('first', array('conditions'=>array('Review.ID'=>$id)) ));
    }
     function view() {
         
         $this->set('rvs',$this->Review->find('all'));
   	        
    }
}
?>
