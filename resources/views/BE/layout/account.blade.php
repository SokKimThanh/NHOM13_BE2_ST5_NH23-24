@extends('BE.layout.nav_side_bar')
@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
    <div class="card-body row">
        <div class="col-5 text-center d-flex align-items-center justify-content-center">
        <div class="">
            <h2>Admin<strong>LTE</strong></h2>
            <p class="lead mb-5">123 Testing Ave, Testtown, 9876 NA<br>
            Phone: +1 234 56789012
            </p>
        </div>
        </div>
        <div class="col-7">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name='name' class="form-control" />
        </div>
        <div class="form-group">
            <label for="email">E-Mail</label>
            <input type="email" id="email" name="email" class="form-control" />
        </div>
        <div class="form-group">
            <label for="fullName">Full Name</label>
            <input type="text" id="fullName" name='fullName' class="form-control" />
        </div>
        <div class="form-group">
            <label for="permission">Permission</label>
            <select id="permission" name='permission' class="form-control">
                <option value="0">Admin</option>
                <option value="1">Customer</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="UPDATE">
        </div>
        </div>
    </div>
    </div>

</section>
@endsection