@extends('admin.admin_master') @section('admin')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Form Validation</h3>

                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Form Validation</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('users.update',$editData->id)}}" method="post">

                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Role <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="usertype" id="select" required class="form-control">
                                        <option value="" disabled>Select  Role</option>
                                        <option value="Admin" {{ ($editData->usertype == 'Admin' ? 'selected' : ' ') }}>Admin</option>
                                        <option value="User" {{ ($editData->usertype == 'User' ? 'selected' : ' ') }}>User</option>
                                     </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">


                                                <div class="form-group">

                                                    <h5>User Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{ $editData->name}}" name="name" class="form-control" required> </div>
                                                </div>


                                            </div>

                                        </div>
                                        {{-- end row --}}

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-group">

                                                        <h5>User Email <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="email" value="{{ $editData->email}}" name="email" class="form-control" required> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">




                                            </div>

                                        </div>

                                    </div>



                                </div>
                                <div class="text-xs-right">
                                    <input value="submit" type="submit" class="btn btn-rounded btn-info mb-5">
                                </div>

                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
</div>

@endsection
