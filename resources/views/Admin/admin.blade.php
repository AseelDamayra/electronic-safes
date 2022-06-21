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
                  <h1 class="m-0">الصفحة الرئيسية</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item  ">الصفحة الرئيسية</li>
                    
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
        </div>
        </div>

         <!-- Main content -->
    <section class="content mt-5">
        <div class="container-fluid ">
          <!-- Small boxes (Stat box) -->
          <div class="row justify-content-around">
           
             <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box   p-5">
                <div class="inner  text-white">
                <h3>{{$avilable}}</h3>
                <p>الخزائن المتوفرة</p>
                </div>
                <div class="icon">
                    <i class='fas fa-window-restore'></i>
  
                </div>
                <a href="{{url('avilableC')}}" class="small-box-footer  ">معلومات اضافية<i class="fas fa-arrow-circle-right  text-white ml-2"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box   p-5">
                  <div class="inner  text-white">
                  <h3>{{$Notavilable}}</h3>
                  <p>الخزائن المحجوزة</p>
                  </div>
                  <div class="icon">
                    <i class='fas fa-hands-helping'></i>
    
                  </div>
                  <a href="{{url('mahjoza')}}" class="small-box-footer  ">معلومات اضافية<i class="fas fa-arrow-circle-right  text-white ml-2"></i></a>
                </div>
              </div>
            </div>
            <!-- ./col -->
          </div>
          
  </section>
        </div>
        </div>
         
    @endsection