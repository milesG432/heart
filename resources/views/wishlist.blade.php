@extends('layouts.app')

@section('content')
@if(Session::get('loggedIn') != 'true')
<div class="container">
    <div>
        <img src="/img/403.png">
    </div>
</div>

@else 
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
    <div class='container'>
        <div class="card" id="issuesIntro">
            <div class="card-title">
                <h5>Heart Systems wishlist</h5>
            </div>            
            <div class="card-text" style='text-align: center'>
                <p>Welcome to the Heart Systems wishlist. You can view the status of, and add your own wishlist items here, as well as voting for existing wishlist items.</p>                                
                    <p> ** Items with the most votes will be given priority for scheduling. ** </p>                
            </div>
        </div>
        <div class="row">
        <div class="col">
            <h4>Wishlist items</h4>
        </div>
        <div class="col">

        </div>
        <div class="col" id="newAdminButton">                
            <button type="button" class="bg-success" data-toggle="modal" data-target="#basicExampleModal">
                New wishlist item
            </button>                
        </div>
            @if(isset($wishList))
    <table id="adminTable" class='table table-hover'>
        <thead>
            <tr>
                <th>Product</th>                    
                <th>Wish</th>
                <th>Status</th>
                <th>Votes</th> 
                <th>Upvote</th>
            </tr>
        
        </thead>
        <tbody>                
            @foreach($wishList as $listItem)
            <tr>
                <td>{{$listItem->product}}</td>
                <td>{{$listItem->wish}}</td>
                <td>{{$listItem->status}}</td>
                <td>{{$listItem->votes}}</td>
                <td onclick="upvote({{$listItem->id}})" ><img class="icon" src="/img/icons/thumb-up.svg"></td>
            </tr>
            @endforeach                
        </tbody>
    </table>
    @endif
    </div>        
    <hr>        
    </div>
    
    <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New wish</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- new admin form  -->
                <form class="text-center border border-light p-5" method="post" action="/createWishlist" id="issueForm">
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4" required="required">
                        Please use this form to submit an item to the wishlist.
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
                    <textarea id="defaultRegisterFormCompany" class="form-control" placeholder="Request details" name="requestDescription" required="required"></textarea>
                    <br>                   
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