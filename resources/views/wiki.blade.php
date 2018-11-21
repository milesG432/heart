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
        
    </div>
    
</div>







@endif

@endsection