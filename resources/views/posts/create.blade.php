@extends('layouts.app')
@section ('content')
    <h1>Нийтлэх</h1>
    {!! Form:: open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('Гарчиг', 'Гарчиг')}}
            {{Form::text('Гарчиг', '', ['class' => 'form-control', 'placeholder' => 'Гарчиг'])}}
        </div>
        <div class="form-group">
            {{Form::label('Танилцуулга', 'Танилцуулга')}}
            {{Form::textarea('Танилцуулга', '', ['class' => 'form-control','placeholder' =>'Танилцуулга хаяг байршилаа үнэн зөв оруулбал таны зар хурдан шуурхай шийдэгднэ']) }} {{-- ckeditor  --}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        <br>
        {{Form::submit('Нийтлэх',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection