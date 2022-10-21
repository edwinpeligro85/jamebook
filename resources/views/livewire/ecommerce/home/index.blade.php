<!--=================================
Hero Area
===================================== -->
@livewire('ecommerce.home.hero-area')

@push('js')
    <script>
        window.onload = function() {
            $('.category-nav').toggleClass('show');
        }
    </script>
@endpush
