@extends('layouts.app')
@section('content')
<!--top section, picture and overlay -->
<div id="pulseStoreTopBlock" class="container-fluid">    
    <div class="row">        
        <div class="col-lg" id="topBlockContentPulseStore">
            <h3 style="color:#8B99CA">PulseStore</h3>
            <p>PulseStore from Heart Systems is a feature rich e-commerce software that links seamlessly into PulseOffice</p>
            <ul>
                <li>Great for your staff (there’s no easier system to manage).</li>
                <li>Great for your trade customers (they can login to place orders whenever it suits them).</li>
                <li>Great for Sales (open your business to Internet customers).</li>
            </ul>
            <p>PulseOffice and PulseStore, the perfect combination for progressive Office Supplies.</p>
        </div>
    </div>
<!-- Midsection descriptive text -->
</div>  
    <div class="container">
        <div class="row" id="middleHome">
            <div class="col">
                <h3 style="color:#8B99CA">INTRODUCING PULSESTORE</h3>
                <p>PulseStore allows you to take orders (and if you wish, payments) via the Internet. You may have a current website and prefer to link to your new ‘shop’ site, or you may prefer it to be a separate entity living at a separate web address. It may be primarily as a valuable new service for your existing customers, or it might be a consumer site attracting all new business.</p>

                <p>PulseStore is extremely flexible. It is designed to give you great control over the way your site looks and the fresh content you wish to present.</p>

                <p>From the colour or graphics used on the site, to special offers or features you would like to use - you are in control.</p>  
                <br>
                <a id="browseButton" href="https://www.heartbusinesssupplies.co.uk/">Browse our sample store</a>
                <br>
            </div>
        </div>
    </div>
<!-- coloured mid bar -->
<div class="container-fluid">
    <div class="row" id="storeMid">
        <div class="col">
            
        </div>
        <div class="col">
            <p style="font-size:1.5em;color:whitesmoke;">Contact us on 01568 617 611 to learn more</p>        
        </div>
        <div class="col">
            
        </div>        
    </div>
</div>
<!-- bottom hexagons -->
<div class="container">
    <div class="row" id="middleHome">
        <div class="col">
            <div class="view overlay">
                <div class="hexagon" id="hex1">
                <img src="/img/product-store-integrated.png" class="img-fluid " style="display: block;border:none;margin: 0 auto;">
                    <div class="mask flex-center rgba-pink-strong">
                        <p class="white-text">PulseOffice integrates seamlessly with PulseStore, enabling easy and efficient management of orders from placement to completion</p>
                    </div>
                    <p>INTEGRATED!</p>
                </div>    
            </div>
        </div>
        
        <div class="col">
            <div class="view overlay">
                <div class="hexagon5" id="hex1">
                    <img src="/img/product-store-contract.png" class="img-fluid " style="display: block;border:none;margin: 0 auto;">
                    <div class="mask flex-center rgba-cyan-strong">
                        <p class="white-text">No fixed term contract, giving you flexibility and peace of mind</p>
                    </div>
                    <p>NO FIXED CONTRACT</p>
                </div>    
            </div>
        </div>
        
        <div class="col">
            <div class="view overlay">
                <div class="hexagon3" id="hex1">
                    <img src="/img/product-store-flexible.png" class="img-fluid " style="display: block;border:none;margin: 0 auto;">
                    <div class="mask flex-center rgba-orange-strong">
                        <p class="white-text">Both PulseOffice and PulseStore are endlessly customisable, to ensure you can work in a way that suits you..</p>
                    </div>
                    <p>FLEXIBLE</p>
                </div>    
            </div>
        </div>
        
        <div class="col">
            <div class="view overlay">
                <div class="hexagon4" id="hex1">
                    <img src="/img/product-store-features.png" class="img-fluid " style="display: block;border:none;margin: 0 auto;">
                    <div class="mask flex-center rgba-teal-strong">
                        <p class="white-text">xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Put stuff here</p>
                    </div>
                    <p class="white-text">FEATURE RICH</p>
                </div>    
            </div>
        </div>
    </div>
</div>

@endsection