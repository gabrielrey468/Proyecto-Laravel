@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')
           
            <div class="card pub_image">
                <div class="card-header">

                    @if($image->user->image)
                    <div class="container-avatar">
                        <img src="{{ route('user.avatar', ['filename' => $image->user->image ]) }}" class="avatar">
                    </div>
                    @endif

                    <div class="data-user">
                        {{ $image->user->name.' '.$image->user->surname }}
                        <span class="nickname">
                            {{ ' | @ '.$image->user->nick }}
                        </span>
                    </div>
                </div>

                <div class="card-body">
                    <div class="image-container">
                        <img src="{{ route('image.file',['filename' => $image->image_path]) }}">
                    </div>
                </div>


                <div class="description">
                    <span class="nickname">{{ '@' .$image->user->nick }}</span>
                    <span class="nickname date">{{ '|' .FormatTime::LongTimeFilter($image->created_at) }}</span>
                    <p>{{ $image->description }}</p>
                </div>

                <div class="likes">

                    <img src="{{ asset('img/facebook-like.png') }}">
                    <img src="{{ asset('img/instagram.png') }}">

                </div>

                <div class="comments">
                    <a href="" class="btn btn-sm btn-warning btn-comments">
                        Comentarios ({{ count($image->comments) }})
                    </a>
                </div>

            </div>

           
        </div>
    </div>
</div>

@endsection