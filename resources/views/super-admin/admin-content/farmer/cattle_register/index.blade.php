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
                                Animal Registration For Farmer - Super Admin
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
                        <div class="card-header"> Animal Registration</div>
                        <div class="card-body">

                            {{-- ---------------------------------------- Farmer Cow Registration ---------------------------------------- --}}


                            @if(session('register_goat'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('register_goat') }}
                                </div>
                            @endif

                            @if(session('register'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('register') }}
                                </div>
                            @endif

                            <form action="{{ route('register_cattle_from_super_admin_side.store') }}" method="post"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <!-- Form Group (username)-->

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">


                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >Farm Name</label
                                        ><span style="color: red">*</span>

                                        <select class="form-select" name="farm" id="farm_name">
                                            <option disabled>Select Farm</option>

                                            @if($farms->count() == 0)
                                                <option value="No Farm" selected>No Farm</option>
                                            @else
                                                @foreach($farms as $farm)
                                                    <option value="{{ $farm->id }}">{{ $farm->farm_name }}</option>
                                                @endforeach
                                            @endif


                                        </select>
                                    </div>


                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >Animal Type</label
                                        ><span style="color: red">*</span>

                                        <select class="form-select" name="animal_type" id="animal_type">
                                            <option value="cattle">Cattle</option>

                                            <option value="buffalo">Buffalo</option>

                                            <option value="goat">Goat</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >Animal Name</label
                                        ><span style="color: red">*</span>
                                        <input
                                            class="form-control "
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ old('cattle_name') }}"
                                            name="cattle_name"
                                        />

                                        @error('cattle_name')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >Animal Breed</label
                                        ><span style="color: red">*</span>
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ old('cattle_breed') }}"
                                            name="cattle_breed"
                                        />

                                        @error('cattle_breed')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >Animal Age</label
                                        ><span style="color: red">*</span>
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ old('age') }}"
                                            name="age"
                                        />

                                        @error('age')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >Animal Color</label
                                        ><span style="color: red">*</span>
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ old('cattle_color') }}"
                                            name="cattle_color"
                                        />

                                        @error('cattle_color')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    {{--                                    <div class="col-md-3">--}}
                                    {{--                                        <label class="small mb-1" for="inputLastName"--}}
                                    {{--                                        >Animal Weight</label--}}
                                    {{--                                        ><span style="color: red">*</span>--}}
                                    {{--                                        <input--}}
                                    {{--                                            class="form-control"--}}
                                    {{--                                            id="inputLastName"--}}
                                    {{--                                            type="text"--}}
                                    {{--                                            placeholder=""--}}
                                    {{--                                            value="{{ old('weight') }}"--}}
                                    {{--                                            name="weight"--}}
                                    {{--                                        />--}}

                                    {{--                                        @error('weight')--}}
                                    {{--                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>--}}
                                    {{--                                        @enderror--}}
                                    {{--                                    </div>--}}

                                </div>

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">


                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >Sum Insured</label
                                        ><span style="color: red">*</span>
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="number"
                                            placeholder=""
                                            value="{{ old('sum_insured') }}"
                                            name="sum_insured"
                                        />

                                        @error('sum_insured')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >Animal Weight</label
                                        ><span style="color: red">*</span>
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ old('weight') }}"
                                            name="weight"
                                        />


                                        @error('weight')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputOrgName"
                                        >Animal With Owner</label
                                        ><span style="color: red"></span>
                                        <input type="file" class="form-control" name="cow_with_owner">

                                        @error('cow_with_owner')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <!-- Form Group (organization name)-->
                                    {{--                                    <div class="col-md-4">--}}
                                    {{--                                        <label class="small mb-1" for="inputOrgName"--}}
                                    {{--                                        >Animal Left Side</label--}}
                                    {{--                                        ><span style="color: red">*</span>--}}
                                    {{--                                        <input type="file" class="form-control" name="left_side">--}}

                                    {{--                                        @error('left_side')--}}
                                    {{--                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>--}}
                                    {{--                                        @enderror--}}
                                    {{--                                    </div>--}}

                                </div>


                                <div class="row gx-3 mb-3">


                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputOrgName"
                                        >Animal Left Side</label
                                        ><span style="color: red">*</span>
                                        <input type="file" class="form-control" name="left_side">

                                        @error('left_side')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputOrgName"
                                        >Animal Right Side</label
                                        ><span style="color: red">*</span>
                                        <input type="file" class="form-control" name="right_side">

                                        @error('right_side')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputOrgName"
                                        >Special Marks</label
                                        ><span style="color: red">*</span>
                                        <input type="file" class="form-control" name="special_marks">

                                        @error('special_marks')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    {{--  -------------********************************* Muzzle part -------------********************************* --}}

                                    {{--                                    <div class="col-md-4" id="muzzle_of_cow">--}}
                                    {{--                                        <label class="small mb-1" for="inputOrgName"--}}
                                    {{--                                        >Muzzle Of Animal</label--}}
                                    {{--                                        ><span style="color: red">*</span>--}}
                                    {{--                                        <input type="file" class="form-control" name="muzzle_of_cow" id="fileInput">--}}

                                    {{--                                        @error('muzzle_of_cow')--}}
                                    {{--                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>--}}
                                    {{--                                        @enderror--}}
                                    {{--                                    </div>--}}


                                    {{--  -------------********************************* Muzzle part -------------********************************* --}}

                                </div>


                                <div class="row gx-3 mb-3">

                                    {{--  -------------********************************* Muzzle part -------------********************************* --}}

                                    <div class="col-md-4" id="muzzle_of_cow">
                                        <label class="small mb-1" for="inputOrgName"
                                        >Muzzle Of Animal</label
                                        ><span style="color: red">*</span>
                                        <input type="file" class="form-control" name="muzzle_of_cow" id="fileInput">

                                        @error('muzzle_of_cow')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    {{--  -------------********************************* Muzzle part -------------********************************* --}}

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >Registration for Farmer</label
                                        ><span style="color: red"></span>
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ $farmer->name }}"
                                            readonly
                                            name="user_name"
                                            style="background-color: white"
                                        />

                                        @error('cattle_color')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >Farmer ID Information</label
                                        ><span style="color: red"></span>
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ $farmer->id }}"
                                            readonly
                                            name="user_id_info"
                                            style="background-color: white"
                                        />

                                        @error('cattle_color')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>


                                </div>


                                <button class="btn btn-primary cattle_register_button" type="submit">
                                    Register Animal
                                </button>

                            </form>

                            {{-- ---------------------------------------- Farmer Cow Registration ---------------------------------------- --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>


        {{-- -------------------------------- Script file -------------------------------- --}}

        function handleAnimalTypeChange() {
            var selectElement = document.getElementById("animal_type");
            var muzzleDiv = document.getElementById("muzzle_of_cow");

            if (selectElement.value === "goat") {
                muzzleDiv.style.display = "none";
            } else {
                muzzleDiv.style.display = "block";
            }
        }

        document.getElementById("animal_type").addEventListener("change", handleAnimalTypeChange);
    </script>

    {{-- -------------------------------- Script file -------------------------------- --}}

@endsection
