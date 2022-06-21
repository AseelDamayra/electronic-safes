@extends('layoutAdmin')
@section('main')


        <table class="table text-right" >
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">اسم الكلية</th>
                <th scope="col">رقم الطابق</th>
                <th scope="col">رقم الخزانة</th>
              </tr>
            </thead>
            <tbody>
                @foreach($search as $s)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$s->college}}</td>
                <td>{{$s->floor_no}}</td>
                <td>{{$s->cabinet_no}}</td>
              </tr>
           @endforeach
            </tbody>
          </table>

    @endsection