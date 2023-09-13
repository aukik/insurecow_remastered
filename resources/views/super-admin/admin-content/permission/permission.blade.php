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
                                Permission Setup - Super Admin
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
                        <div class="card-header">Permission Setup - For <span
                                style="color:red;">[ {{ $specific_user->name }} - {{ $specific_user->role }} ]</span></div>
                        <div class="card-body">

                            {{-- ---------------------------------------- Super Admin Profile Creation ---------------------------------------- --}}

                            @if(session('permission'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('permission') }}
                                </div>
                            @endif

                            <form action="{{ route("permission.update",$permission->id) }}" method="post"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('put')



                                @if($permission->role == "f")
                                    <div class="row gx-3 mb-3">


                                        <label for="exampleFormControlSelect1">Cattle Registration [ Farmer Sided
                                            Permission
                                            ]</label>

                                        <select
                                            class="form-control form-control-solid mt-2" id="exampleFormControlSelect1"
                                            name="f_cattle_reg">
                                            <option @if( $permission->f_cattle_reg  == 1) selected @endif value="1">
                                                Accepted
                                            </option>
                                            <option @if( $permission->f_cattle_reg  == 0) selected @endif value="0">
                                                Denied
                                            </option>
                                        </select>
                                    </div>

                                    <div class="row gx-3 mb-3">


                                        <label for="exampleFormControlSelect1">Farmer Insurance [ Farmer Sided
                                            Permission
                                            ]</label>

                                        <select
                                            class="form-control form-control-solid mt-2" id="exampleFormControlSelect1"
                                            name="f_insurance">
                                            <option @if( $permission->f_insurance  == 1) selected @endif value="1">
                                                Accepted
                                            </option>
                                            <option @if( $permission->f_insurance  == 0) selected @endif value="0">
                                                Denied
                                            </option>
                                        </select>
                                    </div>

                                    <div class="row gx-3 mb-3">


                                        <label for="exampleFormControlSelect1">Farm Management [ Farmer Sided Permission
                                            ]</label>

                                        <select
                                            class="form-control form-control-solid mt-2" id="exampleFormControlSelect1"
                                            name="f_farm_management">
                                            <option @if( $permission->f_farm_management  == 1) selected
                                                    @endif value="1">
                                                Accepted
                                            </option>
                                            <option @if( $permission->f_farm_management  == 0) selected
                                                    @endif value="0">
                                                Denied
                                            </option>
                                        </select>
                                    </div>

                                @endif


                                @if($permission->role == "c")
                                    <div class="row gx-3 mb-3">


                                        <label for="exampleFormControlSelect1">Dashboard [ Company Sided Permission
                                            ]</label>

                                        <select
                                            class="form-control form-control-solid mt-2" id="exampleFormControlSelect1"
                                            name="c_dashboard">
                                            <option @if( $permission->c_dashboard  == 1) selected @endif value="1">
                                                Accepted
                                            </option>
                                            <option @if( $permission->c_dashboard  == 0) selected @endif value="0">
                                                Denied
                                            </option>
                                        </select>
                                    </div>

                                    <div class="row gx-3 mb-3">

                                        <label for="exampleFormControlSelect1">Registering Agent [ Company Sided
                                            Permission
                                            ]</label>

                                        <select
                                            class="form-control form-control-solid mt-2" id="exampleFormControlSelect1"
                                            name="c_register_agent">
                                            <option @if( $permission->c_register_agent  == 1) selected @endif value="1">
                                                Accepted
                                            </option>
                                            <option @if( $permission->c_register_agent  == 0) selected @endif value="0">
                                                Denied
                                            </option>
                                        </select>
                                    </div>

                                    <div class="row gx-3 mb-3">

                                        <label for="exampleFormControlSelect1">Insurance [ Company Sided Permission
                                            ]</label>

                                        <select
                                            class="form-control form-control-solid mt-2" id="exampleFormControlSelect1"
                                            name="c_insurance">
                                            <option @if( $permission->c_insurance  == 1) selected @endif value="1">
                                                Accepted
                                            </option>
                                            <option @if( $permission->c_insurance  == 0) selected @endif value="0">
                                                Denied
                                            </option>
                                        </select>
                                    </div>
                                @endif


                                <button class="btn btn-primary" type="submit">
                                    Save permission changes
                                </button>
                            </form>

                            {{-- ---------------------------------------- Super Admin Profile Creation ---------------------------------------- --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
