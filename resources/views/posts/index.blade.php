@extends('layouts.app')

@section('content')
    <h1 style="text-align: center">Боломжит зарууд</h1><br>
    @if(count($posts)>0)
        @foreach ($posts as $post)
        <div class="well">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <img style="width: 30%" src="/storage/cover_images/{{$post->cover_image}}" >
                </div>
                <br>
                <div class="col-md-8 col-sm-8">
                    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                    <p>{{$post->user->name}}-ийн {{$post->created_at}} нийтэлсэн нийтлэл</p>
                </div>
            </div>
        </div>
            
        @endforeach
        {{$posts->links()}}
    @else
        <p>Зар олдсонгүй</p>
    @endif
@endsection