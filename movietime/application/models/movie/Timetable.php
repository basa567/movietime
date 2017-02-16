<?php

class Timetable extends CI_Model {

       public function getTimetable(){
           $this->db->select('*');
           $this->db->from('movie_time'); 
           $this->db->join('movie_hall','movie_time.hall_id=movie_hall.id');        
           return $this->db->get()->result_array();
       }

       public function getHallName($hall){
           $where = "name='$hall'";
           $this->db->select('*');
           $this->db->from('movie_hall')->where($where);         
           return $this->db->get()->result_array();
       }

       public function checkUserExist($user,$pwd){
            $where = "username = '$user' AND password = '$pwd' ";
            $this->db->select("*");
            $this->db->from('user')->where($where);
            return $this->db->get()->result_array();
       }

       public function saveUserDetail($data){
          $result =  $this->db->insert('user_detail',$data);
          if ($this->db->affected_rows() > 0)return true;
		  else return false;
       }

       public function getUserDetail($userid){
           $where = "user_id=$userid AND status = 'unconfirmed' ";
           $this->db->select('*');
           $this->db->from('user_detail')->where($where);
           return $this->db->get()->result_array();
       }

       public function getOneUser($id){
           $where = "id=$id AND status = 'unconfirmed' ";
           $this->db->select('*');
           $this->db->from('user_detail')->where($where);
           return $this->db->get()->result_array();
       }
       public function editUserDetail($data){ 
         $id = $data['id'];
         $price = $data['price'];
         $total_price = $data['total_price'];
         $qty = $data['qty'];       
         $this->db->where('id', $id);
         $this->db->update('user_detail', array('price' => $price,'total_price'=>$total_price,'qty'=>$qty));
         if ($this->db->affected_rows() > 0)return true;
		 else return false;
       }
        public function deleteUserDetail($id){
           $this->db->where('id',$id);
		   $this->db->delete('user_detail');
           if ($this->db->affected_rows() > 0)return true;
		   else return false;           
       }

       public function confirmUserDetail($id){
         $this->db->where('id', $id);
         $this->db->update('user_detail', array('status' =>"confirmed"));
         if ($this->db->affected_rows() > 0)return true;
		 else return false; 
       }

}