
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
                <button class="bg-success" id="newAdmin">Add new admin</button>
            </div>
        </div>        
        <hr>
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
    </div>   

        <!-- Modal -->
        <div class="modal fade" id="newAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
        <div class="modal-dialog modal-dialog-centered" role="document">


            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
        </div>
    @endif
</div>    
@endsection
