<?php
session_start();
ob_start();
include("functions.php");
//AddDr("bassamah",3);
//EditDr(5 , 'jana' ,70);
//DeletDr(5);
if($_GET['do']=='search'){
$r = search($_POST['search']);
echo $r[0]['Dr_name'];
exit();
}
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <title>CS Building </title>
    <meta name="viewport" content="width= device-width , initial-scale">
    <link rel="stylesheet"  href="./assets/css/home.css"> 
    <meta name="keywords" content="ابلكيشن , الامام" >
    <meta name="discription" content = " جامعة الامام محمد بن سعود الاسلاميه-كلية الحاسب - المكاتب">
</head>
<body>
    <header>
        
        

        <a href="#" class="logo">فَــنــار</a>
        <nav class="navigation">
            
            <a href="#الخرائط">الخرائط</a>
            <a href="#الوصول السريع">الوصول السريع</a>
            <a href="#نبذة عننا">نبذة عننا</a>
            <?php
            if($_SESSION['isLogin']!=1){ 
            ?>
            <a href="login.php">تسجيل الدخول</a>
            <?php }else{ ?>
                <a href="admin.php">لوحة التحكم </a>
                <a href="admin.php?do=logout">تسجيل الخروج</a>
            <?php } ?>
            
        </nav>
    </header>
    <section class="main">
            <div class="box">
                
                <form method='post' action='?do=search'>
                    <input type="text" name="search"  placeholder="     اسم الدكتـورة أو رقـم المكـتب...">
                    <input type="submit" name="" value="ابحث">
                 <!-- <input type="hidden" name="search1" value="search1"> -->
                </form>
            </div>
    </section>
    <section class="projects" id="الخرائط">
        <h2 class="title">الخرائط</h2>
        <div class="content">
            <div class="project-card">
                <div class="project-image">
                    <img src="images/work1.jpeg">
                    <div class="project-info">
                        <strong class="project-title">
                            <a href="https://ibb.co/j6DMkf4" class="more-details">خريطة الدور الأول </a>

                        </strong>
                    </div>

                </div>

            </div>
            <div class="project-card">
                <div class="project-image">
                    <img src="images/work2.jpeg">
                    <div class="project-info">
                        <strong class="project-title">
                            <a href="https://i.top4top.io/p_2642gcuef1.jpeg"class="more-details">خريطة الدور الثاني </a>

                        </strong>

                    </div>

                </div>

            </div>
            <div class="project-card">
                <div class="project-image">
                    <img src="images/work2-2.jpeg">
                    <div class="project-info">
                        <strong class="project-title">
                            <a href="https://b.top4top.io/p_2642dhwbr1.jpeg"class="more-details">خريطة الدور الثاني </a>

                        </strong>

                    </div>

                </div>

            </div>
            <div class="project-card">
                <div class="project-image">
                    <img src="images/work3.jpeg">
                    <div class="project-info">
                        <strong class="project-title">
                            <a href="https://d.top4top.io/p_2642et72u3.jpeg "class="more-details">خريطة الدور الثالث </a>

                        </strong>

                    </div>

                </div>

            </div>
            <div class="project-card">
                <div class="project-image">
                    <img src="images/work3-2.jpeg">
                    <div class="project-info">
                        <strong class="project-title">
                            <a href="https://e.top4top.io/p_26422vgrm4.jpeg "class="more-details">خريطة الدور الثالث </a>

                        </strong>

                    </div>

                </div>

            </div>
            <div class="project-card">
                <div class="project-image">
                    <img src="images/work4.jpeg">
                    <div class="project-info">
                        <strong class="project-title">
                            <a href="https://ibb.co/HNtdSd8"class="more-details">خريطة الدور الرابع </a>

                        </strong>

                    </div>

                </div>

            </div>
            <div class="project-card">
                <div class="project-image">
                    <img src="images/work4-2.jpeg">
                    <div class="project-info">
                        <strong class="project-title">
                            <a href="https://ibb.co/fS5dV6V"class="more-details">خريطة الدور الرابع </a>

                        </strong>

                    </div>

                </div>

            </div>

            
                

        </div>

    </section>
    <section class="projectes2" id="الوصول السريع">
        <h2 class="title"> الوصول السريع</h2>
        
        
        <button type="submit"  class="btn" onclick="openPopup()">وكيلة علوم الحاسب</button>
            <div class="popup" id="popup">
              <h5>وكيلة قسم العلوم</h5>
              
             <button type="button"  onclick="closePopup()">اغلاق</button>

            </div>
            
            <button type="submit"  class="btn1" onclick="openPopup1()">شؤون الطلاب</button>
            <div class="popup1" id="popup1">
              <h6>شؤون الطلاب</h6>
              
            
           <button type="button"  onclick="closePopup1()">اغلاق</button>
            </div>

        </div>
        <button type="submit"  class="btn2" onclick="openPopup2()">وحدة التدريب</button>
        <div class="popup2" id="popup2">
          <h5>وحدة التدريب</h5>
          
       
       <button type="button"  onclick="closePopup2()">اغلاق</button>
        </div>

        <button type="submit"  class="btn3" onclick="openPopup3()">وكيلة نظم المعلومات</button>
              <div class="popup3" id="popup3">
              <h5>وكيلة قسم النظم</h5>
             
             <button type="button"  onclick="closePopup3()">اغلاق</button>

              </div>
           </div>

             <button type="submit"  class="btn4" onclick="openPopup4()">وكيلة تقنية المعلومات</button>
              <div class="popup4" id="popup4">
              <h5>وكيلة قسم التقنية</h5>
              
             <button type="button"  onclick="closePopup4()">اغلاق</button>

              </div>
             </div>

          <button type="submit"  class="btn5" onclick="openPopup5()">لجنة الأعذار</button>
              <div class="popup5" id="popup5">
              <h5>لجنة الأعذار</h5>
             
             <button type="button"  onclick="closePopup5()">اغلاق</button>

              </div>
            </div>

            <button type="submit"  class="btn6" onclick="openPopup6()">الأخصائية النفسية</button>
              <div class="popup6" id="popup6">
              <h5>الأخصائية النفسية</h5>
             
             <button type="button"  onclick="closePopup6()">اغلاق</button>

              </div>
            </div>

            <button type="submit"  class="btn7" onclick="openPopup7()">الأخصائية الأجتماعية</button>
              <div class="popup7" id="popup7">
              <h5>الأخصائية الأجتماعية</h5>
             
             <button type="button"  onclick="closePopup7()">اغلاق</button>

              </div>
            </div>
            

           
          
      
    </section>

    
        </div>
        

        
        <section class="contents" id="نبذة عننا">
            <h2 class="title"> نبذة عننا </h2>
               
            <h3>  <br><span>نحن موقع فنار </span>صممنا هذا الموقع لمساعدتك في الوصول لجميع المكاتب في الجامعة باسرع الطرق و اوضحها</h3>
            

        </section>
        
        
      <script>
             /* btn قسم وكيلة العلوم*/
            let popup= document.getElementById("popup");


            function openPopup(){
                popup.classList.add("open-popup");
            }
            function closePopup(){
                popup.classList.remove("open-popup");
            }

            //شؤون الطلاب btn/
           let popup1= document.getElementById("popup1");


            function openPopup1(){
                popup1.classList.add("open-popup1");
            }
            function closePopup1(){
                popup1.classList.remove("open-popup1");
            }

              /* كود وحدة التدريب btn*/
             let popup2= document.getElementById("popup2");


            function openPopup2(){
                popup2.classList.add("open-popup2");
            }
            function closePopup2(){
                popup2.classList.remove("open-popup2");
            }
                  /* كود وكيلة النظم btn*/
            let popup3= document.getElementById("popup3");


            function openPopup3(){
                popup3.classList.add("open-popup3");
            }
            function closePopup3(){
                popup3.classList.remove("open-popup3");
            }

             /* كود وكيلة التقنية*/
            let popup4= document.getElementById("popup4");


            function openPopup4(){
                popup4.classList.add("open-popup4");
            }
            function closePopup4(){
                popup4.classList.remove("open-popup4");
            }
            /*  btn5 كود لجنة الاعذار*/
            let popup5= document.getElementById("popup5");


            function openPopup5(){
                popup5.classList.add("open-popup5");
            }
            function closePopup5(){
                popup5.classList.remove("open-popup5");
            }

             /* كود الاخصائية النفسية btn6*/
            let popup6= document.getElementById("popup6");


            function openPopup6(){
                popup6.classList.add("open-popup6");
            }
            function closePopup6(){
                popup6.classList.remove("open-popup6");
            }

             /* كود الاخصائية الاجتماعية btn 7 */ 
            let popup7= document.getElementById("popup7");


            function openPopup7(){
                popup7.classList.add("open-popup7");
            }
            function closePopup7(){
                popup7.classList.remove("open-popup7");
            }
            
        </script>
        <script scr="script.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

       
</body>
</html>