<?php
//1-تغيير اسم المستخدم 
//2- فكرة المقترحات والشكاوي
//3-تغيير الايميل
include("config.php");
function addDr($name ,$serviceNum ,$email ){
    global $connect;
    $officeID = getOfficeInfoBySerivce($serviceNum)['office_id'];//take officeID from service number 
    if($officeID){
      $connect->query("INSERT INTO `doctors` (`Dr_id`, `Dr_name`,`email`,`O_id` ) VALUES (NULL, '$name','$email','$officeID' );");
      return True;
    }else return False;

} 
//i add office change
//اذا ضفنا الاوفيس هنا ممكن يطلعله له غلط لو كان الاوفيس مب موجود 
function editDr($drID ,$name ,$officeID ,$email){
    global $connect;
    $connect->query("UPDATE `doctors` SET `Dr_name` = '$name', `O_id` = '$officeID',`email` = '$email' WHERE `doctors`.`Dr_id` = $drID;");
    
}
function deleteDr($drID){
    global $connect;
    $connect->query("DELETE FROM `doctors` WHERE `doctors`.`Dr_id` = $drID");
    
}

//Office
function addOffice($officeName ,$officeNum ,$serviceNum, $floorNum ){
    global $connect;
    $connect->query("INSERT INTO `office` (`office_id`, `office_name`, `office_num`, `service_num`, `Floor_num` ) VALUES (NULL, '$officeName','$officeNum', '$serviceNum','$floorNum');");
    
}
function editOffice($officeID,$officeName ,$officeNum , $floorNum  ){
    global $connect;
    $connect->query("UPDATE `office` SET `office_name` = '$officeName', `office_num` = '$officeNum', `Floor_num` = '$floorNum' WHERE `office`.`office_id` = $officeID;");
    
}
function deleteOffice($officeID){
    global $connect;
    $connect->query("DELETE FROM `office` WHERE `office_id` = $officeID;");
    
}
//manager (1-pass) << (2-id) 
function chanegPass($newPass){
    global $connect;
    $connect->query("UPDATE `manager` SET `login_pass`= '$newPass' WHERE manager_id=1");
//$connect->query("UPDATE `manager` SET `login_pass`= '$NEWPASS' WHERE manager_id=1");

}
function changeUserName($newUserName){
    global $connect;
    $connect->query("UPDATE `manager` SET `login_name`= '$newUserName' WHERE `manager`.`manager_id`=1");
    //UPDATE `manager` SET `login_name` = 'opiy\r\n' WHERE `manager`.`manager_id` = 1;

}
// public int foo(){}
function search($search){
    global $connect;
    $results = array();
    $result = $connect->query("SELECT * FROM `doctors` where Dr_name like '%$search%'");
    if(!$result->num_rows){ 

        $result = $connect->query("SELECT * FROM `office` where office_num  = $search OR service_num = '$search' OR `Floor_num` = '$search'");
    }
    if($result->num_rows){ //if(5){ echo "5" ;}else{echo '6';}

        while($row=$result->fetch_assoc()){
            array_push($results,array($row['Dr_name'],getOfficeInfo($row['O_id']))); 
        }
        return $results;
    }else{
        return null;
    }  
// B-109
// B-10
}
function getDrInfoByOfficeId($officeId){
    global $connect; 
    $result = $connect->query("SELECT * FROM `doctors` where O_id = '$officeId'");
    return $result->fetch_assoc();

}
function getOfficeInfoBySerivce($serviceNum){
    global $connect; 
    $result = $connect->query("SELECT * FROM `office` WHERE `service_num` = '$serviceNum' ");
    return ($result->num_rows)?$result->fetch_assoc():False;
}
function getOfficeInfo($oID){
    global $connect; 
    $result = $connect->query("SELECT * FROM `office` WHERE `office_id` ='$oID' ");
    return $result->fetch_assoc();

}
function getDrInfoByEmail($email){
    global $connect; 
    $result = $connect->query("SELECT * FROM `doctors` where email = '$email'");
    return $result->fetch_assoc();

}
//الوصول السريع
function findOfficeInfoByOfficeName($officeName){
    global $connect;
    $result =$connect->query("SELECT * FROM `office` WHERE `office_name` = $officeName");
    return ($result->num_rows)?$result->fetch_assoc():False;

}

// function changeEmail($email ,$officeID ,$DrName){
//     global $connect;
//     $connect->query("UPDATE `doctors` SET `email` ='$email' WHERE `O_id` = $officeID AND `Dr_name` like $DrName ");


// }


// function getOfficeNumByDrinfo($DrInfo){
//     global $connect ;
//     $result =$connect->query("SELECT * FROM `office` WHERE `office_name` = $officeName");


// }

//SEARCH --> info

//فنكشن تبحث عن رقم المكتب الجديد و ترجع لي الاي ي حقه 
function searchIfOfficeNumThereAndReturnOfficeId($officeNum){
    global $connect ;
    $officeID = $connect->query("SELECT `office_id` FROM `office` WHERE `office_num`  like '$officeNum' ");
    if($officeID){
        return $officeID->fetch_assoc();

    }else{ return false;}

}

?>

