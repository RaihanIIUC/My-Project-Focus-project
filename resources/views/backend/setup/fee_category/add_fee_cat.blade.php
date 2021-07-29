@extends('admin.admin_master') @section('admin')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">


        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title " style="font-size: xx-large;">Add Fee Category</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('store.fee.category') }}" method="post">

                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        <div class="form-group">

                                            <h5>Student Fee Category<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name"
                                                    class="form-control">
                                                @error('name')
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
