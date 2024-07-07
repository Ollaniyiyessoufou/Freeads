<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset('css/ads.css') }}>
    <title>Free Ads</title>

</head>

<body>

    @include('navbar')

    @if (session()->has('message'))

    <div class="mt-8 mb-4">
        {{session('message')}}
    </div>
    @endif
    <div id="wrapper">


        <!-- Simple Tables -->
        <div class="card w-75 my-4 mx-auto">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <div class="text-center"><h5 class="m-0 font-weight-bold text-primary">My ads</h5></div>
            </div>

            <div class=" table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            {{-- <th>Ad ID</th> --}}
                            <th>Title</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>


                        {{-- {{$ads}} --}}
                        @foreach ($ads as $ad)
                        <tr>
                            {{-- <td>{{$ad->id}}</td> --}}
                            <td>{{$ad->ad_title}}</td>
                            <td>{{$ad->ad_price}}</td>
                            <td>{{$ad->cat_name}}</td>
                            <td>

                                <form action="{{ route('posts.destroy', $ad->ad_id) }}" method="POST">
                                    <a href="{{ route('posts.show', $ad->ad_id) }}" class="btn btn-primary mr-3">Show</a>
                                    <a href="{{ route('posts.edit', $ad->ad_id) }}" class="btn btn-info text-white ml-3">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
    </div>
    <!--Row-->

    </div>
    <!---Container Fluid-->
    </div>



    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
    @include('footer')

</body>

</html>
