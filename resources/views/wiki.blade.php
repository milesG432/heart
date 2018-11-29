@extends('layouts.app')

@section('content')
@if(Session::get('loggedIn') != 'true')
<div class="container">
    <div>
        <img src="/img/403.png">
    </div>
</div>

@else 
<div class="container">
    <div class="card" id="issuesIntro">
        <div class="card-title">
            <h5>Heart Systems wiki</h5>
        </div>            
        <div class="card-text">
            <p>Welcome to the Heart Systems wiki page. This should be your first stop, if you have a problem, a question, or just need some inspiration.</p>
        </div>
    </div>
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
        @if(Session::get('level') == 'admin')
        <div class="col" id="newAdminButton">                
            <button type="button" class="bg-success" data-toggle="modal" data-target="#basicExampleModal">
                New wiki entry
            </button>                
        </div>
        @endif
    </div>
    
</div>
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Issue</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- new admin form  -->
                <form class="text-center border border-light p-5" method="post" action="/createIssue" id="issueForm">
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4" required="required">
                        Please use this form to report issues. Once the issue has moved from a status of Queued to In progress it will be given an estimated completion date.
                    </small>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" id="id" value="{{Session::get('id')}}">                                                                        
                    <select class="form-control" id="exampleFormControlSelect1" name="product" required>
                        <option value="">-- Product --</option>
                        <option value="PulseOffice">PulseOffice</option>
                        <option value="Hosted Pulse">Hosted Pulse</option>
                        <option value="PulseStore">PulseStore</option>         
                    </select>
                    <br>                     
                    <textarea id="defaultRegisterFormCompany" class="form-control" placeholder="Issue details" name="issueDescription" required="required"></textarea>
                    <br>
                    @if(Session::get('level') == 'admin')
                    <select class="form-control" id="woo" name="status" required="required">
                        <option value="">-- Issue status --</option>
                        <option value="Queued">Queued</option>
                        <option value="In Progess">In progress</option>         
                        <option value="Completed">Completed</option>     
                        <option value="Blocked">Blocked</option>
                    </select>
                    <br>
                    <input class='form-control' name='estimatedDate' type="text" id="datepicker" placeholder='Estimated date' autocomplete="off">
                    @endif
                    <br>
                    <button class="btn btn-info my-4 btn-block" type="submit">Submit</button>
                    <hr>
                </form>
                <!-- Default form register -->
            </div>            
        </div>
    </div>
</div>







@endif

@endsection