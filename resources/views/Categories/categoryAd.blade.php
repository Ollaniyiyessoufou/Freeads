<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">   <title>Document</title>
    <link rel="stylesheet" href={{ asset('css/ads.css') }}>
    <title>View categories</title>
</head>
<body>

    @include('navbar')

        @if (session()->has('message'))
            <div class="mt-3 mb-4">
                {{session('message')}}
            </div>
        @endif

  <div id="wrapper">

    <!-- Simple Tables -->
            <div class="card w-75 my-4 mx-auto">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary">Number of Ads Per Category</h5>
                </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                        {{-- <th>Ad ID</th> --}}
                        <th>Name</th>
                        <th>Ads count per category</th>
                        <th>Delete all ads</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>

                        <td>{{$category->name_cat}}</td>
                        <td>{{$category->count}}</td>
                        <td>
                            <form action="{{ route('category.destroy', $category->cat_id) }}" method="POST" >
                                    @csrf
                                    @method('DELETE')

                                <button type="submit" class="btn btn-danger" onclick="return confirm('Sure Want DeleteThis Category ?')">Delete</button>
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

</body>
@include('footer')

</html>
