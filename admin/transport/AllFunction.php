<?php 


// All special campus to town transport
function getAllTransportSpecialCampus($conn){
  $sql = "SELECT * FROM t_special_campus";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $transport = $stmt->fetchAll();
    return $transport;
  }else {
    return 0;
  }
}

// All special town to campus transport



// DELETE special campus to town
function removeTransportSpecialCampus($id, $conn){
  $sql  = "DELETE FROM t_special_campus
          WHERE ID=?";
  $stmt = $conn->prepare($sql);
  $re   = $stmt->execute([$id]);
  if ($re) {
    return 1;
  }else {
   return 0;
  }
}






// Get Transport special campus to town By Id 
function getTransportSpecialCampusById($id, $conn){
  $sql = "SELECT * FROM t_special_campus
          WHERE ID=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if ($stmt->rowCount() == 1) {
    $transport = $stmt->fetch();
    return $transport;
  }else {
   return 0;
  }
}
// Get Transport special campus to town By Id 
function getTransportSpecialTownById($id, $conn){
  $sql = "SELECT * FROM t_special_town
          WHERE ID=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);

  if ($stmt->rowCount() == 1) {
    $transport = $stmt->fetch();
    return $transport;
  }else {
   return 0;
  }
}

// Check if the username Unique
function unameIsUnique($uname, $conn, $student_id=0){
   $sql = "SELECT username, student_id FROM students
           WHERE username=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$uname]);
   
   if ($student_id == 0) {
     if ($stmt->rowCount() >= 1) {
       return 0;
     }else {
      return 1;
     }
   }else {
    if ($stmt->rowCount() >= 1) {
       $student = $stmt->fetch();
       if ($student['student_id'] == $student_id) {
         return 1;
       }else {
        return 0;
      }
     }else {
      return 1;
     }
   }
   
}


// Search 
function searchStudents($key, $conn){
   $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1',$key);
   $sql = "SELECT * FROM students
           WHERE student_id LIKE ? 
           OR fname LIKE ?
           OR address LIKE ?
           OR email_address LIKE ?
           OR sid LIKE ?
           OR phone_number LIKE ?
           OR username LIKE ?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$key, $key, $key, $key, $key, $key, $key]);

   if ($stmt->rowCount() >= 1) {
     $students = $stmt->fetchAll();
     return $students;
   }else {
    return 0;
   }
}


//search 
function getSearchTransport($key, $conn){
  $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1',$key);
  $sql = "SELECT * FROM  t_special_campus
          WHERE ID LIKE ? 
          OR t_name LIKE ?
          OR time LIKE ?
          OR from_d LIKE ?
          OR to_d LIKE ?
          OR t_no LIKE ?
          OR day LIKE ?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$key, $key, $key, $key, $key, $key, $key]);

  if ($stmt->rowCount() >= 1) {
    $t = $stmt->fetchAll();
    return $t;
  }else {
   return 0;
  }
}