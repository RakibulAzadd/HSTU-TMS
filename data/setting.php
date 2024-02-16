<?php 

function getSetting($conn){
   $sql = "SELECT * FROM setting";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() == 1) {
     $settings = $stmt->fetch();
     return $settings;
   }else {
    return 0;
   }
}

// all Upcoming Bus 

function getUpcomingBus($conn){
  $sql = "SELECT * FROM upcoming_bus";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() == 1) {
    $upcoming = $stmt->fetch();
    return $upcoming;
  }else {
   return 0;
  }
}

//upcoming bus by id;
function getTeacherById($id, $conn){
 $sql = "SELECT * FROM upcoming_bus
         WHERE id=?";
 $stmt = $conn->prepare($sql);
 $stmt->execute([$id]);

 if ($stmt->rowCount() == 1) {
   $bus = $stmt->fetch();
   return $bus;
 }else {
  return 0;
 }
}

// DELETE
function removeUpcomingBus($id, $conn){
 $sql  = "DELETE FROM upcoming_bus
         WHERE id=?";
 $stmt = $conn->prepare($sql);
 $re   = $stmt->execute([$id]);
 if ($re) {
   return 1;
 }else {
  return 0;
 }
}
