<?php 

// All requisition
function getAllRequisition($conn){
   $sql = "SELECT * FROM requisition";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $all_requisition = $stmt->fetchAll();
     return $all_requisition;
   }else {
   	return 0;
   }
}

// DELETE
function removeRequisition($id, $conn){
   $sql  = "DELETE FROM requisition
           WHERE r_id=?";
   $stmt = $conn->prepare($sql);
   $re   = $stmt->execute([$id]);
   if ($re) {
     return 1;
   }else {
    return 0;
   }
}

// Get requisition By Id 
function getRequisitionById($id, $conn){
    $sql = "SELECT * FROM requisition
            WHERE r_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
 
    if ($stmt->rowCount() == 1) {
      $requisition = $stmt->fetch();
      return $requisition;
    }else {
     return 0;
    }
 }


// Search 
function searchRequisition($key, $conn){
   $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1',$key);
   $sql = "SELECT * FROM requisition
           WHERE r_id LIKE ? 
           OR name LIKE ?
           OR d_name LIKE ?
           OR f_name LIKE ?
           OR email_address LIKE ?
           OR title_name LIKE ?
           OR phone_number LIKE ?
           OR destination LIKE ?
           OR driver_name LIKE ?
           OR d_name LIKE ?
           OR transport_no LIKE ?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$key, $key, $key, $key, $key, $key, $key,$key,$key,$key,$key]);

   if ($stmt->rowCount() >= 1) {
     $se = $stmt->fetchAll();
     return $se;
   }else {
    return 0;
   }
}