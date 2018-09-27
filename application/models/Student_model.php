<?php
class Student_model extends CI_Model {

    public $title;
    public $content;
    public $date;

  
    public function getrowbyid($id=0)
    {
            $record = $this->db
                    ->where("id",$id)
                    ->get('student')->row_array();
            // var_dump($record);exit;
            return $record;
    }
    public function getList()
    {
            $records = $this->db
                    ->get('student')->result_array();
            // var_dump($records);exit;
            return $records;
    }

    public function insert($postdata)
    {
        // var_dump($postdata);exit;
            
            $insertArray=[
                "name"=>$postdata["name"],
                "email"=>$postdata["email"],
                "contact"=>$postdata["contact"],
            ];
            $this->db->insert('student', $insertArray);
            $insert_id = $this->db->insert_id();
            // echo $this->db->last_query();exit;
            // echo "enter";exit;
            return  $insert_id;
            
    }

    public function update($postdata)
    {
        // var_dump($postdata);exit;
        $updateArray=[
            "name"=>$postdata["name"],
            "email"=>$postdata["email"],
            "contact"=>$postdata["contact"],
            "modified_at"=>time(),
        ];
        $this->db->where("id",$postdata["id"]);
        $this->db->update('student', $updateArray);
        $afftectedRows = $this->db->affected_rows();
        return $afftectedRows;
    }
    public function delete($id)
    {
        // var_dump($postdata);exit;
            
        $this->db->where("id",$id);
        $this->db->delete('student');
        $afftectedRows = $this->db->affected_rows();
        return $afftectedRows;
            
    }

}