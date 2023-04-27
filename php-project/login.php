<?php
session_start();
ob_start();
include("functions.php");
if($_SESSION['isLogin']==1){
    header("LOCATION: admin.php");
    exit();
}else if(!empty($_SESSION['try']) && $_SESSION['try']>3){
   if($_SESSION['ban_time']+3600>time()){
        $leftTime =((3600-(time()-$_SESSION['ban_time'])));
        if(($left_time)<60) $msg = "{$leftTime} ثانية";
        else $msg = ((int)($leftTime/60)) . " دقيقة";
        $err_msg = "تبقى {$msg} من الوقت لاعادة المحاوله مره اخرى";
    }else{
        unset($_SESSION['try']);
        unset($_SESSION['ban_time']);
    }
}else if(!empty($_POST['username'])){
	$username = stripslashes($_POST['username']);
	$password = stripslashes($_POST['password']);
	$loginCheck = $connect->query("select login_pass from manager where login_name='{$username}' and login_pass='{$password}'");
	if($loginCheck->num_rows){
		$_SESSION['isLogin']=1;
		header("location: admin.php");
		exit();
	}else{
        if($_SESSION['try']>=3){
            $_SESSION['ban_time'] = time();
            $err_msg = "لقد تم حظر محاولاتك لتسجيل الدخول, الرجاء المحاولة بعد ساعة";
        }else $err_msg = "اسم المستخدم او كلمة المرور غير صحيحة.";
        $_SESSION['try']+=1;
	}
}
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
	<title>CS Building </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta name="viewport" content="width= device-width , initial-scale">
    <link rel="stylesheet"  href="./assets/css/login.css">  
    
</head>
<body>
    <header>
        
        

        <a href="#" class="logo">فَــنــار</a>
        <nav class="navigation">
        <a href="index.php" >الصفحة الرئيسية</a>
            
            
    </header>
    <section class="main">
        <section>
           <div class="wrapper">
            <span class="icon-close">

                <ion-icon name="close"></ion-icon>
            </span>

            <div class="form-box login"> 
                <h2>تسجيل الدخول</h2>
				<?php
				if(!empty($err_msg))
					echo "<div class='alert alert-danger' role='alert'>
					{$err_msg}
					</div>";
				?>
                <form method="post" action="#">
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="person"></ion-icon>
                        </span>

                        <input name="username" type="text" required>
                        <label>اسم المستخدم</label>

                    </div>
                    <div class="input-box">
                    <span class="icon">
                            <ion-icon name="lock-closed"></ion-icon>
                        </span>
                        <input name="password" type="password" required>
                        <label>رمز الدخول</label>

                    </div>
                    <button type="submit" class="bttn">تسجيل الدخول</button>
                    
                </form>
            </div> 
        </section>

</body>
</html>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>