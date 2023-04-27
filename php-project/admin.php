<?php

session_start();//تتسجل على السيرفر ولازم تنحط قبل اي شي   بالhtml 
//له اوبشن session_start('option'); ..... يعرف انت مين و الاشياء المفضله لك ؟
 
ob_start();
include("functions.php");
if($_GET['do']=='logout') unset($_SESSION['isLogin']);
if($_SESSION['isLogin']!==1){
	header("location: login.php");
	exit();
}
if($_POST['do']=='addOffice'){
    $officeName = stripslashes($_POST['officeName']); 
    $officeNum = stripslashes($_POST['officeNum']);
    $floorNum = stripslashes($_POST['floorNum']);
    $serviceNum = stripslashes($_POST['serviceNum']);
    addOffice($officeName ,$officeNum ,$serviceNum, $floorNum );
    echo "<script>alert('تمت الاضافة بنجاح')</script>";
// }else if($_POST['do'] == 'editOffice'){
//     $officeID = stripslashes($_post['officeID']);
//     $officeName = stripslashes($_post['officeName']);
//     $officeNum = stripslashes($_post['officeNum']);
//     $floorNum = stripslashes($_post['floorNum']);
//     editOffice($officeID,$officeName ,$officeNum , $floorNum  );
//     echo"<script>alert(' تم التعديل  ')</script>";



}else if($_POST['do'] == 'deleteOffice'){
    $serviceNum=stripslashes($_POST['serviceNum']);
    $officeID = getOfficeInfoBySerivce($serviceNum)['office_id'];
    deleteOffice($officeID);
    echo"<script>alert(' تم الحذف  ')</script>";




}else if($_POST['do']=='addDr'){
    $name =stripslashes($_POST['Dr_name']);
    $serviceNum=stripslashes($_POST['serviceNum']);
    $email =stripslashes($_POST['email']);
    if(addDr($name ,$serviceNum ,$email))
    echo "<script>alert('تم الاضافة بنجاح')</script>";
    else echo "<script>alert('رقم الصيانه غير صحيح')</script>";
}else if($_POST['do']=='changePass1'){
    $newPass =stripslashes($_POST['password']);
    chanegPass($newPass);
    echo "<script>alert('تم تغيير كلمة المرور بنجاح')</script>";
}else if($_POST['do']=='changeUserName1'){
    $newUserName = stripslashes($_POST['userName']);
    changeUserName($newUserName);
    echo "<script>alert('تم تغيير اسم المستخدم بنجاح')</script>";
  
}else if($_POST['do']=='editOffice1'){

    $officeID = stripslashes($_POST['officeID']);//officeNameEdit
    $officeName = stripslashes($_POST['officeNameEdit']);
    $officeNum = stripslashes($_POST['officeNumEdit']);
    $floorNum =stripslashes($_POST['floorNumEdit']);
    editOffice($officeID,$officeName ,$officeNum , $floorNum );
    echo"<script>alert(' تم التعديل  ')</script>";


//editDr يحذف الايميل , editOffice ,change user name يحذف الباس
}else if($_POST['do'] =='editDrName1'){
    //هنا لازم اتاكد اذا هو قاعد يعدل مكتب ولا اسم 
    //لو قاعد يعل مكتب لازم اغير الo_id حق المكتب
    $drID =stripslashes($_POST['DrID']);
    $name =stripslashes($_POST['DRName']); 
    $officeID =stripslashes($_POST['officeID']);
    $email = getDrInfoByOfficeId($officeID)['email'];
    $serviceNum =stripslashes($_POST['service_num']);
    $officeID1= getOfficeInfoBySerivce($serviceNum)['office_id'];
    editDr($drID ,$name ,$officeID1 ,$email);


    // if($officeID1= getOfficeInfoBySerivce($serviceNum)['office_id']){

    //      echo"<script>alert(' تم تعديل رقم الصيانه')</script>";
    //      editDr($drID ,$name ,$officeID1 ,$email);
    // }else if($officeID1 == $officeID){
    //     editDr($drID ,$name ,$officeID1 ,$email);
    //      echo"<script>alert('  تم حفظ تعديل اسم عضو هيئة التدريس بنجاح')</script>";

    // }else{//هنا فيه حاله زياده
    //      echo"<script>alert(' رقم الصيانه غير صحيح')</script>";

    // } 
    // =================================================
    // if($officeID1 == $officeID){
    //     editDr($drID ,$name ,$officeID1 ,$email);
    //     echo"<script>alert('  تم حفظ تعديل اسم عضو هيئة التدريس بنجاح')</script>";

    // }else if($officeID1 != $officeID){
    //     if($officeID1){ 
    //         editDr($drID ,$name ,$officeID1 ,$email);
    //         echo"<script>alert(' تم تعديل رقم المكتب')</script>";

    //     }else{
        
    //     }


    // }
    //==============================================================
    
    // if($officeID1=searchIfOfficeNumThereAndReturnOfficeId($newOfficeNum)){
    //    if($officeID1 == $officeID){
    //       editDr($drID ,$name ,$officeID1,$email);
    //       echo"<script>alert('  تم حفظ تعديل اسم عضو هيئة التدريس بنجاح')</script>";

    //     }else{
    //       editDr($drID ,$name ,$officeID,$email);
    //       echo"<script>alert(' تم تعديل رقم المكتب')</script>";}

    // }else{ //هنا فيه حالتين لاولى اذا كان رقم الاي دي الجديد يساوي المكتب يعني يعدل الاسم الثاني لو رقم الاي دي يختلف عن المكتب يعني يرقم الصيانه غلط 
    //     echo"<script>alert(' تم   ')</script>";
        
    //     // if( ){

    //     // }else {
    //     //     echo"<script>alert('  تم حفظ تعديل اسم عضو هيئة التدريس بنجاح')</script>";}
    //     }




}
else if($_POST['do'] == 'deleteDr'){
    $email = stripslashes('email');
    if($drID = getDrInfoByEmail($email)['Dr_id']){
        deleteDr($drID);
    }else{
        echo"<script>alert(' الايميل غير صحيح')</script>"; 
    }

    


}

