<?php

class RegistersController extends AppController {
    function beforeFilter() {
    }
    function index() {
            
   	    if ($this->request->is('post')) {
            $pass = md5($_POST['data']['Register']['password']);
            $this->request->data['Register']['password'] = $pass;              
            $this->Register->create();
            
            if ($this->Register->save($this->request->data )) {
             	$this->set('Error',"0");
                $this->Session->setFlash('Register finish');
                $this->redirect(array('action' => 'login'));
                
            } else {
        		$this->Session->setFlash('Error data');
    		}
		}
    }
    function view() {
            $this->set('users',$this->Register->find('all'));
   	        
    }
   
   public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Data null'));
        }
    
        $post = $this->Register->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Data null'));
        }
    
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Register->id = $id;
            if ($this->Register->save($this->request->data)) {
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
    
        if ($this->Register->delete($id)) {
            $this->Session->setFlash('Account: ' . $id . ' is delete.');
            $this->redirect(array('action' => 'view'));
        }
    }
     public function login() {
        if ($this->request->is('post')) {
            
            $pass = md5($_POST['data']['Register']['password']);
            $email=$_POST['data']['Register']['email'];
            //print_r($this->request->data['Register']['password']);
       
            $info = $this->Register->find('first',array('conditions'=>array('Register.email'=>$email,'Register.password'=>$pass)));
            $count=count($info);

            if($count)
            {
                    $this->Session->write('loged', $info);
                    
                	$this->Session->write('islogin', $email);
                    
                    $name = $this->get_name($email);
                    $this->Session->write('namelogin', $name);
                    
                    $this->redirect(array('controller'=>'homes', 'action' => 'index'));
            }
            else {
                $this->Session->setFlash('False username or password');
            }
         
		}
     }
     public function logout()
     {
        $this->Session->delete('loged');
        $this->redirect(array('action' => 'login'));
        
     }
     
     public function check_admin($id){
        if($id == 1){
            return 'admin';
        }
        
     }
     
     function get_name($email){
        $result = $this->Register->find('first',array('fields'=>array('Register.name'),
                              'conditions'=>array('Register.email'=>$email)));
        
        return $result['Register']['name'];
        
     }
     
     public function information_user($id){
        $user = $this->Register->find('first',array('conditions'=>array('Register.ID'=>$id)) );
        
        if(!empty($this->request->params['requested'])){
            return $user;
        }
     }
     
     
     
     
     
	
}
?>
