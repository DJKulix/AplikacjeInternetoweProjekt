<!doctype html>
<html lang="en">

@include('shared.header')
<body>
@include('shared.nav')
<main>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="storage/img/index/carousel1.jpg" class="d-block w-100" alt="...">
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>GrandMA 3 now available!</h1>
                        <p>Now you can rent the latest MA Lighting console</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="storage/img/index/carousel2.jpg" class="d-block w-100" alt="...">
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>New offer for recording studios</h1>
                        <p>You carry a recoring studio? We have a very special offer for you!</p>

                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="storage/img/index/carousel3.jpg" class="d-block w-100" alt="...">
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>Only Klotz Cables</h1>
                        <p>All our cables are made by Klotz - industry leader</p>

                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!--
    ==================================================
    -->


    <div class="container marketing">
        <!-- START THE FEATURETTES -->
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading fw-normal lh-1">Experience. <span class="text-muted"> That we got through the years.</span>
                </h2>
                <p class="lead">We have many years of experience in organizing events. We started with small neighborhood fests,
                    to organize concerts of the biggest stars now. Thanks to this, we are able to adapt our offer to your needs.
                    We have an extensive network of distributors and can ensure any equipment needs are met.</p>
            </div>
            <div class="col-md-5">
                <img src ="storage/img/index/feature1.jpg" width="100%" height="100%">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading fw-normal lh-1">Passion. <span class="text-muted">Because we love to do it.</span>
                </h2>
                <p class="lead">We provide services to small and large projects,
                    but we treat each client with the same care. The satisfaction of our clients is of the utmost importance to us. We are happy to listen to our clients' suggestions and we try to take them to heart.
                    All because event service is our passion.
                </p>
            </div>
            <div class="col-md-5 order-md-1">
                <img src ="storage/img/index/feature2.jpg" width="100%" height="100%">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-1">
                <h2 class="featurette-heading fw-normal lh-1">Twoje korzyści
                </h2>
                <p class="lead">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                    </svg>Advice from our experts<br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                    </svg>Satisfaction guaranteed<br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                    </svg>Biggest event service company in estern Poland<br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                    </svg>We guarantee a refund within 14 days.<br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                    </svg>  Equipment insurence included <br>
                </p>
            </div>
            <div class="col-md-5 order-md-2">
                <img src ="storage/img/index/feature3.jpg" width="100%" height="100%">
            </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->

</main>
</body>
</html>
@include('shared.footer')
