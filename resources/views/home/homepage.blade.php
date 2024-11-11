@extends('home.layouts')

@section('content')
    <!-- services section start -->
    <div class="services_section layout_padding">
        <div class="container">
            <h1 class="services_taital">Services </h1>
            <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have
                suffered alteration</p>
            <div class="services_section_2">
                <div class="row">
                    @foreach ($post as $post)
                        <div class="col-md-4 mb-20">
                            @if ($post->image)
                                <div>
                                    <img src="{{ asset('images/' . $post->image) }}" alt="{{ $post->title }}"
                                        class="img-fluid" style="width: 500px; height: 300px; object-fit: cover;">
                                </div>
                            @endif
                            <h4>{{ $post->title }}</h4>
                            <p>Post by {{ $post->name }}</p>
                            <div class="btn_main"><a href="{{ route('posts_details', $post->id) }}">Reading More</a></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- services section end -->

    <div class="about_section layout_padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="about_taital_main">
                        <h1 class="about_taital">About Us</h1>
                        <p class="about_text">There are many variations of passages of Lorem Ipsum available, but the
                            majority have suffered alteration in some form, by injected humour, or randomised words which
                            don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need
                            to be sure there isn't anything embarrassing hidden in the middle of text. All </p>
                        <div class="readmore_bt"><a href="#">Read More</a></div>
                    </div>
                </div>
                <div class="col-md-6 padding_right_0">
                    <div><img src="images/about-img.png" class="about_img"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
