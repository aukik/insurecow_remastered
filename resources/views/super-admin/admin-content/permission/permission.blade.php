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
                                style="color:red;">[ {{ $specific_user->name }} - {{ $specific_user->role }} ]</span>
                        </div>
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

                                    <div class="row">
                                        <div class="col-md-5">

                                            <div style="color: #0a3622; font-weight: bold">Panel Permission</div>
                                            <hr style="color: #0a3622; font-weight: bold">

                                            <div class="row gx-3 mb-3 align-items-center">
                                                <div class="col-auto">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="hidden"
                                                               name="f_cattle_reg"
                                                               value="0">
                                                        <input class="form-check-input" type="checkbox"
                                                               id="exampleFormControlSelect1"
                                                               name="f_cattle_reg" value="1"
                                                               @if($permission->f_cattle_reg == 1) checked @endif>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <label for="exampleFormControlSelect1">Cattle Registration [ Farmer
                                                        Sided
                                                        Permission
                                                        ]</label>
                                                </div>
                                            </div>

                                            <div class="row gx-3 mb-3 align-items-center">
                                                <div class="col-auto">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="hidden" name="f_insurance"
                                                               value="0">
                                                        <input class="form-check-input" type="checkbox"
                                                               id="exampleFormControlSelect1"
                                                               name="f_insurance" value="1"
                                                               @if($permission->f_insurance == 1) checked @endif>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <label for="exampleFormControlSelect1">Animal Insurance [ Farmer
                                                        Sided
                                                        Permission ]</label>
                                                </div>
                                            </div>

                                            <div class="row gx-3 mb-3 align-items-center">
                                                <div class="col-auto">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="hidden"
                                                               name="f_farm_management"
                                                               value="0">
                                                        <input class="form-check-input" type="checkbox"
                                                               id="exampleFormControlSelect1"
                                                               name="f_farm_management" value="1"
                                                               @if($permission->f_farm_management == 1) checked @endif>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <label for="exampleFormControlSelect1">Farm Management [ Farmer
                                                        Sided
                                                        Permission
                                                        ]</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-7">

                                            <div style="color: #0a3622; font-weight: bold">Animal Registration
                                                Permission
                                            </div>
                                            <hr style="color: #0a3622; font-weight: bold">

                                            <div class="row gx-3 mb-3 align-items-center">
                                                <div class="col-auto">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="hidden" name="cattle"
                                                               value="0">
                                                        <input class="form-check-input" type="checkbox"
                                                               id="exampleFormControlSelect1"
                                                               name="cattle" value="1"
                                                               @if($permission->cattle == 1) checked @endif>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <label for="exampleFormControlSelect1">Farmer can register with
                                                        animal type
                                                        Cattle</label>
                                                </div>
                                            </div>

                                            <div class="row gx-3 mb-3 align-items-center">
                                                <div class="col-auto">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="hidden" name="buffalo"
                                                               value="0">
                                                        <input class="form-check-input" type="checkbox"
                                                               id="exampleFormControlSelect1"
                                                               name="buffalo" value="1"
                                                               @if($permission->buffalo == 1) checked @endif>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <label for="exampleFormControlSelect1">Farmer can register with
                                                        animal type
                                                        Buffalo</label>
                                                </div>
                                            </div>

                                            <div class="row gx-3 mb-3 align-items-center">
                                                <div class="col-auto">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="hidden" name="goat"
                                                               value="0">
                                                        <input class="form-check-input" type="checkbox"
                                                               id="exampleFormControlSelect1"
                                                               name="goat" value="1"
                                                               @if($permission->goat == 1) checked @endif>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <label for="exampleFormControlSelect1">Farmer can register with
                                                        animal type
                                                        Goat</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endif


                                @if($permission->role == "c")

                                    <div style="color: #0a3622; font-weight: bold">Panel Permission</div>
                                    <hr style="color: #0a3622; font-weight: bold">

                                    <div class="row gx-3 mb-3 align-items-center">
                                        <div class="col-auto">
                                            <div class="form-check">
                                                <input class="form-check-input" type="hidden" name="c_dashboard"
                                                       value="0">
                                                <input class="form-check-input" type="checkbox"
                                                       id="exampleFormControlSelect1"
                                                       name="c_dashboard" value="1"
                                                       @if($permission->c_dashboard == 1) checked @endif>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <label for="exampleFormControlSelect1">Dashboard [ Company Sided Permission
                                                ]</label>
                                        </div>
                                    </div>



                                    <div class="row gx-3 mb-3 align-items-center">
                                        <div class="col-auto">
                                            <div class="form-check">
                                                <input class="form-check-input" type="hidden" name="c_register_agent"
                                                       value="0">
                                                <input class="form-check-input" type="checkbox"
                                                       id="exampleFormControlSelect1"
                                                       name="c_register_agent" value="1"
                                                       @if($permission->c_register_agent == 1) checked @endif>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <label for="exampleFormControlSelect1">Registering Farmer [ Company Sided
                                                Permission ]</label>
                                        </div>
                                    </div>

                                    <div class="row gx-3 mb-3 align-items-center">
                                        <div class="col-auto">
                                            <div class="form-check">
                                                <input class="form-check-input" type="hidden" name="c_insurance"
                                                       value="0">
                                                <input class="form-check-input" type="checkbox"
                                                       id="exampleFormControlSelect1"
                                                       name="c_insurance" value="1"
                                                       @if($permission->c_insurance == 1) checked @endif>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <label for="exampleFormControlSelect1">Company Will be able to create
                                                Insurance Packages</label>
                                        </div>
                                    </div>

                                    <div class="row gx-3 mb-3 align-items-center">
                                        <div class="col-auto">
                                            <div class="form-check">
                                                <input class="form-check-input" type="hidden" name="c_without_insurance"
                                                       value="0">
                                                <input class="form-check-input" type="checkbox"
                                                       id="exampleFormControlSelect1"
                                                       name="c_without_insurance" value="1"
                                                       @if($permission->c_without_insurance == 1) checked @endif>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <label for="exampleFormControlSelect1">Company will be able to insure
                                                animals to another company</label>
                                        </div>
                                    </div>

                                    <div class="row gx-3 mb-3 align-items-center">
                                        <div class="col-auto">
                                            <div class="form-check">
                                                <input class="form-check-input" type="hidden"
                                                       name="c_cattle_reg_and_claim"
                                                       value="0">
                                                <input class="form-check-input" type="checkbox"
                                                       id="exampleFormControlSelect1"
                                                       name="c_cattle_reg_and_claim" value="1"
                                                       @if($permission->c_cattle_reg_and_claim == 1) checked @endif>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <label for="exampleFormControlSelect1">Company can register farmers and
                                                claim insurance</label>
                                        </div>
                                    </div>
                                @endif

                                <br>

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
