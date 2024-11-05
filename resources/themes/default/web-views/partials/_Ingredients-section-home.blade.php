@if ($Ingredients->count() > 0 )
<section class="pb-4 rtl mt-4">
    <div class="container-fluid">
        <div>
            <div class="card __shadow h-100 max-md-shadow-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="categories-title m-0">
                            <span class="font-semibold">{{ translate('Ingredients')}}</span>
                        </div>
                        <div>
                            <a class="text-capitalize view-all-text web-text-primary"
                                href="{{route('ingredients')}}">{{ translate('view_all')}}
                                <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1 float-left' : 'right ml-1 mr-n1'}}"></i>
                            </a>
                        </div>
                    </div>

                    <div class="d-none d-md-block">
                        <div class="row mt-3">
                            @foreach($Ingredients as $key => $ingredientsData)
                            @if ($key<10)
                                <div class="text-center __m-5px __cate-item">
                                <a href="{{route('ingredients-details',['id'=> $ingredientsData['id'],'data_from'=>'category','page'=>1])}}">
                                    <div class="__img">
                                        <img alt="{{ $ingredientsData->name }}"
                                            src="{{ getStorageImages(path:$ingredientsData->icon_full_url, type: 'category') }}">
                                    </div>
                                    <p class="text-center fs-13 font-semibold mt-2">{{Str::limit($ingredientsData->name, 12)}}</p>
                                </a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="d-md-none">
                    <div class="owl-theme owl-carousel categories--slider mt-3">
                        @foreach($Ingredients as $key => $ingredientsData)
                        @if ($key<10)
                            <div class="text-center m-0 __cate-item w-100">
                            <a href="{{route('ingredients-details',['id'=> $ingredientsData['id'],'data_from'=>'category','page'=>1])}}">
                                <div class="__img mw-100 h-auto">
                                    <img alt="{{ $ingredientsData->name }}"
                                        src="{{ getStorageImages(path: $ingredientsData->icon_full_url, type: 'category') }}">
                                </div>
                                <p class="text-center small mt-2">{{Str::limit($ingredientsData->name, 12)}}</p>
                            </a>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<!-- <section>
    <div class="recently-post" id="recently-post ">
        <div class="container-fluid">
            <h4 class="font-semibold recently text-center">Recently-Post</h4>
            <div class="row">
            <div class="col-lg-2 col-6 col-sm-4 col-md-3 d-md-block px-max-md-0 mt-2">
                <div class="product-single-hover shadow-none rtl">
                    <div class="overflow-hidden position-relative">
                        <div class="inline_product clickable">
                            <span class="for-discount-value-null"></span>
                            <a href="https://new.healthandblossom.com/product/delay-ageing-face-wash-gotukola-b4tJJw">
                                <img src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-08-20-66c428f53869d.webp" alt="">
                            </a>

                            <div class="quick-view">
                                <a class="btn-circle stopPropagation action-product-quick-view" href="javascript:" data-product-id="83">
                                    <i class="czi-eye align-middle"></i>
                                </a>
                            </div>
                        </div>
                        <div class="single-product-details">
                            <div>
                                <a href="https://new.healthandblossom.com/product/delay-ageing-face-wash-gotukola-b4tJJw" class="text-capitalize fw-semibold">
                                    Delay ageing face wash...
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-2 col-6 col-sm-4 col-md-3  d-md-block px-max-md-0 mt-2">
                <div class="product-single-hover shadow-none rtl">
                    <div class="overflow-hidden position-relative">
                        <div class="inline_product clickable">
                            <span class="for-discount-value-null"></span>
                            <a href="https://new.healthandblossom.com/product/delay-ageing-face-wash-gotukola-b4tJJw">
                                <img src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-08-20-66c428f53869d.webp" alt="">
                            </a>

                            <div class="quick-view">
                                <a class="btn-circle stopPropagation action-product-quick-view" href="javascript:" data-product-id="83">
                                    <i class="czi-eye align-middle"></i>
                                </a>
                            </div>
                        </div>
                        <div class="single-product-details">
                            <div>
                                <a href="https://new.healthandblossom.com/product/delay-ageing-face-wash-gotukola-b4tJJw" class="text-capitalize fw-semibold">
                                    Delay ageing face wash...
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-2 col-6 col-sm-4 col-md-3  d-md-block px-max-md-0 mt-2">
                <div class="product-single-hover shadow-none rtl">
                    <div class="overflow-hidden position-relative">
                        <div class="inline_product clickable">
                            <span class="for-discount-value-null"></span>
                            <a href="https://new.healthandblossom.com/product/delay-ageing-face-wash-gotukola-b4tJJw">
                                <img src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-08-20-66c428f53869d.webp" alt="">
                            </a>

                            <div class="quick-view">
                                <a class="btn-circle stopPropagation action-product-quick-view" href="javascript:" data-product-id="83">
                                    <i class="czi-eye align-middle"></i>
                                </a>
                            </div>
                        </div>
                        <div class="single-product-details">
                            <div>
                                <a href="https://new.healthandblossom.com/product/delay-ageing-face-wash-gotukola-b4tJJw" class="text-capitalize fw-semibold">
                                    Delay ageing face wash...
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-2 col-6 col-sm-4 col-md-3 d-md-block px-max-md-0 mt-2">
                <div class="product-single-hover shadow-none rtl">
                    <div class="overflow-hidden position-relative">
                        <div class="inline_product clickable">
                            <span class="for-discount-value-null"></span>
                            <a href="https://new.healthandblossom.com/product/delay-ageing-face-wash-gotukola-b4tJJw">
                                <img src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-08-20-66c428f53869d.webp" alt="">
                            </a>

                            <div class="quick-view">
                                <a class="btn-circle stopPropagation action-product-quick-view" href="javascript:" data-product-id="83">
                                    <i class="czi-eye align-middle"></i>
                                </a>
                            </div>
                        </div>
                        <div class="single-product-details">
                            <div>
                                <a href="https://new.healthandblossom.com/product/delay-ageing-face-wash-gotukola-b4tJJw" class="text-capitalize fw-semibold">
                                    Delay ageing face wash...
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-2 col-6 col-sm-4 col-md-3  d-md-block px-max-md-0 mt-2">
                <div class="product-single-hover shadow-none rtl">
                    <div class="overflow-hidden position-relative">
                        <div class="inline_product clickable">
                            <span class="for-discount-value-null"></span>
                            <a href="https://new.healthandblossom.com/product/delay-ageing-face-wash-gotukola-b4tJJw">
                                <img src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-08-20-66c428f53869d.webp" alt="">
                            </a>

                            <div class="quick-view">
                                <a class="btn-circle stopPropagation action-product-quick-view" href="javascript:" data-product-id="83">
                                    <i class="czi-eye align-middle"></i>
                                </a>
                            </div>
                        </div>
                        <div class="single-product-details">
                            <div>
                                <a href="https://new.healthandblossom.com/product/delay-ageing-face-wash-gotukola-b4tJJw" class="text-capitalize fw-semibold">
                                    Delay ageing face wash...
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-2 col-6 col-sm-4 col-md-3  d-md-block px-max-md-0 mt-2">
                <div class="product-single-hover shadow-none rtl">
                    <div class="overflow-hidden position-relative">
                        <div class="inline_product clickable">
                            <span class="for-discount-value-null"></span>
                            <a href="https://new.healthandblossom.com/product/delay-ageing-face-wash-gotukola-b4tJJw">
                                <img src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-08-20-66c428f53869d.webp" alt="">
                            </a>

                            <div class="quick-view">
                                <a class="btn-circle stopPropagation action-product-quick-view" href="javascript:" data-product-id="83">
                                    <i class="czi-eye align-middle"></i>
                                </a>
                            </div>
                        </div>
                        <div class="single-product-details">
                            <div>
                                <a href="https://new.healthandblossom.com/product/delay-ageing-face-wash-gotukola-b4tJJw" class="text-capitalize fw-semibold">
                                    Delay ageing face wash...
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                </div>
            </div>

        </div>
