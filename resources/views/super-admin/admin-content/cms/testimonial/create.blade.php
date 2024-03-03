@extends('super-admin.admin-panel.index')

@section('content')

    <main>
        <header
            class="page-header page-header-compact page-header-light border-bottom bg-white mb-4"
        >
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div
                        class="row align-items-center justify-content-between pt-3"
                    >
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon">
                                    <i data-feather="user"></i>
                                </div>
                                Create Post Data - Super Admin
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <div class="row">


                <div class="col-xl-12">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Create Testimonial Data - Super Admin</div>
                        <div class="card-body">


                            @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{route('testimonial.store')}}" method="post"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">

                                    <div class="row gx-3 mb-3">


                                        <div class="row gx-3 mb-3">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Enter title</label>
                                                    <input type="text" id="exampleInputEmail1"
                                                           aria-describedby="emailHelp"
                                                           placeholder="" name="title"
                                                           class="form-control @error('title') is-invalid @enderror">

                                                    @error('title')
                                                    <div class="alert alert-danger"
                                                         style="margin-top: 10px">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="image">Image(size:800X800)</label>
                                                    <input type="file" id="formFile" name="image"
                                                           class="form-control @error('image') is-invalid @enderror">

                                                    @error('image')
                                                    <div class="alert alert-danger"
                                                         style="margin-top: 10px">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>



                                            <div class="col-md-6" style="margin-top: 15px">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Enter Description</label>
                                                    <textarea type="text" id="exampleInputEmail1"
                                                              aria-describedby="emailHelp"
                                                              placeholder="" name="description"
                                                              class="form-control @error('description') is-invalid @enderror"> </textarea>

                                                    @error('description')
                                                    <div class="alert alert-danger"
                                                         style="margin-top: 10px">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>



                                        <!-- Add other fields similarly -->
                                        <div class="col-md-12">
                                            <input type="submit" value="Add testimonial" class="btn btn-success">
                                        </div>


                                        <!-- Add other form sections as needed -->

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
