<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" >
   <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <title>الخزائن الالكترونية</title>
  </head>
  <body>
    
   <div class="header mt-2">
       <div class="container">
            <div class="row d-flex justify-content-end  ">
              
        
              <nav class="navbar navbar-expand-lg navbar-light align-items-center ">
           
                      <p class="logo">الخزائن الالكترونية</p>
                       
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                 
                       <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                  <ul class="navbar-nav ">
                    <li class="nav-item ">
                      <!-- <a class="nav-link" href="#">الملف الشخصي</a> -->
                      <button type="button" class="btn " data-toggle="modal" data-target="#profile">
                        الملف الشخصي
                      </button>
                    </li>
                    <li class="nav-item">
                      <!-- <a class="nav-link" href="#">معلومات الخزانة</a> -->
                      <button type="button" class="btn " data-toggle="modal" data-target="#Khazanadata">
                       خزائني
                      </button>
                    </li>
                    
                  </ul>
                
                </div>
              
            
                   <img src="assets/images/ptuk-logo-1517122210.png" alt="ptuk" class="ptukImages">
            
               
              </nav>
             
      
       </div>
       </div>
   </div>
   <div class="home pt-5 text-right ">
       <div class="container">
           <h2 class="text-center pb-5">الخزائن المتوفرة</h2>
            <div class="search pb-3">

            @include('inc.message')
            <div class="search-avilable text-right">
            <form action="{{url('/search')}}" method="get">
              @csrf
                <button class="btn main_color second_color btnHover" type="submit" >ابحث</button>
               
                <input type="text" name="search" required class="form-control mr-2" id="search-input" placeholder="...البحث عن طابق" />
                <input type="text" name="search" required class="form-control mr-2" id="search-input" placeholder="...البحث عن كلية" />

      </form>
       </div>

         
            </div>
          
          

           <div class="row justify-content-end">
               @foreach($cabinets as $cabinet)
               <div class="col-md-4 pb-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{$cabinet->college}}</h5>
                     
                      <p class="card-text">تتوفر خزانة في {{$cabinet->college}} الطابق {{$cabinet->floor_no}} برقم {{$cabinet->cabinet_no}} </p>
                        <button type="button" id="bookingBtn" name="bookingBtn" class="btn main_color second_color btnHover" data-toggle="modal" data-target="#pay">
                        حجز الخزانة
                      </button>
              

                 
                    </div>
                  </div>
               </div>
              @endforeach
              
            
             

             
           </div>
          
       </div>
   </div>

  
   {{$cabinets->links('inc.paginator')}}


  <!-- Modal -->
<div class="modal fade" id="Khazanadata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content khazana">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">اسم الكلية</th>
                    <th scope="col">الطابق</th>
                    <th scope="col">رقم الخزانة</th>
                    <th scope="col">تاريخ انتهاء الحجز</th>
                    <th scope="col">حالة الخزانة</th>
                   
                  </tr>
                </thead>
                <tbody>
                    @foreach($usersD as $user)
                  <tr>
                    <td>{{$user->college}}</td>
                    <td>{{$user->floor_no}}</td>
                    <td>{{$user->cabinet_no}}</td>
                    <td>{{$user->pivot->booking_finally_date}}</td>
                    <td><a href="{{url("DeleteC/$user->id")}}" class="btn btn-danger">الغاء الحجز</a></td>
                    <td>
                        <form action="{{url("renewal/$user->id")}}" method="post">
                        @csrf
                        <input type="hidden" name="finalBooking" value="{{$user->pivot->booking_finally_date}}">
                     <button type="submit" class="btn btn-info">تجديد الحجز</button>
                    </form>
                   </td>

                  </tr>
                 
                  @endforeach
                </tbody>
              </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
<div class="modal fade text-right" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body profile">
                <form action="{{url('profile')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">اسم الطالب</label>
                  <input type="text" name="name" class="form-control text-right" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$profile->student_name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">الرقم الجامعي</label>
                    <input type="text" name="university_id " class="form-control text-right" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$profile->university_id }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">اسم الكلية</label>
                    <input type="text" name="college" class="form-control text-right" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$profile->college }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">اسم التخصص</label>
                    <input type="text" name="majoring" class="form-control text-right" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$profile->majoring }}">
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">رقم الهاتف</label>
                    <input type="text" name="phone" class="form-control text-right" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$profile->phone }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">العنوان</label>
                    <input type="text" name="address" class="form-control text-right" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$profile->address }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">البريد الالكتروني</label>
                    <input type="email" name="email" class="form-control text-right" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$profile->email  }}">
                  </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">كلمة المرور</label>
                  <input type="password" name="password" class="form-control text-right" id="exampleInputPassword1" value="{{$profile->password  }}">
                </div>
              
                <button type="submit" class="btn btn-primary">تعديل البيانات</button>
              </form>
            
            
        </div>
      
      </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade text-right" id="pay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">حجز الخزانة</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{url('booking')}}" method="post">
                @csrf
                <div class="form-group">

            <label for="exampleInputEmail1">(Palpay)المبلغ المطلوب</label>
                  <input type="text" name="booking" class="form-control" >
                </div>
                <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
          <button type="submit" id="ModalBookingBtn" class="btn main_color second_color btnHover">ارسال المبلغ</button>
        </div>
              </form>
        </div>
      
      </div>
    </div>
  </div>



    <script src="{{asset('assets/js/jquery.slim.min.js')}}" ></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/popper.min.js')}}" ></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  </body>
</html>