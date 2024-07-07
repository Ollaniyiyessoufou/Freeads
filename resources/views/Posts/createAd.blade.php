<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href={{ asset('css/ads.css') }}>
    <title>Create a new ad</title>
</head>
<body>

    @include('navbar')


    <div class="container d-flex mt-5 mb-5 ">

        <form class="col-md-6 offset-md-3 align-items-center border rounded-3 p-3 bg-white shadow box-area " action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="text text-danger text-center fst-italic mb-3">
                    @error('image')
                        {{$message}}
                    @enderror
                </div>
                <div class="form_items ">

                    <div class="mb-2">
                        <div class="mb-4 d-flex justify-content-center">
                            <img id="selectedImage" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
                            alt="example placeholder" style="width: 300px;" />
                        </div>

                        <div class="d-flex justify-content-center">
                            <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                                <label class="form-label text-white m-1" for="customFile1">Choose image</label>
                                <input type="file" name="image" class="form-control d-none" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
                            </div>

                        </div>
                    </div>

                    <input type="hidden" readonly="" name="user_id" value={{Auth::id()}}>

                    <div class="mb-2">
                        <label class="form_label mb-1">Title :</label>
                        <input type="text" class="form-control rounded" name="title" >
                    </div>
                    <div class="text text-danger fst-italic mb-3">
                        @error('title')
                            {{$message}}
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label class="form_label mb-1">Price :</label>
                        <input type="number" step="any" class="form-control rounded" name ="price">
                    </div>
                    <div class="text text-danger fst-italic mb-3">
                        @error('price')
                            {{$message}}
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label class="form_label mb-1">Category :</label>
                        <select class="js-select-single form-control" data-live-search="true" name='category'>
                            @foreach ($categories as $category)
                                <option value={{$category->id}}>{{$category->name}}</option>
                            @endforeach

                          </select>
                          <script type="text/javascript">
                                $(document).ready(function() {
                                    $('.js-select-single').select2();
                                });
                          </script>
                    </div>

                    <div class="mb-2">
                        <label class="form_label mb-1">Location :</label>
                        <input type="text" name="location" class="form-control rounded" >
                    </div>
                    <div class="text text-danger fst-italic mb-3">
                        @error('location')
                            {{$message}}
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label class="form_label">Description :</label>
                        <textarea class="form-control" name ="description" aria-label="With textarea"></textarea>
                    </div>
                    <div class="text text-danger fst-italic mb-3">
                        @error('description')
                            {{$message}}
                        @enderror
                    </div>

                    <div >
                        <input class="btn btn-primary" type="submit" value="Submit" name="sub_btn">
                    </div>

                </div>

        </form>
    </div>
<script src="{{asset('js/image.js')}}"></script>

@include('footer')

</body>
</html>
