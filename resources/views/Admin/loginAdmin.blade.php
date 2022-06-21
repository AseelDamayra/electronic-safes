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
        <section id="content">
            <form action="{{url('loginAdmin')}}" method="post" class="loginAdminForm">
                @csrf
                <h1>تسجيل الدخول</h1>
                <div>
                    <input type="text" name="university_id" placeholder="اسم المستخدم" required="" id="username" />
                    
                </div>
                <div>
                    <input type="password" name="password"  placeholder="كلمة المرور" required="" id="password" />
                </div>
                <div>
                    <input type="submit" value="تسجيل الدخول" />
            
                </div>
            </form>
            
        </section>
    </div>
 

  





    <script src="assets/js/jquery.slim.min.js" ></script>
    <script src="assets/js/popper.min.js" ></script>
    <script src="assets/js/bootstrap.min.js"></script>
   
  </body>
</html>