
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
    <title>الخزائن الالكترونية</title>
  </head>
  <body>
    

<div class="row justify-content-end mt-5">
   @foreach($search as $s)
   <div class="col-md-4 pb-3">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">{{$s->college}}</h5>
         
          <p class="card-text">تتوفر خزانة في {{$s->college}} الطابق {{$s->floor_no}} برقم {{$s->cabinet_no}} </p>
            <button type="button" name="bookingBtn" class="btn main_color second_color btnHover" data-toggle="modal" data-target="#pay">
            حجز الخزانة
          </button>
  

     
        </div>
      </div>
   </div>
  @endforeach
  
 
</div> 

<a href="{{url('/')}}" class="btn main_color second_color btnHover">العودة للصفحة الرئيسية</a>


<script src="{{asset('assets/js/jquery.slim.min.js')}}" ></script>
    <script src="{{asset('assets/js/popper.min.js')}}" ></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
   
  </body>
</html>