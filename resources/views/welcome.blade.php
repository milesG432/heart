@extends('layouts.app')
@section('content')
<div id="topBlock" class="container-fluid">    
    <div class="row">
        <div class="col-lg">

        </div>
        <div class="col-lg" id="topBlockContent">
            <h3>RUN YOUR BUSINESS YOUR WAY</h3>
            <p>Proven. Simple. Flexible. Affordable.</p>
            <p>Heart is the leading supplier of software for small and medium sized Office Supplies companies in the UK and Ireland.</p>                
        </div>
    </div>
    <div class="row">
        <div class="col-lg" id="topBlockContent2">
            <h3>Software for your office supplies business</h3>
            <p>Manage your sales, ordering and invoicing with PulseOffice by Heart Systems</p>
        </div>
        <div class="col-lg">

        </div>
    </div>
</div>    

<div class="container">

    <br>
    <div class="row">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" id="cardImg" src="/img/computer-cutout.png" alt="Card image cap">
                <div class="card-body">
                    <br><h5 class="card-title">PulseOffice</h5>
                    <p class="card-text">PulseOffice has been core to Office Supplies dealers for over a decade, let us show you why.</p>
                    <a href="/pulseoffice" class="btn btn-primary">Learn more</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" id="cardImg" src="/img/heartbus.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">PulseStore</h5>
                    <p class="card-text">PulseStore provides an effective and user friendly web presence with a simple yet flexible interface.</p>
                    <a href="/pulsestore" class="btn btn-primary">Learn more</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="width: 18rem;">

                <div class="card-body">
                    <h5 class="card-title">Keep informed</h5>
                    <a class="twitter-timeline" data-width="454" data-height="320" href="https://twitter.com/Heart_Systems?ref_src=twsrc%5Etfw">Tweets by Heart_Systems</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    <a href="https://twitter.com/heart_systems?lang=en" class="btn btn-primary">Follow</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="jumbotron" id="testimonial">
                    <h3 class="display-4">Initial quote</h3>                    
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Decathlon champion tom selleck nigel mansell albert einstein man markings, tom selleck nigel mansell hungarian chevron cripes village people albert einstein man markings dali dolor sit amet chevron decathlon champion.
                    Sergeant major ian botham lady magnets hair trimmer? D’artagnan dolor ipsum boxing champion class definer funny walk tudor philosopher blue oyster bar challenge you to a duel.</p>
                    <hr>
                    <p><i>John Marston</i></p>
                    <strong><i>Western Stationery</i></strong>
                </div>
            </div>
            <div class="carousel-item">
                <div class="jumbotron" id="testimonial">
                    <h3 class="display-4">Heart Systems rules!</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Decathlon champion tom selleck nigel mansell albert einstein man markings, tom selleck nigel mansell hungarian chevron cripes village people albert einstein man markings dali dolor sit amet chevron decathlon champion.
                    Sergeant major ian botham lady magnets hair trimmer? D’artagnan dolor ipsum boxing champion class definer funny walk tudor philosopher blue oyster bar challenge you to a duel.</p>
                    <hr>
                    <p><i>Alex Murphy</i></p>
                    <strong><i>Robocop academy</i></strong>
                </div>
            </div>
            <div class="carousel-item">
                <div class="jumbotron" id="testimonial">
                    <h3 class="display-4">Gav is awesome</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Decathlon champion tom selleck nigel mansell albert einstein man markings, tom selleck nigel mansell hungarian chevron cripes village people albert einstein man markings dali dolor sit amet chevron decathlon champion.
                    Sergeant major ian botham lady magnets hair trimmer? D’artagnan dolor ipsum boxing champion class definer funny walk tudor philosopher blue oyster bar challenge you to a duel.</p>
                    <hr>
                    <p><i>Mike Tyson</i></p>
                    <strong><i>Peace and love Ltd</i></strong>
                </div>
            </div>
        </div>
    </div>    
</div>




<div class="container">
    <div class="row" id="middleHome">
        <div class="col">
            <div class="view overlay">
                <div class="hexagon" id="hex1">
                    <img src="/img/home-setup.png" class="img-fluid " style="display: block;border:none;margin: 0 auto;">
                    <div class="mask flex-center rgba-pink-strong">
                        <p class="white-text">Remote set up ensures a quick and simple transition from one system to another</p>
                    </div>
                    <p>NO SET-UP</p>
                </div>    
            </div>
        </div>

        <div class="col">
            <div class="view overlay">
                <div class="hexagon2" id="hex1">
                    <img src="/img/home-training.png" class="img-fluid " style="display: block;border:none;margin: 0 auto;">
                    <div class="mask flex-center rgba-purple-strong">
                        <p class="white-text">PulseOffice and PulseStore are so intuitive and user friendly you will only need minimal training</p>
                    </div>
                    <p>MINIMAL TRAINING</p>
                </div>    
            </div>
        </div>

        <div class="col">
            <div class="view overlay">
                <div class="hexagon4" id="hex1">
                    <img src="/img/home-disruption.png" class="img-fluid " style="display: block;border:none;margin: 0 auto;">
                    <div class="mask flex-center rgba-teal-strong">
                        <p class="white-text">Our experienced team will get you set up and working faster than you think</p>
                    </div>
                    <p>MINIMAL DISRUPTION</p>
                </div>    
            </div>
        </div>

        <!--        <div class="col">
                    <div class="view overlay">
                        <div class="hexagon4" id="hex1">
                            <img src="/img/home-help.png" class="img-fluid " style="display: block;border:none;margin: 0 auto;">
                            <div class="mask flex-center rgba-teal-strong">
                                <p class="white-text">With a combined total of over 50 years supporting or users we have seen it all and fixed it as well.</p>
                            </div>
                            <p class="white-text">HELP IS AT HAND</p>
                        </div>    
                    </div>
                </div>-->
    </div>
</div>

@endsection


