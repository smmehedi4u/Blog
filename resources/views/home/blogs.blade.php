@extends('home.layouts')

@section('content')
      <!-- services section start -->
      <div class="services_section layout_padding">
        <div class="container">
           <h1 class="services_taital">Services </h1>
           <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
           <div class="services_section_2">
              <div class="row">
                @foreach ($posts as $post)
                 <div class="col-md-4">
                    @if ($post->image)
                    <div>
                        <img src="{{ asset('images/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid" style="width: 500px; height: 300px; object-fit: cover;">
                    </div>
                @endif
                    <h4>{{ $post->title }}</h4>
                    <p>Post by {{ $post->name }}</p>
                    <div class="btn_main"><a href="{{  route('posts_details', $post->id)}}">Reading More</a></div>
                 </div>
                @endforeach
              </div>
           </div>
        </div>
     </div>
     <!-- services section end -->
@endsection
