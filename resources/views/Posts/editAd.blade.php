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
    <title>Change my ad</title>
</head>
<body>

    @include('navbar')



        @if (session()->has('message'))
            <div class="mt-3 mb-4 text-success">
                {{session('message')}}
            </div>
        @endif

        <div class="container d-flex mt-5 mb-5 ">

            <form class="col-md-6 offset-md-3 align-items-center border rounded-3 p-3 bg-white shadow box-area " action="{{route('posts.update',$ad->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                    <div class="form_items ">

                        <div class="mb-2">
                            <div class="mb-4 d-flex justify-content-center">
                                <img class='img-fluid' id="selectedImage" src={{asset('storage/images/'.$ad->photo)}}
                                alt="example placeholder" style="width: 300px; max-height:330px;" />
                            </div>

                            <div class="d-flex justify-content-center">
                                <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                                    <label class="form-label text-white m-1" for="customFile1">Choose image</label>
                                    <input type="file" name="image" class="form-control d-none" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
                                </div>

                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="form_label mb-1">Title :</label>
                            <input type="text" value="{{$ad->title}}" class="form-control rounded" name="title" >
                        </div>
                        <div class="text text-danger fst-italic mb-3">
                            @error('title')
                                {{$message}}
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form_label mb-1">Price :</label>
                            <input type="number" step="any" value="{{$ad->price}}" class="form-control rounded" name ="price">
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
                                {{-- <option value={{$ad->category_id}} @selected(true)>{{$ad->name}}</option> --}}
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
                            <input type="text" name="location" value="{{$ad->location}}" class="form-control rounded" >
                        </div>
                        <div class="text text-danger fst-italic mb-3">
                            @error('location')
                                {{$message}}
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form_label mb-1">Description :</label>
                            <textarea class="form-control" name ="description" aria-label="With textarea">{{$ad->description}}</textarea>
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

    </div>
    @include('footer')

    <script src="{{asset('js/image.js')}}"></script>
</body>
</html>
