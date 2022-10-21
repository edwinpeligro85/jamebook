@if (Breadcrumbs::has())
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        @foreach (Breadcrumbs::current() as $crumbs)
                            @if ($crumbs->url() && !$loop->last)
                                <li class="breadcrumb-item"><a href="{{ $crumbs->url() }}">{{ $crumbs->title() }}</a></li>
                            @else
                                <li class="breadcrumb-item active">{{ $crumbs->title() }}</li>
                            @endif
                        @endforeach
                    </ol>
                </nav>
            </div>
        </div>
    </section>
@endif
