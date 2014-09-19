<?php

class RanksController extends AppController {
    function index() {

            $countRank = $_GET['countRank'];
            $pid=$_GET['pid'];
            $user_id=$_GET['user_id'];

            $this->Rank->query("INSERT INTO ranks(user_id,post_id,point) VALUES ('$user_id','$pid','$countRank')");
            $rows = $this->Rank->query("SELECT sum(point) FROM ranks WHERE post_id='$pid'");
            $this->set('ranks',$rows);
            $this->redirect(array('controller'=>'homes', 'action' => 'index'));
         
     }
     
	
}
?>
