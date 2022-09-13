<div class="sticky-init fixed-header common-sticky">
    <div class="container d-none d-lg-block">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <a href="index.html" class="site-brand">
                    <img src="{{ asset('images/logo.png') }}" alt="" />
                </a>
            </div>
            <div class="col-lg-8">
                <div class="main-navigation flex-lg-right">
                    @include('partials.header.nav-links', ['class' => 'main-menu menu-right'])
                </div>
            </div>
        </div>
    </div>
</div>
