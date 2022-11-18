<!--=================================
    Hero Area
===================================== -->
@livewire('ecommerce.home.hero-area')

<!--=================================
    Home Features Section
===================================== -->
@livewire('ecommerce.home.features-section')

<!--=================================
    Promotion Section One
===================================== -->
@livewire('ecommerce.home.promotion-section-one')

<!--=================================
    Home Slider Tab
===================================== -->
@livewire('ecommerce.home.slider-tab')

@push('js')
    <script>
        window.onload = function() {
            $('.category-nav').toggleClass('show');
        }
    </script>
@endpush
