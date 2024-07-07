<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">   <title>Document</title>
    <link rel="stylesheet" href={{ asset('css/ads.css') }}>
    <title>Ad</title>
</head>
<body>

    @include('navbar')

   <h1 class="text-center mt-5 ">AD DETAILS</h1>

@foreach ($ads as $ad)
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="row p-2 bg-white border rounded">
                    <div class="col-md-4 mt-1"><img class="img-fluid w-100 img-responsive rounded product-image" src={{asset('storage/images/'.$ad->ad_photo)}} style="max-height:330px;"></div>
                    <div class="col-md-5 mt-1">
                        <h5>{{$ad->ad_title}}</h5>
                        <div class="d-flex flex-row">
                            <div class="ratings mr-2"></div><span class="text-black-50">{{$ad->cat_name}}</span>
                        </div>
                        <p class="text-justify para mb-0">{{$ad->ad_description}}<br><br></p>
                        <div class="mt-1 mb-1 spec-1"><span class="me-1">Published at</span></span><span>{{$ad->ad_ca}}<br></span></div>
                        @if ($ad->ad_ca != $ad->ad_ua)
                            <div class="mt-1 mb-1 spec-1"><span class="me-1">Updated at</span></span><span>{{$ad->ad_ua}}</span></div>
                        @endif
                    </div>
                    <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                        <div class="d-flex flex-row align-items-center">
                            <h4 class="mr-1">${{$ad->ad_price}}</h4>
                        </div>
                        <div class="d-flex">
                            <h6 class="">Location :<h6 class="ms-2"> {{$ad->ad_loc}}</h6></h6>
                        </div>
                        <div class="d-flex mt-4"><h6 class="font-weight-bold text-primary">Published by <h6 class="ms-1 fst-italic"> {{$ad->ad_login}}</h6></h6></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

    @include('footer')

</body>
</html>
