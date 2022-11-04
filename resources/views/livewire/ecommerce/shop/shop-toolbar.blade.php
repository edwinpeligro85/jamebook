<div class="shop-toolbar with-sidebar mb--30">
    <div class="row align-items-center">
        <div class="col-lg-2 col-md-2 col-sm-6">
            <!-- Product View Mode -->
            <div class="product-view-mode">
                <a href="#" class="sorting-btn active" data-target="grid"><em class="fas fa-th"></em></a>
                <a href="#" class="sorting-btn" data-target="grid-four">
                    <span class="grid-four-icon">
                        <em class="fas fa-grip-vertical"></em><em class="fas fa-grip-vertical"></em>
                    </span>
                </a>
            </div>
        </div>

        <div class="col-xl-4 col-md-4 col-sm-6  mt--10 mt-sm--0">
            <span class="toolbar-status">
                Showing {{ $perPage * $currentPage - $perPage + 1 }} to
                {{ $perPage * $currentPage > $total ? $total : $perPage * $currentPage }} of
                {{ $total }} ({{ $lastPage }} Pages)
            </span>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-6  mt--10 mt-md--0">
            <div class="sorting-selection">
                <span>Show:</span>
                <select id="itemsPerPage" wire:model="itemsPerPage" class="form-control nice-select sort-select">
                    <option value="6">6</option>
                    <option value="9">9</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
            <div class="sorting-selection">
                <span>Sort By:</span>
                <select id="sort-select" class="form-control nice-select sort-select mr-0">
                    <option value="publication_date-desc" selected="selected">
                        Default Sorting
                    </option>
                    <option value="title-asc">Sort By:Title (A - Z)</option>
                    <option value="title-desc">Sort By:Title (Z - A)</option>
                    <option value="price-asc">Sort By:Price (Low &gt; High)</option>
                    <option value="price-desc">Sort By:Price (High &gt; Low)</option>
                </select>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        window.onload = () => {
            $('#itemsPerPage').on('change', ({ target: { value } }) => Livewire.emit('updatedItemsPerPage', value));
            $('#sort-select').on('change', ({ target: { value } }) => Livewire.emit('updatedSortSelect', value.split('-')));
        }
    </script>
@endpush
