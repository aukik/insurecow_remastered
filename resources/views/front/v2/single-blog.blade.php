@extends('front.v2.main')

@section('content')



    <!-- Start Breadcrumb
   ============================================= -->
    <div class="breadcrumb-area text-center shadow dark bg-fixed text-light" style="background-image: url('{{ asset('storage/' . $blog->image) }}');">

    <div class="container">
            <div class="row">
{{--                <div class="col-lg-8 offset-lg-2">--}}
{{--                    <h1>Partiality indulgence dispatched to of celebrated.</h1>--}}
{{--                    <nav aria-label="breadcrumb">--}}
{{--                        <ol class="breadcrumb">--}}
{{--                            <li><a href="index.html"><i class="fas fa-home"></i> Home</a></li>--}}
{{--                            <li class="active">Blog Single</li>--}}
{{--                        </ol>--}}
{{--                    </nav>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog
    ============================================= -->
    <div class="blog-area single full-blog full-blog default-padding">
        <div class="container">
            <div class="blog-items">
                <div class="row">
                    <div class="blog-content col-lg-10 offset-lg-1 col-md-12">

                        <div class="blog-style-two item">
                            <div class="thumb">
                                <a href="blog-single-with-sidebar.html"><img   src="{{ asset('storage/' . $blog->image) }}" alt="Thumb"></a>
{{--                                <div class="date"><strong>18</strong> <span>April, 2022</span></div>--}}
                            </div>
                            <div class="info">
                                <div class="meta">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fas fa-user-circle"></i> Admin</a>
                                        </li>
{{--                                        <li>--}}
{{--                                            <a href="#"><i class="fas fa-comments"></i> 26 Comments</a>--}}
{{--                                        </li>--}}
                                    </ul>
                                </div>
                                <p>
                                  {{$blog->description}}
                                </p>





                            </div>
                        </div>





                        <!-- Start Blog Comment -->
                        <div class="blog-comments">
                            <div class="comments-area">
                                <div class="comments-form">
                                    <div class="title">
                                        <h3>Leave a comments</h3>
                                    </div>
                                    <form action="#" class="contact-comments">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <!-- Name -->
                                                    <input name="name" class="form-control" placeholder="Name *" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <!-- Email -->
                                                    <input name="email" class="form-control" placeholder="Email *" type="email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group comments">
                                                    <!-- Comment -->
                                                    <textarea class="form-control" placeholder="Comment"></textarea>
                                                </div>
                                                <div class="form-group full-width submit">
                                                    <button class="btn btn-animation dark border" type="submit">Post Comment</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Comments Form -->

                    </div>
                </div>
            </div>
        </div>
    </div

@endsection
