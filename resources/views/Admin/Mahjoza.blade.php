@extends('layoutAdmin')
@section('main')

      
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper cover_color">
          <!-- Content Header (Page header) -->
          <div class="content-header ">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">الخزائن المحجوزة</h1>
                 
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item  ">الخزائن المحجوزة</li>
                    <li class="breadcrumb-item "><a href="admin.html" class="colorText">الصفحة الرئيسية</a></li>

                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
        </div>
        </div>
       
        <div class="search pb-3">

@include('inc.message')
<div class="search-avilable text-right">
<form action="{{url('/searchmahjoza')}}" method="get">
  @csrf
    <button class="btn main_color second_color btnHover" type="submit" >ابحث</button>
   
    <input type="text" name="search" required class="form-control mr-2" id="search-input" placeholder="...البحث عن طالب" />

</form>
</div>


</div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">اسم الكلية</th>
                <th scope="col">رقم الطابق</th>
                <th scope="col">رقم الخزانة</th>
                <th scope="col">اسم الطالب</th>
                <th scope="col">الرقم الجامعي</th>
                <th scope="col">تاريخ انتهاء الحجز</th>
                <th scope="col">الغاء الحجز</th>
               
              </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                @foreach($UC as $u)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$user->college}}</td>
                <td>{{$user->floor_no}}</td>
                <td>{{$user->cabinet_no}}</td>
               <td>{{$u->student_name}}</td>
               <td>{{$u->university_id}}</td>
               <td>{{$u->pivot->booking_finally_date}}</td>
            
                <td><a href="{{url("DeleteCAdmin/$user->id")}}" class="btn btn-danger ">
                    <i class="fa fa-trash"></i>
                </a>
                </td>
                
              </tr>
              @endforeach
           @endforeach
            </tbody>
          </table>

          
<div class="modal fade text-right" id="available" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">اضافة خزانة</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">اسم الكلية</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">رقم الطابق</label>
                  <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">رقم الخزانة</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                  </div> 
            <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
          <button type="button" class="btn btn-primary">ارسال </button>
        </div>
              </form>
        </div>
      
      </div>
    </div>
  </div>

        </div>
     </div>

        
   @endsection