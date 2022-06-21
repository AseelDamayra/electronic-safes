@if(session('success'))
<div class="alert alert-success text-right">
{{session('success')}}
</div>
@endif

@if(session('danger'))
<div class="alert alert-danger text-right">
{{session('danger')}}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger text-right">
    @foreach($errors->all() as $error)
      <p>{{$error}}</p>
    @endforeach
</div>
@endif