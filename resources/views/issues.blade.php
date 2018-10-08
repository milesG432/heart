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
                <h5>Heart Systems issue tracker</h5>
            </div>            
            <div class="card-text">
                <p>Welcome to the Heart Systems online issue tracker. From here you will be able to report issues to our support team as well as monitor the progress of any existing issues.</p>
            </div>
        </div>
        @if(Session::get('error'))
        <div class='alert-success' style='text-align: center'>
            <h5>You have no reported issues</h5>
        </div>
        @endif
        <div class="row">
            <div class="col">
                <h4>Your Current Issues</h4>
            </div>
            <div class="col">
                
            </div>
            <div class="col" id="newAdminButton">                
                <button type="button" class="bg-success" data-toggle="modal" data-target="#basicExampleModal">
                    New issue
                </button>                
            </div>
        </div>        
        <hr>
        @if(isset($issues))
        <table id="adminTable" class='table table-hover'>
            <thead>
                <tr>
                    <th>User Name</th>                    
                    <th>Company</th>
                    <th>Issue Desription</th>
                    <th>Reported Date</th>
                    <th>Estimated Date</th>
                    <th>Completed Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>                
                @foreach($issues as $issue)
                <tr onclick="editIssue({{$issue->id}})">
                    <td>{{$issue->firstname}} {{$issue->surname}}</td>
                    <td>{{$issue->company}}</td>
                    <td>{{$issue->desc}}</td>
                    <td>{{$issue->reportedDate}}</td>
                    <td>{{$issue->estimatedDate}}</td>
                    <td>{{$issue->completedDate}}</td>
                    <td>{{$issue->status}}</td>
                </tr>
                @endforeach                
            </tbody>
        </table>
        @endif
    </div>
    @endif
    
@endsection