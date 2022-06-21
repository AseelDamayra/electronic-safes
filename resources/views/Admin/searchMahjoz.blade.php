@extends('layoutAdmin')
@section('main')

        <table class="table text-right" style="width:80%;margin-left:20%" >
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
            @foreach($searchU as $s)
            @foreach($s->cabinets as $c)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$c->college}}</td>
                <td>{{$c->floor_no}}</td>
                <td>{{$c->cabinet_no}}</td>
                <td>{{$s->student_name}}</td>
                <td>{{$s->university_id }}</td>
                <td>{{$c->pivot->booking_finally_date }}</td>
                <td><a href="{{url("DeleteCAdmin/$s->id")}}" class="btn btn-danger ">
                    <i class="fa fa-trash"></i>
                </a>
                </td>
                
              </tr>
              @endforeach

           @endforeach
            </tbody>
          </table>
@endsection