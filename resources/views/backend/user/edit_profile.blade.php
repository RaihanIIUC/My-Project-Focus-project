@extends('admin.admin_master')


@push('stylesheet')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endpush


@section('admin')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="container-full">
 <!-- Main content -->
<section class="content">

<!-- Basic Forms -->
<div class="box">
<div class="box-header with-border">
<h4 class="box-title">Manage Profile </h4>
</div>
<!-- /.box-header -->
<div class="box-body">
<div class="row">
<div class="col">
<form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">

@csrf
<div class="row">
<div class="col-12">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<h5>User Role <span class="text-danger">*</span></h5>
<div class="controls">
<select name="usertype" id="select" required class="form-control">
<option value="" disabled>Select Role</option>
<option value="Admin"
{{ ($edit->usertype == 'Admin' ? 'selected' : ' ') }}>
Admin</option>
<option value="User"
{{ ($edit->usertype == 'User' ? 'selected' : ' ') }}>
User</option>
</select>
</div>
</div>
</div>


 <div class="col-md-6">
<div class="form-group">
<h5>Gender<span class="text-danger">*</span></h5>
<div class="controls">
<select name="gender" id="select" required class="form-control">
<option value="" disabled>Select Gender</option>
<option value="Male"
{{ ($edit->usertype == 'Male' ? 'selected' : ' ') }}>
Male</option>
<option value="Female"
{{ ($edit->usertype == 'Female' ? 'selected' : ' ') }}>
Female</option>
</select>
</div>
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
<input type="email" value="{{ $edit->email }}" name="email" class="form-control" required> </div>
</div>
</div>
</div>

     <div class="col-md-6">


<div class="form-group">

<h5>User Address <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text" value="{{ $edit->address }}" name="address" class="form-control" required> </div>
</div>


</div>
</div>

<div class="row">
<div class="col-md-6">


<div class="form-group">

<h5>User Name <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text" value="{{ $edit->name }}" name="name" class="form-control" required> </div>
</div>


</div>



<div class="col-md-6">
<div class="form-group">
<h5>Profile Image <span class="text-danger">*</span></h5>
<div class="controls">
<input type="file"  id="image" name="image" class="form-control"  > </div>
</div>


<div class="form-group">
 <div class="controls">
     <img id = "showImage" style="width:100px; border:10px solid #000000;"

                            src="{{ (!empty($user->image)) ? url('upload/user_images/'.$user->image)
                             : url('upload/no_image.jpg')
                        }}"
     >
 </div>


</div>
</div>
</div>
</div>
<div class="text-xs-right">
<input value="submit" type="submit" class="btn btn-rounded btn-info mb-5">
</div>
</div>
{{-- end row --}}

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




 @endsection


@push('script')

<script type="text/javascript">
    $(document).ready(function () {
        $("#image").change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });

    // function readURL(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();

    //         reader.onload = function (e) {
    //             $('#showImage').attr('src', e.target.result);
    //         }
    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
    // $("#image").change(function () {
    //     readURL(this);
    // });

</script>

@endpush
