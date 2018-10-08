
@extends('layouts.app')

@section('content')
<div class='container'>
    @if(Session::get('loggedIn') != 'true')
    <div class='alert alert-danger'>
        <H1>PLEASE USE THE NAVIGATION LINKS PROVIDED ON THE HOME PAGE AND ENSURE YOU ARE LOGGED IN</H1>
    </div>
    @else
    @if(Session::get('level') == 'admin')
    <div id='siteAdmins'>
        @if( Session::has('error'))
        <div class="alert alert-danger" style="text-align: center">            
            <h3>{{Session::get('error')}}</h3>
            
        </div>
        @endif
        @if(Session::has('message'))
        <div class="alert-success" style="text-align: center">
            <h3>{{Session::get('message')}}</h3>
        </div>
        @endif
        <div class="row">
            <div class="col">
                <h4>Current Site Users</h4>
            </div>
            <div class="col">
                
            </div>
            <div class="col" id="newAdminButton">                
                <button type="button" class="bg-success" data-toggle="modal" data-target="#basicExampleModal">
                    New user
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
                    <th>Company</th>
                    <th>Access Level</th>
                    <th>Delete Admin</th>
                </tr>
            </thead>
            <tbody>                
                @foreach($admins as $admin)
                <tr onclick="editAdmin({{$admin->id}})">
                    <td>{{$admin->firstname}} {{$admin->surname}}</td>
                    <td>{{$admin->email}}</td>
                    <td>{{$admin->company}}</td>
                    <td>{{$admin->accessLevel}}</td>
                    <td><a class="btn-outline-warning" href="/deleteAdmin?id={{$admin->id}}">Delete User</a></td>
                </tr>
                @endforeach                
            </tbody>
        </table>
        @endif        
    </div>
    @else
    <div class='container'>
        <div class='alert alert-danger' style='text-align: center'>
        <H1>You do not have sufficient access rights to view this page</H1>
    </div>
    </div>
    @endif

<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- new admin form  -->
                <form class="text-center border border-light p-5" method="post" action="/createAdmin" id="adminForm">
                    <div class="form-row mb-4">
                        <div class="col">
                            <!-- First name -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" id="id" value="">
                            <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name" name="firstName" required="required" autocomplete="firstName">
                        </div>
                        <div class="col">
                            <!-- Last name -->
                            <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name" name="lastName" required="required" autocomplete="lastName">
                        </div>
                    </div
                    <!-- Accesslevel -->                     
                        <select class="form-control" id="exampleFormControlSelect1" name="accessLevel" required>
                            <option value="">-- Access level --</option>
                            <option value="admin">Admin</option>
                            <option value="customer">Customer</option>         
                        </select>
                     <br>
                     <input type="text" id="defaultRegisterFormCompany" class="form-control" placeholder="Company" name="company">
                     <br>
                    <!-- E-mail -->
                    <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail" name="email" required="required" autocomplete="email">

                    <!-- Password -->
                    <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" name="password" required="required" autocomplete="password">
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
