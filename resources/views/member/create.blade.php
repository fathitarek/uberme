@extends('layouts.app')
@section('content')
 {!! Form::open(array('url' => 'store')) !!}
<!-- Form::token();-->
        {!!Form::label('name','Name:')!!}
        {!!Form::text('name',null,array('class'=>'form-control'))!!}
        
        {!!Form::label('phone_number','phone_number:')!!}
        {!!Form::text('phone_number',null,array('class'=>'form-control'))!!}
        
        
        {!!Form::label('email','email:')!!}
        {!!Form::text('email',null,array('class'=>'form-control'))!!}
        {!!Form::submit('Add user',array('class'=>'form-control'))!!}
        {!! Form::close() !!}
<!--<form method="post" action="">
    <div class="form-group">
        <input name="name"  type="text" class="form-control" placeholder="name"/>   

    </div>
    <div class="form-group">
        <input name="phone_number" type="tel" class="form-control" placeholder="phone_number">   

    </div>
    <div class="form-group">
        <input name="email" type="email" class="form-control" placeholder="email">   

    </div>
    <div class="form-group">
        <input  type="submit"  value="Add" class="btn-primary">   -->

    </div>
</form>
        @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection            