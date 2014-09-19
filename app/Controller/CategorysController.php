<?php

class CategorysController extends AppController {
    function beforeFilter() {
    }
    
    
    function index()
    {
        $this->set('categorys', $this->Category->find('all'));
        
        $categorys = $this->Category->find('all');
        
        if(!empty($this->request->params['requested'])){
            return $categorys;
        }
            
   	    if ($this->request->is('post')) {
            
            $this->Category->create();
            
            if ($this->Category->save($this->request->data )) {
             	$this->set('Error',"0");
                $this->Session->setFlash('Insert finish');
                $this->redirect(array('action' => 'manager'));
                
            } else {
                		$this->Session->setFlash('Data error');
            		}
		}
    }
    function view() {
            $this->set('categorys',$this->Category->find('all'));
   	        
    }

   public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Data null'));
        }
    
        $post = $this->Category->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Data null'));
        }
    
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Category->id = $id;
            //print_r($this->request->data);
            if ($this->Category->save($this->request->data)) {
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
    
        if ($this->Category->delete($id)) {
            $this->Session->setFlash('Category: ' . $id . ' is delete.');
            $this->redirect(array('action' => 'view'));
        }
    }
    function manager() {
            $this->set('categorys',$this->Category->find('all'));
   	        
    }
     
	
}
?>
