@extends('admin.admin_master') @section('admin')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">


            <!-- Main content -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title " style="font-size: xx-large;">Change Password</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('password.update') }}" method="post">

                                    @csrf
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="form-group">

                                                <h5>Current Password<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="password" name="oldpassword" id="current_password"
                                                        class="form-control"  >
                                                    @error('oldpassword')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="form-group">

                                                <h5>New Password <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="password" name="password" id="password"
                                                        class="form-control"  >
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">

                                                <h5>Confirmed Password <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="password" name="password_confirmation"
                                                        id="password_confirmation" class="form-control"  >
                                                    @error('password_confirmation')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>



                                            <div class="text-xs-right">
                                                <input value="submit" type="submit" class="btn btn-rounded btn-info mb-5">
                                            </div>

                                        </div>





            <!-- 21222324 mdraihan4835@gmail.com    -->


                                    </div>




                            </div>



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

@endsection
