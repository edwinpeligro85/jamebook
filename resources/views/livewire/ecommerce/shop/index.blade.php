<div class="container">
    <div class="row">
        <div class="col-lg-9 order-lg-2">
            @livewire('ecommerce.shop.shop-toolbar')

            <div class="shop-product-wrap grid with-pagination row space-db--30 shop-border">
                @foreach ($books as $book)
                    <div class="col-lg-4 col-sm-6">
                        @livewire('ecommerce.shop.book-card', ['book' => $book], key('book-' . $book->id))
                    </div>
                @endforeach
            </div>

            <!-- Pagination Block -->
            <div class="row pt--30">
                <div class="col-md-12">
                </div>
            </div>
        </div>

        <div class="col-lg-3 mt--40 mt-lg--0">
            @livewire('ecommerce.shop.inner-page-sidebar')
        </div>
    </div>
</div>
