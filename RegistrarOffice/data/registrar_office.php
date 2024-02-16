<?php  

// Get r_user by ID
function getR_usersById($r_user_id, $conn){
   $sql = "SELECT * FROM registrar_office
           WHERE r_user_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$r_user_id]);

   if ($stmt->rowCount() == 1) {
     $teacher = $stmt->fetch();
     return $teacher;
   }else {
    return 0;
   }
}

// All r_users 
function getAllR_users($conn){
   $sql = "SELECT * FROM registrar_office";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $teachers = $stmt->fetchAll();
     return $teachers;
   }else {
   	return 0;
   }
}

// Check if the username Unique
function unameIsUnique($uname, $conn, $r_user_id=0){
   $sql = "SELECT username, r_user_id FROM registrar_office
           WHERE username=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$uname]);
   
   if ($r_user_id == 0) {
     if ($stmt->rowCount() >= 1) {
       return 0;
     }else {
      return 1;
     }
   }else {
    if ($stmt->rowCount() == 1) {
       $r_user = $stmt->fetch();
       if ($r_user['r_user_id'] == $r_user_id) {
         return 1;
       }else {
        return 0;
      }
     }else {
      return 1;
     }
   }
   
}

// DELETE
function removeRUser($id, $conn){
   $sql  = "DELETE FROM registrar_office
           WHERE r_user_id=?";
   $stmt = $conn->prepare($sql);
   $re   = $stmt->execute([$id]);
   if ($re) {
     return 1;
   }else {
    return 0;
   }
}


//password verify
 
function employeePasswordVerify($e_pass, $conn, $e_id){
  $sql = "SELECT * FROM registrar_office
          WHERE r_user_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$e_id]);

  if ($stmt->rowCount() == 1) {
    $employee = $stmt->fetch();
    $pass  = $employee['password'];

    if (password_verify($e_pass, $pass)) {
       return 1;
    }else {
       return 0;
    }
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

//requisition by id
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


function getRequisitionByUserName($u_name,$conn){
  $sql = "SELECT * FROM requisition
          WHERE user_name=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$u_name]);

  if ($stmt->rowCount() >= 1) {
    $requisition = $stmt->fetch();
    return $requisition;
  }else {
   return 0;
  }
}