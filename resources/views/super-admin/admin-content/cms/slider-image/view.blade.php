@extends('super-admin.admin-panel.index')

@section('content')

    @if(session('update') != null)
        <p>{{ session('update') }}</p>

    @elseif(session('delete') != null)
        <p>{{ session('delete') }}</p>
    @endif


    {{-- ---------------------------- main layer ---------------------------- --}}

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
                                View Slider Image - Super Admin
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
                        <div class="card-header">View Slider Image - Super Admin</div>
                        <div class="card-body">


                            @if(session('register'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('register') }}
                                </div>
                            @endif


                            <table id="datatablesSimple" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Title</th>

                                    <th>Image</th>

                                    <th>Update</th>
                                    <th>Delete</th>

                                </tr>
                                </thead>
                                <tbody>

                                <?php $id = 0 ?>
                                {{--        @foreach($courses as $course)--}}
                                {{--            <tr>--}}
                                {{--                <td>{{ $id += 1 }}</td>--}}
                                {{--                <td>{!!$course->title !!}</td>--}}

                                {{--                <td><img src="{{ asset('storage/'.$course->image) }}" alt="" style="width: 100px"></td>--}}


                                {{--                <td><a href="{{ route('course.edit',$course->id) }}" class="btn btn-info">Update</a></td>--}}
                                {{--                <td>--}}
                                {{--                    <form action="{{ route('course.destroy',$course->id) }}" method="post">--}}
                                {{--                        {{ csrf_field() }}--}}
                                {{--                        @method('delete')--}}
                                {{--                        <input type="submit" value="Delete" class="btn btn-danger">--}}
                                {{--                    </form>--}}
                                {{--                </td>--}}

                                {{--            </tr>--}}
                                {{--        @endforeach--}}
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    {{-- ---------------------------- main layer ---------------------------- --}}

@endsection
