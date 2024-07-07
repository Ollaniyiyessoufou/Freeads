<form class="" action="/search" method="post">
    <!-- <div class="text-gray mt-2 pl-4 fs-5 ">
        <labelfor="">Search by</label>
    </div> -->
    <div class="d-flex mt-4 px-4 justify-content-between ">
        @csrf
        <input class="form-control me-2" name="search" type="search" placeholder="Search by title" aria-label="title">
        <select class="js-select-single form-control me-2" data-live-search="true" name='category'>
            @foreach ($allAds as $ad)
                <option value="{{$ad->category_id}}">{{$ad->cat_name}}</option>
            @endforeach

            </select>

        <input class="form-control me-2" name="location" type="text" placeholder="Search by location" aria-label="location">

        <input class="form-control me-2" name="min_price" type="number" placeholder="Min Price" aria-label="Min Price">
        <input class="form-control me-2" name="max_price" type="number" placeholder="Max Price" aria-label="Max Price">

        <button class="btn btn-outline-primary" type="submit">Search</button>
    </div>
</form>

