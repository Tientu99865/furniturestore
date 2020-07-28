@extends('layout/index')
@section('content')
    <section>
        <div class="pageintro">
            <div class="pageintro-bg">
                <img src="images\bg-page_03.jpeg" alt="About Us">
            </div>
            <div class="pageintro-body">
                <h1 class="pageintro-title">{{$post->title}}</h1>
            </div>
        </div>
    </section>
    <section>
        <div class="container p-t-100 p-b-70 py-tn-50">
            <div class="row">
                <!-- Blog Single -->
                <div class="col-md-12">
                    <div class="blog-single">
                        <div class="blog-single-content">
                            <h3 class="post__title-1">{{$post->title}}</h3>
                            {!! $post->content !!}
                            <!-- Content -->
                        </div>
                    </div>
                </div>
                <!-- End Blog Single -->
            </div>
        </div>
    </section>
@endsection

