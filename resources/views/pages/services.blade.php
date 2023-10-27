@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>{{ $title }}</h1>
                    </div>

                    <div class="card-body text-center">
                        <div class="mb-3">
                            <a href="{{ $socialLinks['facebook'] }}" target="_blank" class="btn btn-primary">
                                <i class="fab fa-facebook-f"></i> Facebook
                            </a>
                            <br><br>
                            <a href="{{ $socialLinks['twitter'] }}" target="_blank" class="btn btn-info">
                                <i class="fab fa-twitter"></i> Twitter
                            </a>
                            <br><br>
                            <a href="{{ $socialLinks['discord'] }}" target="_blank" class="btn btn-secondary">
                                <i class="fab fa-discord"></i> Discord
                            </a>
                        </div>
                        <h2>Илүү ихийг манай сувагуудаас үзээрэй</h2>
                        <div>
                            <a href="{{ $socialLinks['instagram'] }}" target="_blank" class="btn btn-danger" style="background-color: blueviolet">
                                <i class="fab fa-instagram"></i> Instagram
                            </a>
                            <br><br>
                            <a href="{{ $socialLinks['youtube'] }}" target="_blank" class="btn btn-danger">
                                <i class="fab fa-youtube"></i> YouTube
                            </a>
                            <br><br>
                            <p>Phone: +976 9968-6368</p>
                            <p>Email: <a href="mailto:B200930070@erdenetis.edu.mn">B200930070@erdenetis.edu.mn</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
