
@extends('layouts.app')

@section('content')
<div class='container'>
    @if(Session::get('loggedIn') != 'true')
    <div class='alert alert-danger'>
        <H1>PLEASE USE THE NAVIGATION LINKS PROVIDED ON THE HOME PAGE AND ENSURE YOU ARE LOGGED IN</H1>
    </div>
    @else
    <div id='siteAdmins'>
        <h4>Current Site Admins</h4>
        <hr>
        <table id="userTable" class='table table-hover'>
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Email Address</th>
                    <th>Access Level</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    
                </tr>
            </tbody>
        </table>
    </div>
    @endif
</div>
    
@endsection
