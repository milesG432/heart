
@extends('layouts.app')

@section('content')
<div class='container'>
    @if(Session::get('loggedIn') != 'true')
    <div class='alert alert-danger'>
        <H1>PLEASE USE THE NAVIGATION LINKS PROVIDED ON THE HOME PAGE AND ENSURE YOU ARE LOGGED IN</H1>
    </div>
    @else
    <div id='siteAdmins'>
        @if( count($errors) > 0)
        <div class="alert alert-danger" style="text-align: center">
            @foreach($errors as $error)
            <p>{{$error}}</p><br>
            @endforeach
        </div>
        @endif
        <div class="row">
            <div class="col">
                <h4>Current Site Admins</h4>
            </div>
            <div class="col">
                
            </div>
            <div class="col" id="newAdminButton">
                <button type="button" class="bg-success" data-toggle="modal" data-target="#basicExampleModal">
                    New Admin
                </button>
            </div>
        </div>        
        <hr>
        @if(isset($admins))
        <table id="adminTable" class='table table-hover'>
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Email Address</th>
                    <th>Access Level</th>
                    <th>Delete Admin</th>
                </tr>
            </thead>
            <tbody>                
                @foreach($admins as $admin)
                <tr>
                    <td>{{$admin->firstname}} {{$admin->surname}}</td>
                    <td>{{$admin->email}}</td>
                    <td>{{$admin->accessLevel}}</td>
                    <td><button class="btn-outline-warning">Delete Admin</button></td>
                </tr>
                @endforeach                
            </tbody>
        </table>
        @endif        
    </div>   

<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- new admin form  -->
                <form class="text-center border border-light p-5" method="post" action="/createAdmin">
                    <div class="form-row mb-4">
                        <div class="col">
                            <!-- First name -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name" name="firstName" required="required">
                        </div>
                        <div class="col">
                            <!-- Last name -->
                            <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name" name="lastName" required="required">
                        </div>
                    </div>

                    <!-- E-mail -->
                    <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail" name="email" required="required">

                    <!-- Password -->
                    <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" name="password" required="required">
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4" required="required">
                        At least 6 characters
                    </small>

                    <!-- Sign up button -->
                    <button class="btn btn-info my-4 btn-block" type="submit">Submit</button>
                    <hr>
                </form>
<!-- Default form register -->
            </div>            
        </div>
    </div>
</div>
    @endif
</div>    
@endsection
