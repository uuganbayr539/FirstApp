@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Хянах самбар') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="/posts/create" class="btn btn-primary">Зар оруулах</a><br><br>
                        <h3 style="color:blue">Таны оруулсан зарууд</h3><br>
                        @if (count($posts)>0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Зарын нэр</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td><a href="/posts{{$post->id}}/edit" class="btn btn-default">Засах</a></td>
                                        <td>
                                             {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Устгах', ['class' => 'btn btn-danger'])}}
                                            {!!Form::close()!!}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <p>Одоогоор зар оруулаагүй байна</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