?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <!--<title>Admin page</title> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet"  href="./assets/css/admin.css">
    <title>CS Building </title>
    <meta charset="utf-8">

</head>
<body>
    <header>
        <a href="#" class="logo">فَــنــار</a>
        <nav class="navigation">
            <a href="index.php"> الصفحة الرئيسية</a>
            <a href="?do=logout">تسجيل خروج</a>
           
        </nav>
    </header>
        <section class="projectes2" id="">
            <div class="buttons">
                <!-- مافهمته -->
                <h2 class="title"> </h2> 
                <div class="menu" id="menu">
                    <button type="submit"  class="btn" onclick="openOffices()">المكاتب</button>
                    <button type="submit"  class="btn" onclick="openDoctors()">الطاقم التعليمي</button>
                    <button type="submit"  class="btn" onclick="openSettings()">الاعدادات العامة</button>
                </div>
                <div class="offices" id="offices">
                    <button type="submit"  class="btn" onclick="openP('addOffice')">اضافة مكتب</button>
                    <button type="submit"  class="btn" onclick="openP('editOffice')">تعديل مكتب</button><!--editOffice-->
                    <button type="submit"  class="btn" onclick="openP('deleteOffice')">حذف مكتب</button>
                    <button type="submit"  class="btn" onclick="closeOffices()">العودة</button>
                </div>
                <div class="doctors" id="doctors">
                    <button type="submit"  class="btn" onclick="openP('addDr')">اضافة دكتور</button>
                    <button type="submit"  class="btn" onclick="openP('editDrName')">تعديل دكتور</button>
                    <button type="submit"  class="btn" onclick="openP('deleteDr')">حذف دكتور</button>
                    <button type="submit"  class="btn" onclick="closeDoctors()">العودة</button>
                </div>
                <div class="settings" id="settings">
                    <button type="submit"  class="btn" onclick="openP('changePass')">تعديل كلمة المرور</button>
                    <button type="submit"  class="btn" onclick="openP('changeUserName')">تعديل اسم المستخدم</button>
                    <button type="submit"  class="btn" onclick="closeSettings()">العودة</button>
                </div>

                <div class="popup" id="addOffice">              
                    <h5>اضافة مكتب</h5>
                    <div class="box">
                        <form method="post">
                            <input type="text" name="officeName" placeholder="اسم مكتب" required>
                            <h5> </h5> <!-- officeNum -->
                            <input type="number" name="officeNum" placeholder="رقم المكتب" required>
                            <h5> </h5>
                            <input type="number" name="floorNum" placeholder="رقم الدور" required>
                            <h5> </h5>
                            <input type="text" name="serviceNum" placeholder="رقم الصيانة" required>
                            <h5> </h5>
                            <input name="do" value="addOffice" type="hidden"/>
                            <!-- ليش هناما سوينا button -->
                            <input type="submit" name="" value="اضافة"> 
                        </form>
                    </div>
                    <button type="button"  onclick="closeP('addOffice')">اغلاق</button>
                </div>
                <div class="popup" id="editOffice">              
                    <h5>تعديل مكتب</h5>
                    <div class="box">
                        <form method="post">
                            <input type="text" name="serviceNum" placeholder="رقم الصيانة" required>
                            <input name="do" value="checkOffice" type="hidden"/>
                            <input type="submit" name="" value="بحث">
                            <h5> </h5>
                        </form>
                        <form method="post">
                            <input name="officeID"  id="officeID" type="hidden"/>
                            <h4>اسم المكتب </h4> 
                            <input type="text"  name="officeNameEdit" id="officeNameEdit" >
                            <h4>رقم المكتب </h4> 
                            <input type="number" name="officeNumEdit" id="officeNumEdit" required>
                            <h4> رقم الدور</h4>
                            <input type="number" name="floorNumEdit" id="floorNumEdit" required>
                            <h4></h4>
                            <input name="do" value="editOffice1" type="hidden"/>
                            <input type="submit" name="" value="تعديل">
                        </form>
                    </div>
                    <button type="button"  onclick="closeP('editOffice')">اغلاق</button>
                </div> 
                <div class="popup" id="deleteOffice"> 
                <h5>حذف مكتب</h5>
                    <div class="box">
                        <form method="post">
                            <input type="text" name="serviceNum" placeholder="رقم الصيانة" required>
                            <input name="do" value="deleteOffice" type="hidden"/>
                            <input type="submit" name="" value="حذف">
                            <h5> </h5>
                        </form>
                    </div>
                    <button type="button"  onclick="closeP('deleteOffice')">اغلاق</button>
                </div>
                <!-- =========================================================================-->
                <div class="popup" id="addDr">              
                    <h5>اضافة دكتور</h5>
                    <div class="box">
                        <form method="post">
                            <input type="text" name="Dr_name" placeholder="اسم الدكتوره" required>
                            <h5> </h5> 
                            <input type="text" name="serviceNum" placeholder="رقم الصيانة" required>
                            <h5> </h5>
                            <input type="text" name="email" placeholder="البريد الالكتروني للدكتور" required>
                            <h5> </h5>
                            <input name="do" value="addDr" type="hidden"/>
                            <input type="submit" name="" value="اضافة">
                        </form>
                    </div>
                    <button type="button"  onclick="closeP('addDr')">اغلاق</button>
                </div>
                <div class="popup" id="editDrName">  
                <h5>تعديل الدكتور</h5>
                    <div class="box">
                        <form method="post">
                            <input type="text" name="email1" placeholder="البريد الالكتروني للدكتور" required>
                            <input name="do" value="ckeckDrName" type="hidden"/>
                            <input type="submit" name="" value="بحث">
                            <h5> </h5>
                        </form>
                        <!-- انا هنا باقي نقطة لو غير بيانات المكتب اللي هو رقمه مب موجود  -->
                        <form method="post">
                            <input name="officeID"  id="officeID" type="hidden"/>
                            <input name="DrID"  id="DrID" type="hidden"/>
                            <h4>رقم الصيانه </h4> 
                            <input type="number" name="service_num" id="serviceNumEdit" required>
                            <h4>اسم الدكتورة</h4>
                            <input type="text" name="DRName" id="DRName" required>
                            <h4></h4>
                            <input name="do" value="editDrName1" type="hidden"/>
                            <input type="submit" name="" value="تعديل">
                        </form>
                    </div>
                    <button type="button"  onclick="closeP('editDrName')">اغلاق</button>
                </div>  

                <div class="popup" id="deleteDr"> 
                <h5>حذف دكتور</h5>
                    <div class="box">
                        <form method="post">
                            <input type="text" name="email" placeholder="ايميل الدكتور"  required>
                            <input name="do" value="deleteDr" type="hidden"/>
                            <input type="submit" name="" value="حذف">
                            <h5> </h5>
                        </form>
                    </div>
                    <button type="button"  onclick="closeP('deleteDr')">اغلاق</button>
                </div>
                <!-- =========================================================================-->
                <div class="popup" id="changePass">              
                    <h5>تغيير كلمة المرور</h5>
                    <div class="box"> 
                        <form method="post">
                            <input type="password" minlength="8" name="password" placeholder="كلمة المرور الجديدة" required>
                            <h5> </h5> 
                            <input name="do" value="changePass1" type="hidden"/>
                            <input type="submit" name="" value="تغيير">
                        </form>
                    </div>
                    <button type="button"  onclick="closeP('changePass')">اغلاق</button>
                </div>
                <!-- =========================================================================-->
                <div class="popup" id="changeUserName">              
                    <h5>تغيير اسم المستخدم </h5>
                    <div class="box"> 
                        <form method="post">
                            <input type="text" name="userName"  placeholder="اسم المستخدم الجديد" required>
                            <h5> </h5> 
                            <input name="do" value="changeUserName1" type="hidden"/>
                            <input type="submit" name="" value="تغيير">
                        </form>
                    </div>
                    <button type="button" onclick="closeP('changeUserName')">اغلاق</button>
                </div>
                <!-- <button type="submit"  class="btn" onclick="openPopup()">تعديـل</button>
                <button type="submit"  class="btn" onclick="openPopup1()">اضافة او تعديل</button> -->
                <!-- <div class="popup" id="popup">              
                    <h5>  ادخل رقم الصيانة لتعديل الاسم</h5>
                    <div class="box">
                        <form>
                            <input type="text" name=" " placeholder="   رقم الصيانة...">
                            <h5> </h5>
                            <input type="text" name=" " placeholder="   الاسم...">
                            <h5> </h5>
                            <input type="submit" name=" " value="تعديـل">
                        </form>
                    </div>
                    <button type="button"  onclick="closePopup()">اغلاق</button>
                </div>

                <div class="popup1" id="popup1">
                    <h5>  ادخل رقم الصيانة للحذف او الاضافة </h5>
                    <div class="box">
                        
                        <form>
                            <input type="text" name=" " placeholder="   رقم الصيانة...">
                            <h5> </h5>
                            <input type="text" name=" " placeholder="   الاسم...">
                            <h5> </h5>

                            <input type="submit" name=" " value="حـذف">
                            <input type="submit" name=" " value="إضافة">


                        </form>
                    </div>
                    <button type="button"  onclick="closePopup1()">اغلاق</button>
                </div> -->
            </div>
        </section>
        
            <script>
                function openOffices(){
                    document.getElementById("menu").classList.add('menu-hide');
                    document.getElementById("offices").classList.add('show');
                }
                function closeOffices(){
                    document.getElementById("menu").classList.remove('menu-hide');
                    document.getElementById("offices").classList.remove('show');
                }
                function openDoctors(){
                    document.getElementById("menu").classList.add('menu-hide');
                    document.getElementById("doctors").classList.add('show');
                }
                function closeDoctors(){
                    document.getElementById("menu").classList.remove('menu-hide');
                    document.getElementById("doctors").classList.remove('show');
                }
                function openSettings(){
                    document.getElementById("menu").classList.add('menu-hide');
                    document.getElementById("settings").classList.add('show');
                }
                function closeSettings(){
                    document.getElementById("menu").classList.remove('menu-hide');
                    document.getElementById("settings").classList.remove('show');
                }
                function openP(b){
                    document.getElementById(b).classList.add("open-popup");
                }
                function closeP(b){
                    document.getElementById(b).classList.remove('open-popup');
                }
               let popup= document.getElementById("popup");
   

               function openPopup(){
                   popup.classList.add("open-popup");
               }
               
               function closePopup(){
                   popup.classList.remove("open-popup");
               }


               let popup1= document.getElementById("popup1");
               function openPopup1(){
                popup1.classList.add("open-popup1");
            }
            function closePopup1(){
                popup1.classList.remove("open-popup1");
            }
