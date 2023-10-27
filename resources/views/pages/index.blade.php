@extends('layouts.app')

@section('content')
    <div class="title text-center">
        <h1>{{$title}}</h1><br>
        <p>Манай сайт нь зар оруулж өөрийн хэрэглэхгүй байгаа bike аа түрээслэх. <br> Мөн дэлгүүр дээр бэлэн багаа bike нуудын үнэ зураг мэдээлэл зэргийг харж зээлийн шалгуур хангах эсхээ шалгахад зориулагдсан</p>
    </div>
    <img src="{{ asset('storage/cover_images/noimage.jpg') }}" alt="non" style="margin: 10ch">
    <img src="{{ asset('storage/cover_images/3955024_1698233982.png') }}" alt="non"style="margin: 10ch">
    <img src="{{ asset('storage/cover_images/3955024_1698233982.png') }}" alt="non"style="margin: 10ch">

@endsection
