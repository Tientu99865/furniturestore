<section class="py-50">
    <div class="port-title">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h2 class="title">Sản phẩm của chúng tôi</h2>
                    <div class="title-border mx-auto m-b-35"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="port-body">
        <div class="container">
            <div class="grid">
                <div class="grid-filter">
                    <ul class="text-center">
                        {{FurnitureStoreShowCategories::show_categories_index($categories)}}
                    </ul>
                </div>
                <div class="grid-body row" data-layout="fitRows">
                    {{FurnitureStoreShowProducts::show_product_index($products)}}
                </div>
            </div>
        </div>
    </div>
</section>
