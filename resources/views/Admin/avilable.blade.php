@extends('layoutAdmin')
@section('main')

 <div class="wrapper ">


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper cover_color">
          <!-- Content Header (Page header) -->
          <div class="content-header ">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">الخزائن المتوفرة</h1>
          
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item  ">الخزائن المتوفرة</li>
                    <li class="breadcrumb-item "><a href="{{url('admin')}}" class="colorText">الصفحة الرئيسية</a></li>

                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
        </div>
        </div>
        <div class=" d-flex align-content-stretch justify-content-between align-items-end mb-3">
            <button type="button" class="btn main_color mt-4 second_color btnHover " data-toggle="modal" data-target="#available">
         اضافة خزانة
        </button>
        <!-- <input type="search" class="form-control mr-2 text-right" id="search-input" placeholder="...البحث عن الكلية" style="display:inline-block ; width: 24%"> -->
 
   
</div>
            <div class="search pb-3">

@include('inc.message')
<div class="search-avilable text-right">
<form action="{{url('/searchAvilable')}}" method="get">
  @csrf
    <button class="btn main_color second_color btnHover" type="submit" >ابحث</button>
   
    <input type="text" name="search" required class="form-control mr-2" id="search-input" placeholder="...البحث عن طابق" />
    <input type="text" name="search" required class="form-control mr-2" id="search-input" placeholder="...البحث عن كلية" />

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
              </tr>
            </thead>
            <tbody>
                @foreach($avilables as $avilable)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$avilable->college}}</td>
                <td>{{$avilable->floor_no}}</td>
                <td>{{$avilable->cabinet_no}}</td>
              </tr>
           @endforeach
            </tbody>
          </table>
          {{$avilables->links('inc.paginator')}}

          
<div class="modal fade text-right" id="available" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title " id="exampleModalLabel">اضافة خزانة</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{url('avilableSend')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">اسم الكلية</label>
                  <input type="text" name="college" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">رقم الطابق</label>
                  <input type="text" name="floor_no" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">رقم الخزانة</label>
                    <input type="text" name="cabinet_no" class="form-control" id="exampleInputPassword1">
                  </div> 
            <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
          <button type="submit" class="btn btn-primary">ارسال </button>
        </div>
              </form>
        </div>
      
      </div>
    </div>
  </div>

        </div>
     </div>

    @endsection