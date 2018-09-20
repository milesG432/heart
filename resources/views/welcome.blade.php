@extends('layouts.app')
@section('content')
<br><br>
<div id='intro' class='shadow-lg p-3 mb-5 bg-white rounded'>
    <div class="panel-body">
        <h2 id='headtext'>Run your business your way</h2>    
        <h5>Proven. Simple. Flexible. Affordable</h5><br>
        <p>Heart Systems are the leading supplier of software for small and medium sized Office Supplies companies in the UK and Ireland</p>
        <div id='linkButton' ><a href='/pulseoffice'>Find out more</a></div>
    </div>    
</div>

<div id="homeContent" class='panel-default' >
    <br><br>
    <div id="homeContentPanel" class="panel-body">
    <h2>Software for your office supplies business</h2>
    <p>Manage your sales, ordering and invoicing with Pulse by Heart Systems.</p>
    </div>
</div>

<div class="container" id="homeBoxContainer">
    <div class="row">
        <div class="col-sm" id="homeBox" style="background-color: #DA587D; margin-right: 50px;">
            <img src="img/home-setup.png" id="homeBoxImage">
            <strong><p>NO SET-UP </p></strong>
        </div>
        <div class="col-sm" id="homeBox" style="background-color: #8B6E95; margin-right: 50px;">
            <img src="img/home-training.png" id="homeBoxImage">
            <strong><p>MINIMAL TRAINING</p></strong>
        </div>
        <div class="col-sm" id="homeBox" style="background-color: #F2AA4D; margin-right: 50px;">
            <img src="img/home-disruption.png" id="homeBoxImage">
            <p>MINIMAL DISRUPTION</p>
        </div>
        <div class="col-sm" id="homeBox" style="background-color: #216A80;margin-right: 50px;">
            <img src="img/home-help.png" id="homeBoxImage">
            <p>HELP IS AT HAND</p>
        </div>
    </div>    
</div>
@endsection

    
    <!--https://blackrockdigital.github.io/startbootstrap-business-casual/index.html-->   