</section> -->
<section class="new-arrival-section">
    <div class="container-fluid rtl mt-4">
        <div class="section-header text-align">
            <div class="arrival-title d-block">
                <div class="text-capitalize ">
                    Social Media
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid rtl mb-3 overflow-hidden">
        <div class="py-2">
            <div class="new_arrival_product">
                <div class="carousel-wrap">
                    <div class="owl-carousel owl-theme new-arrivals-product owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(-2029px, 0px, 0px); transition: 0.25s; width: 5412px;">
                                <div class="owl-item cloned" style="width: 318.25px; margin-right: 20px;">
                                    <div class="flash_deal_product get-view-by-onclick" data-link="https://new.healthandblossom.com/product/celigin-all-day-perfect-suncream-kaq3dq">
                                        <div class=" ">
                                            <div class=" p-12px">
                                                <div class="flash-deals-background-image image-real">
                                                    <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-08-21-66c5d4816cfa9.webp">
                                                </div>
                                            </div>
                                            <!-- <div class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex mt-3">
                                                <div>
                                                    <div>
                                                        <a href="https://new.healthandblossom.com/product/celigin-all-day-perfect-suncream-kaq3dq" class="flash-product-title text-capitalize fw-semibold">
                                                            CELIGIN ALL DAY PERFECT SUNCREAM
                                                        </a>
                                                    </div>
                                                    <div class="flash-product-review">
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <!-- <label class="badge-style2">
                                ( 1 )
                            </label> -->
                                                    <!-- </div>
                                                    <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                                                        <span class="flash-product-price text-dark fw-semibold">
                                                            ₹2,477.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 318.25px; margin-right: 20px;">
                                    <div class="flash_deal_product get-view-by-onclick" data-link="https://new.healthandblossom.com/product/bbo-allure-vitamin-c-face-oil-with-kakadu-plum-bakuchiol-for-all-skin-types-30-ml-Hrvho6">
                                        <div class=" ">
                                            <div class=" p-12px">
                                                <div class="flash-deals-background-image image-real">
                                                    <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-08-22-66c709f3e0a3a.webp">
                                                </div>
                                            </div>
                                            <!-- <div class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex mt-3">
                                                <div>
                                                    <div>
                                                        <a href="https://new.healthandblossom.com/product/bbo-allure-vitamin-c-face-oil-with-kakadu-plum-bakuchiol-for-all-skin-types-30-ml-Hrvho6" class="flash-product-title text-capitalize fw-semibold">
                                                            BBO Allure Vitamin C Face Oil with Kakadu Plum &amp; Bakuchiol | For All Skin Types...
                                                        </a>
                                                    </div>
                                                    <div class="flash-product-review">
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <!-- <label class="badge-style2">
                                ( 1 )
                            </label> -->
                                                    <!-- </div>
                                                    <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                                                        <span class="flash-product-price text-dark fw-semibold">
                                                            ₹699.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>  -->
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 318.25px; margin-right: 20px;">
                                    <div class="flash_deal_product get-view-by-onclick" data-link="https://new.healthandblossom.com/product/whole-wheat-pasta-conchigelle-8YlXoj">
                                        <div class=" ">
                                            <div class="p-12px">
                                                <div class="flash-deals-background-image image-real">
                                                    <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-09-07-66dc1c0f6aa2c.webp">
                                                </div>
                                            </div>
                                            <!-- <div class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex mt-3">
                                                <div>
                                                    <div>
                                                        <a href="https://new.healthandblossom.com/product/whole-wheat-pasta-conchigelle-8YlXoj" class="flash-product-title text-capitalize fw-semibold">
                                                            Whole Wheat Pasta (Conchigelle)
                                                        </a>
                                                    </div>
                                                    <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                                                        <span class="flash-product-price text-dark fw-semibold">
                                                            ₹135.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 318.25px; margin-right: 20px;">
                                    <div class="flash_deal_product get-view-by-onclick" data-link="https://new.healthandblossom.com/product/refined-wheat-flour-pasta-penne-LxWJ0L">
                                        <div class=" ">
                                            <div class=" p-12px">
                                                <div class="flash-deals-background-image image-real">
                                                    <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-09-07-66dc19da1c8dc.webp">
                                                </div>
                                            </div>
                                            <!-- <div class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex mt-3">
                                                <div>
                                                    <div>
                                                        <a href="https://new.healthandblossom.com/product/refined-wheat-flour-pasta-penne-LxWJ0L" class="flash-product-title text-capitalize fw-semibold">
                                                            Refined Wheat Flour Pasta (Penne)
                                                        </a>
                                                    </div>
                                                    <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                                                        <span class="flash-product-price text-dark fw-semibold">
                                                            ₹135.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 318.25px; margin-right: 20px;">
                                    <div class="flash_deal_product get-view-by-onclick" data-link="https://new.healthandblossom.com/product/celigin-daily-sun-finish-bGewu2">
                                        <div class=" ">
                                            <div class=" p-12px">
                                                <div class="flash-deals-background-image image-real">
                                                    <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-08-21-66c5d57b24bb5.webp">
                                                </div>
                                            </div>
                                            <!-- <div class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex mt-3">
                                                <div>
                                                    <div>
                                                        <a href="https://new.healthandblossom.com/product/celigin-daily-sun-finish-bGewu2" class="flash-product-title text-capitalize fw-semibold">
                                                            CELIGIN DAILY SUN FINISH
                                                        </a>
                                                    </div>
                                                    <div class="flash-product-review">
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star-outlined text-warning"></i>
                                                        <i class="tio-star-outlined text-warning"></i>
                                                        <!-- <label class="badge-style2">
                                ( 1 )
                            </label> -->
                                                    <!-- </div>
                                                    <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                                                        <span class="flash-product-price text-dark fw-semibold">
                                                            ₹2,507.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>  -->
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 318.25px; margin-right: 20px;">
                                    <div class="flash_deal_product get-view-by-onclick" data-link="https://new.healthandblossom.com/product/refined-wheat-flour-pasta-macroni-Xn2hPN">
                                        <div class="">
                                            <div class=" p-12px">
                                                <div class="flash-deals-background-image image-real">
                                                    <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-09-07-66dc1859e5fc5.webp">
                                                </div>
                                            </div>
                                            <!-- <div class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex mt-3">
                                                <div>
                                                    <div>
                                                        <a href="https://new.healthandblossom.com/product/refined-wheat-flour-pasta-macroni-Xn2hPN" class="flash-product-title text-capitalize fw-semibold">
                                                            Refined Wheat Flour Pasta (Macroni)
                                                        </a>
                                                    </div>
                                                    <div class="flash-product-review">
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <!-- <label class="badge-style2">
                                ( 1 )
                            </label> -->
                                                    <!-- </div>
                                                    <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                                                        <span class="flash-product-price text-dark fw-semibold">
                                                            ₹135.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>  -->
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 318.25px; margin-right: 20px;">
                                    <div class="flash_deal_product get-view-by-onclick" data-link="https://new.healthandblossom.com/product/signature-cell-biome-duoset-xGVwQA">
                                        <div class=" ">
                                            <div class=" p-12px">
                                                <div class="flash-deals-background-image image-real">
                                                    <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-08-21-66c5cd9e75ef1.webp">
                                                </div>
                                            </div>
                                            <!-- <div class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex mt-3">
                                                <div>
                                                    <div>
                                                        <a href="https://new.healthandblossom.com/product/signature-cell-biome-duoset-xGVwQA" class="flash-product-title text-capitalize fw-semibold">
                                                            SIGNATURE CELL BIOME DUO(SET)
                                                        </a>
                                                    </div>
                                                    <div class="flash-product-review">
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star-outlined text-warning"></i>
                                                        <!-- <label class="badge-style2">
                                ( 1 )
                            </label> -->
                                                    <!-- </div>
                                                    <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                                                        <span class="flash-product-price text-dark fw-semibold">
                                                            ₹8,599.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>  -->
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 318.25px; margin-right: 20px;">
                                    <div class="flash_deal_product get-view-by-onclick" data-link="https://new.healthandblossom.com/product/refined-wheat-flour-pastafuslli-gdlV3s">
                                        <div class=" ">
                                            <div class=" p-12px">
                                                <div class="flash-deals-background-image image-real">
                                                    <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-09-07-66dc19258027d.webp">
                                                </div>
                                            </div>
                                            <!-- <div class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex mt-3">
                                                <div>
                                                    <div>
                                                        <a href="https://new.healthandblossom.com/product/refined-wheat-flour-pastafuslli-gdlV3s" class="flash-product-title text-capitalize fw-semibold">
                                                            Refined Wheat Flour Pasta(Fuslli)
                                                        </a>
                                                    </div>
                                                    <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                                                        <span class="flash-product-price text-dark fw-semibold">
                                                            ₹135.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 318.25px; margin-right: 20px;">
                                    <div class="flash_deal_product get-view-by-onclick" data-link="https://new.healthandblossom.com/product/celigin-all-day-perfect-suncream-kaq3dq">
                                        <div class="">
                                            <div class=" p-12px">
                                                <div class="flash-deals-background-image image-real">
                                                    <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-08-21-66c5d4816cfa9.webp">
                                                </div>
                                            </div>
                                            <!-- <div class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex mt-3">
                                                <div>
                                                    <div>
                                                        <a href="https://new.healthandblossom.com/product/celigin-all-day-perfect-suncream-kaq3dq" class="flash-product-title text-capitalize fw-semibold">
                                                            CELIGIN ALL DAY PERFECT SUNCREAM
                                                        </a>
                                                    </div>
                                                    <div class="flash-product-review">
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <!-- <label class="badge-style2">
                                ( 1 )
                            </label> -->
                                                    <!-- </div>
                                                    <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                                                        <span class="flash-product-price text-dark fw-semibold">
                                                            ₹2,477.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 318.25px; margin-right: 20px;">
                                    <div class="flash_deal_product get-view-by-onclick" data-link="https://new.healthandblossom.com/product/bbo-allure-vitamin-c-face-oil-with-kakadu-plum-bakuchiol-for-all-skin-types-30-ml-Hrvho6">
                                        <div class=" ">
                                            <div class=" p-12px">
                                                <div class="flash-deals-background-image image-real">
                                                    <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-08-22-66c709f3e0a3a.webp">
                                                </div>
                                            </div>
                                            <!-- <div class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex mt-3">
                                                <div>
                                                    <div>
                                                        <a href="https://new.healthandblossom.com/product/bbo-allure-vitamin-c-face-oil-with-kakadu-plum-bakuchiol-for-all-skin-types-30-ml-Hrvho6" class="flash-product-title text-capitalize fw-semibold">
                                                            BBO Allure Vitamin C Face Oil with Kakadu Plum &amp; Bakuchiol | For All Skin Types...
                                                        </a>
                                                    </div>
                                                    <div class="flash-product-review">
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <!-- <label class="badge-style2">
                                ( 1 )
                            </label> -->
                                                    <!-- </div>
                                                    <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                                                        <span class="flash-product-price text-dark fw-semibold">
                                                            ₹699.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>  -->
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 318.25px; margin-right: 20px;">
                                    <div class="flash_deal_product get-view-by-onclick" data-link="https://new.healthandblossom.com/product/whole-wheat-pasta-conchigelle-8YlXoj">
                                        <div class=" ">
                                            <div class=" p-12px">
                                                <div class="flash-deals-background-image image-real">
                                                    <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-09-07-66dc1c0f6aa2c.webp">
                                                </div>
                                            </div>
                                            <!-- <div class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex mt-3">
                                                <div>
                                                    <div>
                                                        <a href="https://new.healthandblossom.com/product/whole-wheat-pasta-conchigelle-8YlXoj" class="flash-product-title text-capitalize fw-semibold">
                                                            Whole Wheat Pasta (Conchigelle)
                                                        </a>
                                                    </div>
                                                    <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                                                        <span class="flash-product-price text-dark fw-semibold">
                                                            ₹135.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 318.25px; margin-right: 20px;">
                                    <div class="flash_deal_product get-view-by-onclick" data-link="https://new.healthandblossom.com/product/refined-wheat-flour-pasta-penne-LxWJ0L">
                                        <div class=" ">
                                            <div class=" p-12px">
                                                <div class="flash-deals-background-image image-real">
                                                    <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-09-07-66dc19da1c8dc.webp">
                                                </div>
                                            </div>
                                            <!-- <div class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex mt-3">
                                                <div>
                                                    <div>
                                                        <a href="https://new.healthandblossom.com/product/refined-wheat-flour-pasta-penne-LxWJ0L" class="flash-product-title text-capitalize fw-semibold">
                                                            Refined Wheat Flour Pasta (Penne)
                                                        </a>
                                                    </div>
                                                    <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                                                        <span class="flash-product-price text-dark fw-semibold">
                                                            ₹135.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 318.25px; margin-right: 20px;">
                                    <div class="flash_deal_product get-view-by-onclick" data-link="https://new.healthandblossom.com/product/celigin-daily-sun-finish-bGewu2">
                                        <div class=" ">
                                            <div class=" p-12px">
                                                <div class="flash-deals-background-image image-real">
                                                    <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-08-21-66c5d57b24bb5.webp">
                                                </div>
                                            </div>
                                            <!-- <div class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex mt-3">
                                                <div>
                                                    <div>
                                                        <a href="https://new.healthandblossom.com/product/celigin-daily-sun-finish-bGewu2" class="flash-product-title text-capitalize fw-semibold">
                                                            CELIGIN DAILY SUN FINISH
                                                        </a>
                                                    </div>
                                                    <div class="flash-product-review">
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star-outlined text-warning"></i>
                                                        <i class="tio-star-outlined text-warning"></i>
                                                        <!-- <label class="badge-style2">
                                ( 1 )
                            </label> -->
                                                    <!-- </div>
                                                    <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                                                        <span class="flash-product-price text-dark fw-semibold">
                                                            ₹2,507.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>  -->
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 318.25px; margin-right: 20px;">
                                    <div class="flash_deal_product get-view-by-onclick" data-link="https://new.healthandblossom.com/product/refined-wheat-flour-pasta-macroni-Xn2hPN">
                                        <div class=" ">
                                            <div class=" p-12px">
                                                <div class="flash-deals-background-image image-real">
                                                    <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-09-07-66dc1859e5fc5.webp">
                                                </div>
                                            </div>
                                            <!-- <div class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex mt-3">
                                                <div>
                                                    <div>
                                                        <a href="https://new.healthandblossom.com/product/refined-wheat-flour-pasta-macroni-Xn2hPN" class="flash-product-title text-capitalize fw-semibold">
                                                            Refined Wheat Flour Pasta (Macroni)
                                                        </a>
                                                    </div>
                                                    <div class="flash-product-review">
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <!-- <label class="badge-style2">
                                ( 1 )
                            </label> -->
                                                    <!-- </div>
                                                    <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                                                        <span class="flash-product-price text-dark fw-semibold">
                                                            ₹135.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 318.25px; margin-right: 20px;">
                                    <div class="flash_deal_product get-view-by-onclick" data-link="https://new.healthandblossom.com/product/signature-cell-biome-duoset-xGVwQA">
                                        <div class=" ">
                                            <div class=" p-12px">
                                                <div class="flash-deals-background-image image-real">
                                                    <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-08-21-66c5cd9e75ef1.webp">
                                                </div>
                                            </div>
                                            <!-- <div class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex mt-3">
                                                <div>
                                                    <div>
                                                        <a href="https://new.healthandblossom.com/product/signature-cell-biome-duoset-xGVwQA" class="flash-product-title text-capitalize fw-semibold">
                                                            SIGNATURE CELL BIOME DUO(SET)
                                                        </a>
                                                    </div>
                                                    <div class="flash-product-review">
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star text-warning"></i>
                                                        <i class="tio-star-outlined text-warning"></i>
                                                        <!-- <label class="badge-style2">
                                ( 1 )
                            </label> -->
                                                    <!-- </div>
                                                    <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                                                        <span class="flash-product-price text-dark fw-semibold">
                                                            ₹8,599.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 318.25px; margin-right: 20px;">
                                    <div class="flash_deal_product get-view-by-onclick" data-link="https://new.healthandblossom.com/product/refined-wheat-flour-pastafuslli-gdlV3s">
                                        <div class=" ">
                                            <div class=" p-12px">
                                                <div class="flash-deals-background-image image-real">
                                                    <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-09-07-66dc19258027d.webp">
                                                </div>
                                            </div>
                                            <!-- <div class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex mt-3">
                                                <div>
                                                    <div>
                                                        <a href="https://new.healthandblossom.com/product/refined-wheat-flour-pastafuslli-gdlV3s" class="flash-product-title text-capitalize fw-semibold">
                                                            Refined Wheat Flour Pasta(Fuslli)
                                                        </a>
                                                    </div>
                                                    <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                                                        <span class="flash-product-price text-dark fw-semibold">
                                                            ₹135.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="czi-arrow-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="czi-arrow-right"></i></button></div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif