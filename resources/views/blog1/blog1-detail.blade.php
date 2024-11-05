@extends('layouts.front-end.app')

@section('title',translate('contact_us'))

@push('css_or_js')
<link rel="stylesheet" href="{{ theme_asset(path: 'public/assets/front-end/plugin/intl-tel-input/css/intlTelInput.css') }}">
@endpush

@section('content')
<div class="container-fluid pb-5 mb-2 mb-md-4 rtl __inline-35" dir="ltr">
    <div class="row">
        <!-- <div class="col-lg-3">
            <!-- <div class="product-details-shipping-details">
            </div>
            <div class="pt-4 pb-3">
                <span class=" __text-16px font-bold text-capitalize">
                    Recent Post
                </span>
            </div>
            <div class="input-group-overlay search-form-mobile text-align-direction">
                <form action="https://new.healthandblossom.com/products" type="submit" class="search_form">
                    <div class="d-flex align-items-center gap-2">
                        <input class="form-control appended-form-control search-bar-input" type="search" autocomplete="off" data-given-value="" placeholder="Search for items..." name="name" value="">

                        <button class="input-group-append-overlay serch-over search_button d-none d-md-block" type="submit">
                            <span class="input-group-text __text-20px">
                                <i class="czi-search text-white"></i>
                            </span>
                        </button>

                        <span class="close-search-form-mobile fs-14 font-semibold text-muted d-md-none" type="submit">
                            Cancel
                        </span>
                    </div>

                    <input name="data_from" value="search" hidden="">
                    <input name="page" value="1" hidden="">
                    <div class="card search-card mobile-search-card" style="display: none;">
                        <div class="card-body">
                            <div class="search-result-box __h-400px overflow-x-hidden overflow-y-auto"></div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="mt-4">
                <div class="flash_deal_product rtl cursor-pointer mb-2 get-view-by-onclick" data-link="https://new.healthandblossom.com/product/organic-litchi-honey-181G0r">
                    <div class="d-flex">
                        <div class="d-flex align-items-center justify-content-center p-3">
                            <div class="flash-deals-background-image image-default-bg-color">
                                <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-09-25-66f3b85a86b47.webp">
                            </div>
                        </div>
                        <div class=" flash_deal_product_details pl-3 pr-3 pr-1 d-flex align-items-center">
                            <div>
                                <div>
                                    <span class="flash-product-title">
                                        Organic Litchi Honey
                                    </span>
                                </div>
                                <!-- <div class="flash-product-review">
                                    <i class="tio-star text-warning">
                                    </i>
                                    <i class="tio-star text-warning">
                                    </i>
                                    <i class="tio-star text-warning">
                                    </i>
                                    <i class="tio-star text-warning">
                                    </i>
                                    <i class="tio-star text-warning">
                                    </i>
                                    <label class="badge-style2">
                                        ( 1 )
                                    </label>
                                </div>
                                <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                                    <span class="flash-product-price fw-semibold text-dark">
                                        ₹850.00
                                    </span>
                                </div> -->
        <!-- 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flash_deal_product rtl cursor-pointer mb-2 get-view-by-onclick" data-link="https://new.healthandblossom.com/product/refined-wheat-flour-pasta-macroni-Xn2hPN">
                    <div class="d-flex">
                        <div class="d-flex align-items-center justify-content-center p-3">
                            <div class="flash-deals-background-image image-default-bg-color">
                                <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-09-07-66dc1859e5fc5.webp">
                            </div>
                        </div>
                        <div class=" flash_deal_product_details pl-3 pr-3 pr-1 d-flex align-items-center">
                            <div>
                                <div>
                                    <span class="flash-product-title">
                                        Refined Wheat Flour Pasta (Macroni)
                                    </span>
                                </div> -->
        <!-- <div class="flash-product-review">
                                    <i class="tio-star text-warning">
                                    </i>
                                    <i class="tio-star text-warning">
                                    </i>
                                    <i class="tio-star text-warning">
                                    </i>
                                    <i class="tio-star text-warning">
                                    </i>
                                    <i class="tio-star text-warning">
                                    </i>
                                    <label class="badge-style2">
                                        ( 1 )
                                    </label>
                                </div>
                                <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                                    <span class="flash-product-price fw-semibold text-dark">
                                        ₹135.00
                                    </span>
                                </div> -->

        <!-- </div>
                        </div>
                    </div>
                </div>
                <div class="flash_deal_product rtl cursor-pointer mb-2 get-view-by-onclick" data-link="https://new.healthandblossom.com/product/refined-wheat-flour-pastafuslli-gdlV3s">
                    <div class="d-flex">
                        <div class="d-flex align-items-center justify-content-center p-3">
                            <div class="flash-deals-background-image image-default-bg-color">
                                <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-09-07-66dc19258027d.webp">
                            </div>
                        </div>
                        <div class=" flash_deal_product_details pl-3 pr-3 pr-1 d-flex align-items-center">
                            <div>
                                <div>
                                    <span class="flash-product-title">
                                        Refined Wheat Flour Pasta(Fuslli)
                                    </span>
                                </div>
                                <!-- <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                                    <span class="flash-product-price fw-semibold text-dark">
                                        ₹135.00
                                    </span>
                                </div> -->
        <!-- 
                            </div>
                        </div>
                    </div>
                </div> -->
        <!-- <div class="flash_deal_product rtl cursor-pointer mb-2 get-view-by-onclick" data-link="https://new.healthandblossom.com/product/refined-wheat-flour-pasta-penne-LxWJ0L">
                    <div class="d-flex">
                        <div class="d-flex align-items-center justify-content-center p-3">
                            <div class="flash-deals-background-image image-default-bg-color">
                                <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-09-07-66dc19da1c8dc.webp">
                            </div>
                        </div>
                        <div class=" flash_deal_product_details pl-3 pr-3 pr-1 d-flex align-items-center">
                            <div>
                                <div>
                                    <span class="flash-product-title">
                                        Refined Wheat Flour Pasta (Penne)
                                    </span>
                                </div> -->
        <!-- <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                                    <span class="flash-product-price fw-semibold text-dark">
                                        ₹135.00
                                    </span>
                                </div> -->

        <!-- </div>
                        </div>
                    </div>
                </div>
                <div class="flash_deal_product rtl cursor-pointer mb-2 get-view-by-onclick" data-link="https://new.healthandblossom.com/product/whole-wheat-pasta-conchigelle-8YlXoj">
                    <div class="d-flex">
                        <div class="d-flex align-items-center justify-content-center p-3">
                            <div class="flash-deals-background-image image-default-bg-color">
                                <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-09-07-66dc1c0f6aa2c.webp">
                            </div>
                        </div>
                        <div class=" flash_deal_product_details pl-3 pr-3 pr-1 d-flex align-items-center">
                            <div>
                                <div>
                                    <span class="flash-product-title">
                                        Whole Wheat Pasta (Conchigelle)
                                    </span>
                                </div>
                                <!-- <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                                    <span class="flash-product-price fw-semibold text-dark">
                                        ₹135.00
                                    </span>
                                </div> -->
        <!-- 
                            </div>
                        </div>
                    </div>
                </div>
            </div>     -->
    </div>


    <div class="row" id="ajax-products">
        <div class=" col-lg-12 col-md-12 col-sm-12 col-12  p-2">
            <div class="product-single-hover style--card">
                <div class="overflow-hidden position-relative">
                    <div class=" inline_product clickable d-flex justify-content-center">
                        <div class="d-flex justify-content-end">
                            <span class="for-discount-value-null"></span>
                        </div>
                        <div class="p-10px pb-0 lp-limits">
                            <a href="" class="w-100">
                                <img alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-09-07-66dc1859e5fc5.webp">
                            </a>
                        </div>

                        <div class="quick-view">
                            <a class="btn-circle stopPropagation action-product-quick-view" href="javascript:" data-product-id="616">
                                <i class="czi-eye align-middle"></i>
                            </a>
                        </div>
                    </div>
                    <div class="single-product-details">
                        <!-- <div class="rating-show justify-content-between text-center">
                                    <span class="d-inline-block font-size-sm text-body">
                                        <i class="tio-star text-warning"></i>
                                        <i class="tio-star text-warning"></i>
                                        <i class="tio-star text-warning"></i>
                                        <i class="tio-star text-warning"></i>
                                        <i class="tio-star text-warning"></i>
                                        <!-- <label class="badge-style">( 1 )</label>
                
                                    <!-- </span> -->
                        <!-- </div> -->
                        <div class="frequengtly-ft">
                            <a href="">
                                Gentaly Frequently, naturally.
                            </a>
                        </div>
                        <div class="justify-content-between ">
                            <div class="product-price text-center d-flex flex-wrap justify-content-center align-items-center gap-8">
                                <span class="text-accent text-accents text-dark">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="col-lg-3">
            <div class="product-details-shipping-details">
            </div>
            <div class="pt-4 pb-3">
                <span class=" __text-16px font-bold text-capitalize">
                    Related Blog
                </span>
            </div>


            <div class="mt-4">
                <div class="flash_deal_product rtl cursor-pointer mb-2 get-view-by-onclick" data-link="https://new.healthandblossom.com/product/organic-litchi-honey-181G0r">
                    <div class="d-flex">
                        <div class="d-flex align-items-center justify-content-center p-3">
                            <div class="flash-deals-background-image image-default-bg-color">
                                <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-09-25-66f3b85a86b47.webp">
                            </div>
                        </div>
                        <div class=" flash_deal_product_details pl-3 pr-3 pr-1 d-flex align-items-center">
                            <div>
                                <div>
                                    <span class="flash-product-title">
                                        Organic Litchi Honey
                                    </span>
                                </div>
                               

                            </div>
                        </div>
                    </div>
                </div>
                <div class="flash_deal_product rtl cursor-pointer mb-2 get-view-by-onclick" data-link="https://new.healthandblossom.com/product/refined-wheat-flour-pasta-macroni-Xn2hPN">
                    <div class="d-flex">
                        <div class="d-flex align-items-center justify-content-center p-3">
                            <div class="flash-deals-background-image image-default-bg-color">
                                <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-09-07-66dc1859e5fc5.webp">
                            </div>
                        </div>
                        <div class=" flash_deal_product_details pl-3 pr-3 pr-1 d-flex align-items-center">
                            <div>
                                <div>
                                    <span class="flash-product-title">
                                        Refined Wheat Flour Pasta (Macroni)
                                    </span>
                                </div>
                              

                            </div>
                        </div>
                    </div>
                </div>
                <div class="flash_deal_product rtl cursor-pointer mb-2 get-view-by-onclick" data-link="https://new.healthandblossom.com/product/refined-wheat-flour-pastafuslli-gdlV3s">
                    <div class="d-flex">
                        <div class="d-flex align-items-center justify-content-center p-3">
                            <div class="flash-deals-background-image image-default-bg-color">
                                <img class="__img-125px" alt="" src="https://new.healthandblossom.com/public/assets/back-end/product/thumbnail/2024-09-07-66dc19258027d.webp">
                            </div>
                        </div>
                        <div class=" flash_deal_product_details pl-3 pr-3 pr-1 d-flex align-items-center">
                            <div>
                                <div>
                                    <span class="flash-product-title">
                                        Refined Wheat Flour Pasta(Fuslli)
                                    </span>
                                </div>
                               

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
</div>
</div>


@endsection


@push('script')

@if(isset($recaptcha) && $recaptcha['status'] == 1)
<script type="text/javascript">
    "use strict";
    var onloadCallback = function() {
        grecaptcha.render('recaptcha_element', {
            'sitekey': '{{ getWebConfig(name: '
            recaptcha ')['
            site_key '] }}'
        });
    };
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async
    defer></script>
<script>
    "use strict";
    $("#getResponse").on('submit', function(e) {
        var response = grecaptcha.getResponse();
        if (response.length === 0) {
            e.preventDefault();
            toastr.error($('#message-please-check-recaptcha').data('text'));
        }
    });
</script>
@endif

<script src="{{ theme_asset(path: 'public/assets/front-end/plugin/intl-tel-input/js/intlTelInput.js') }}"></script>
<script src="{{ theme_asset(path: 'public/assets/front-end/js/country-picker-init.js') }}"></script>
@endpush