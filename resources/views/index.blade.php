<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset('css/ads.css') }}>
    <link rel="stylesheet" href={{ asset('css/style.css') }}>

    <title>Free ads</title>
</head>


<body>
    @include('navbar')
    @include('searchBar')

    <section id="gallery">
        <div class="container mt-5">
            <div class="row">

                @foreach ($allAds as $ad)

                <div class="col-12 col-lg-4 mb-5 ">
                    <div class="card h-100">
                        <img src={{asset('storage/images/'.$ad->ad_photo)}} alt="ad image" class="card-img-top img-card">
                        <div class="card-body">
                            <div class="d-flex justify-content ms-auto">
                                <h4 class="card-title text-body fw-bold">{{$ad->ad_title}}</h4>
                                <h6 class="ms-auto fnt">${{$ad->ad_price}}</h6>
                            </div>
                            <div>
                                <h6 class="text-black-50 text-uppercase">{{$ad->cat_name}}</h6>
                            </div>

                            <p class="card-text">{{$ad->ad_description}}</p>

                            <div class="d-flex text">
                                <h6 class="m-0 font-weight-bold text-primary">Published by <h6 class="ms-1 fst-italic"> {{$ad->ad_login}}</h6></h6>
                            </div>

                            <a href="{{ route('posts.show', $ad->ad_id) }}" class="btn btn-outline-primary btn-sm">More Details</a>
                            <a href="" class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>

                        </div>
                    </div>
                </div>

                    {{-- <div class="col-lg-3 mt-4 mb-4">
                        <div class="card h-100">
                            <img src={{asset('storage/images/'.$ad->ad_photo)}} alt="ad image" class="card-img-top img-card">
                            <div class="card-body">
                                <h5 class="card-title">{{$ad->ad_title}}</h5>
                                <div class="d-flex flex-row">
                                    <span class="text-black-50">{{$ad->cat_name}}</span>
                                </div>
                                <div class="d-flex flex-row">
                                    <span class="text-black-50">${{$ad->ad_price}}</span>
                                </div>
                                <p class="card-text">{{$ad->ad_description}}</p>
                                <a href="{{ route('posts.show', $ad->ad_id) }}" class="btn btn-outline-primary btn-sm">More Details</a>
                                <a href="" class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div> --}}
                @endforeach
            </div>

            {{-- {{$allAds->links("index")}} --}}
        </div>


    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @include('footer')

</body>

</html>
