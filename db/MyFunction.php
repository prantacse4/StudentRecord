<?php
include 'connection.php';
class MyFunction extends connection{

    public function getRecord()
    {
        $sql = 'SELECT * FROM records';
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function findRecord($id)
    {
        $sql = 'SELECT * FROM records where id=? limit 1';
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($id));
        $result = $stmt->FetchAll(PDO::FETCH_OBJ);
        return $result;
    }
     
    public function addRecord($name, $phone, $email, $university)
    {
        $sql = 'INSERT into records(name, phone,email, university) VALUES(?,?,?,?)';
        $stmt = $this->db->prepare($sql);
        if ($stmt->execute(array($name, $phone, $email, $university))) {
            return true;            
        }
        return false;
       
    }
    public function updateRecord($name, $phone, $email, $university,  $id)
    {
        $sql = 'UPDATE records set name=?, phone=?, email=?, university =? where id=?';
        $stmt = $this->db->prepare($sql);
        if ($stmt->execute(array($name, $phone, $email, $university, $id))) {
            return true;            
        }
        return false;
       
    }

    public function deleteRecord( $id)
    {
        $sql = 'DELETE from records where id=?';
        $stmt = $this->db->prepare($sql);
        if ($stmt->execute(array($id))) {
            return true;            
        }
        return false;
       
    }

}


?>