@extends('user.layout')

@section('content')

<!-- about us-->

<div class="container-fluid p-0">
    <div class="row no-gutters">
        <div class="col-xs-12">
    <section class="about">
        <div class="bg-white">
        <div class="row">
        <div class="image">
            <img src="{{asset('user/img/bg3.jpg')}}" alt="">
            <div class="top-left">About Us</div>
            <h5><p>In today's fast-paced world, convenience and efficiency are paramount.
                The Laundry Online System is here to revolutionize the way you manage your laundry
                needs. Whether you're a busy professional, a student with a hectic schedule,
                or simply someone seeking a hassle-free laundry experience, our platform offers
                the perfect solution.
                <br><br>
                Our Laundry Online System is designed to provide you with a seamless and convenient 
                way to handle your laundry from start to finish. Say goodbye to the days of lugging
                heavy bags of dirty clothes to the local Laundromat or dealing with the stress of
                coordinating drop-off and pick-up times. With our user-friendly online platform,
                you can take control of your laundry with just a few clicks.</p></h5>
            </div>
        </div>
    </div>
    </div>
</div>
<hr>
    <br>
        <div class="content-1">
            <h3>Services</h3>
            <br>
            <div class="columns-3">
                <div class=""><img src="img/wash copy.png" style="width: 20%"></div>
                <div class=""><img src="img/fold copy.png" style="width: 25%"></div>
                <div class=""><img src="img/pickupdeliverylogo copy.png" style="width: 30%"></div>
            <div class="columns-4">
                <div class="fw-bold">○ Wash & Dry</div>
                <div class="fw-bold">○ Dry Cleaning</div>
                <div class="fw-bold">○ Pickup & Delivery</div>
            </div>
            <div class="columns-5">
                <div class="">Our wash and dry services provide a convenient and efficient solution for maintaining the cleanliness and freshness of your laundry, ensuring garments are expertly cleaned and promptly dried for your utmost convenience.</div>
                <div class="">Dry cleaning services offer professional garment cleaning using non-water-based solvents, providing an effective and gentle cleaning method for delicate fabrics and garments that cannot withstand traditional laundering.</div>
                <div class="">Effortlessly streamline your laundry routine with our convenient pickup and delivery services, ensuring fresh and clean garments delivered right to your doorstep.</div>
            </div>
        </div>

        </div>
    </section>
</div>

<section class="customer-review">
    <div class="container">
        <h4 class="title1">Customer's Review</h4>
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="profile">
                    <p class="fw-bold">Cardo Dalisay</p>
                    <img src="img/human.png" class="customer">
                    <blockquote>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur
                         ex possimus cum, optio consequatur fuga dolore ea esse sapiente architect
                    </blockquote>
                            <img src="img/rating.png" alt="">
                </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="profile">
                        <p class="fw-bold">Juan Dela Cruz</p>
                        <img src="img/human.png" class="customer">
                        <blockquote>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur
                             ex possimus cum, optio consequatur fuga dolore ea esse sapiente architect
                        </blockquote>
                                <img src="img/rating.png" alt="">
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="profile">
                        <p class="fw-bold">John Doe</p>
                        <img src="img/human.png" class="customer">
                        <blockquote>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur
                             ex possimus cum, optio consequatur fuga dolore ea esse sapiente architect
                        </blockquote>
                        <img src="img/rating.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
