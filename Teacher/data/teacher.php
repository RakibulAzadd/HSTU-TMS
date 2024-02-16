<?php  

// Get Teacher by ID
function getTeacherById($teacher_id, $conn){
   $sql = "SELECT * FROM teachers
           WHERE teacher_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$teacher_id]);

   if ($stmt->rowCount() == 1) {
     $teacher = $stmt->fetch();
     return $teacher;
   }else {
    return 0;
   }
}

// All Teachers 
function getAllTeachers($conn){
   $sql = "SELECT * FROM teachers";
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
function unameIsUnique($uname, $conn, $teacher_id=0){
   $sql = "SELECT username, teacher_id FROM teachers
           WHERE username=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$uname]);
   
   if ($teacher_id == 0) {
     if ($stmt->rowCount() >= 1) {
       return 0;
     }else {
      return 1;
     }
   }else {
    if ($stmt->rowCount() >= 1) {
       $teacher = $stmt->fetch();
       if ($teacher['teacher_id'] == $teacher_id) {
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
function removeTeacher($id, $conn){
   $sql  = "DELETE FROM teachers
           WHERE teacher_id=?";
   $stmt = $conn->prepare($sql);
   $re   = $stmt->execute([$id]);
   if ($re) {
     return 1;
   }else {
    return 0;
   }
}

// Search 
function searchTeachers($key, $conn){
   $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1',$key);

   $sql = "SELECT * FROM teachers
           WHERE teacher_id LIKE ? 
           OR fname LIKE ?
           OR username LIKE ?
           OR phone_number LIKE ?
           OR email_address LIKE ?
           OR address LIKE ?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$key, $key, $key, $key, $key,$key]);

   if ($stmt->rowCount() == 1) {
     $teachers = $stmt->fetchAll();
     return $teachers;
   }else {
    return 0;
   }
}

// password check
function teacherPasswordVerify($teacher_pass, $conn, $teacher_id){
  $sql = "SELECT * FROM teachers
          WHERE teacher_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$teacher_id]);

  if ($stmt->rowCount() == 1) {
    $teacher = $stmt->fetch();
    $pass  = $teacher['password'];

    if (password_verify($teacher_pass, $pass)) {
       return 1;
    }else {
       return 0;
    }
  }else {
   return 0;
  }
}


// //Get Teacher by ID
// function getTeacherById($teacher_id, $conn){
//   $sql = "SELECT * FROM teachers
//           WHERE teacher_id=?";
//   $stmt = $conn->prepare($sql);
//   $stmt->execute([$teacher_id]);

//   if ($stmt->rowCount() == 1) {
//     $teacher = $stmt->fetch();
//     return $teacher;
//   }else {
//    return 0;
//   }
// }
 
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