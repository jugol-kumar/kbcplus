<div class="pt-3 pb-2 rounded osahan-categories">
    <div class="d-flex align-items-center mb-2">
        <h5 class="m-0 text-white">What do you looking for?</h5>
    </div>
    <div class="categories-slider">
        @foreach($brands as $brand)
            <div class="col-c">
            <div class="bg-white shadow-sm rounded text-center my-2 px-2 py-3 c-it">
                <a href="{{ route('front.brand.product', $brand->id) }}">
                    <img src="{{ $brand->brand_logo }}" class="img-fluid px-2 mx-auto">
                    <p class="m-0 pt-2 text-muted text-center">{{ $brand->name }}</p>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
