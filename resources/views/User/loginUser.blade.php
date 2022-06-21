<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
   <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>لوحة التحكم - تسجيل الدخول</title>
  </head>
  <body>
    
    <div class="container loginAdmin ">
        <div class="row">
            <div class="col-md-6 ">
                <h3 class="mb-4">الخزائن المتوفرة</h3>
                <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                  
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <h5 >كلية العلوم والاداب</h5>
                     <img src="assets/images/1.jpg" alt="" class="loginImages">
                    
                      </div>
                      <div class="carousel-item">
                        <h5 >كلية الهندسة </h5>
                        <img src="assets/images/2.jpg" alt="" class="loginImages">
                     
                      
  
                      </div>
                      <div class="carousel-item">
                        <h5 >كلية التجارة والاعمال</h5>
                        <img src="assets/images/images.jpg" alt="">

                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
            </div>
            <div class="col-md-6"> 
                <section id="content">
            <form action="{{url('login')}}" method="post" class="loginAdminForm">
                @csrf
                <h1>تسجيل الدخول</h1>
               
                    <input type="text" placeholder="اسم المستخدم"  id="username" name="university_id" required/>
                    
                    <input type="password" placeholder="كلمة المرور"  id="password" name="password" required/>
                
                   <input type="submit" value="تسجيل الدخول" />
            
            </form>
            
        </section>
    </div>
        </div>
       
    </div>
 

  





    <script src="assets/js/jquery.slim.min.js" ></script>
    <script src="assets/js/popper.min.js" ></script>
    <script src="assets/js/bootstrap.min.js"></script>
   
  </body>
</html>