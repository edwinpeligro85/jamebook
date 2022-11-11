<div class="inner-page-sidebar">
    <!-- Categories -->
    @if ($editorials->count() > 0)
        <div class="single-block">
            <h3 class="sidebar-title">Categories</h3>
            <ul class="sidebar-menu--shop">
                @foreach ($categories as $category)
                    <li><a href="">{{ $category->name }} ({{ $category->books->count() }})</a></li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Price -->
    {{-- <div class="single-block">
        <h3 class="sidebar-title">Fillter By Price</h3>
        <div class="range-slider pt--30">
            <div class="sb-range-slider"></div>
            <div class="slider-price">
                <p>
                    <input type="text" id="amount" readonly="">
                </p>
            </div>
        </div>
    </div> --}}

    <!-- Editorial -->
    @if ($editorials->count() > 0)
        <div class="single-block">
            <h3 class="sidebar-title">Editorial</h3>
            <ul class="sidebar-menu--shop menu-type-2">
                @foreach ($editorials as $editorial)
                    <li><a href="">{{ $editorial->name }} <span>({{ $editorial->books->count() }})</span></a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Language -->
    @if ($languages->count() > 0)
        <div class="single-block">
            <h3 class="sidebar-title">Language</h3>
            <ul class="sidebar-menu--shop menu-type-2">
                @foreach ($languages as $language)
                    <li><a href="">{{ $language->name }} <span>({{ $language->books->count() }})</span></a></li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Promotion Block -->
    <div class="single-block">
        <a href="" class="promo-image sidebar">
            <img src="image/others/home-side-promo.jpg" alt="">
        </a>
    </div>
</div>
