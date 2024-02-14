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
                                Update Post- Super Admin
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
                        <div class="card-header">Update Post- Super Admin</div>
                        <div class="card-body">


                            @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('put')

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Enter title</label>
                                            <input type="text" id="exampleInputEmail1" aria-describedby="emailHelp"
                                                   placeholder="" name="title" value="{{$post->title}}"
                                                   class="form-control @error('title') is-invalid @enderror">

                                            @error('title')
                                            <div class="alert alert-danger"
                                                 style="margin-top: 10px">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>




                                    <div class="col-md-6" style=" ">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" id="formFile" name="image"
                                                   class="form-control @error('image') is-invalid @enderror">

                                            @error('image')
                                            <div class="alert alert-danger"
                                                 style="margin-top: 10px">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>





                                    <div class="col-md-6"  style="margin-top: 20px">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Enter description</label>
                                            <textarea type="text" id="exampleInputEmail1" aria-describedby="emailHelp"
                                                   placeholder="" name="description"
                                                      class="form-control @error('title') is-invalid @enderror">{{$post->description}}</textarea>

                                            @error('description')
                                            <div class="alert alert-danger"
                                                 style="margin-top: 10px">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Add other fields similarly -->
                                    <div class="col-md-12" style="margin-top: 15px">
                                        <input type="submit" value="Update Post" class="btn btn-success">
                                    </div>

                                    <br><br><br>

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