<?php 
if($_POST['do']=='checkOffice'){
    echo "openP('editOffice') ;\n";
    //editOffice
    $serviceNum = stripslashes($_POST['serviceNum']);
    if($row = getOfficeInfoBySerivce($serviceNum)){
        echo "document.getElementById('officeNameEdit').value = '{$row['office_name']}';\n";
        echo "document.getElementById('officeNumEdit').value = '{$row['office_num']}';\n";
        echo "document.getElementById('floorNumEdit').value = '{$row['Floor_num']}';\n";
        echo "document.getElementById('officeID').value = '{$row['office_id']}';\n";
        //officeID

    }else{
        echo "alert('رقم الصيانه غير موجود');\n";
    }

}else if($_POST['do']=='ckeckDrName'){
    echo "openP('editDrName') ;\n";
    $email = stripslashes($_POST['email1']);
    if($row = getDrInfoByEmail($email) ){
    //officeID
    //global $connect;
    //emailAfterSending
    $serviceNumEdit = getOfficeInfo($row['O_id'])['service_num'];
    echo "document.getElementById('officeID').value = '{$row['officeID']}';\n";
    echo "document.getElementById('serviceNumEdit').value = '{$serviceNumEdit}';\n";
    echo "document.getElementById('DrID').value = '{$row['Dr_id']}';\n";
    echo "document.getElementById('DRName').value = '{$row['Dr_name']}';\n";
    //echo "alert(' $officeNum');\n";

    }else{  echo "alert('البريد الالكتروني غير موجود');\n";}



    
 }

?>
           


            </script>
            
        
</body>
</html>