@extends('layouts.front-end.app')

@section('title', $product['name'])

@push('css_or_js')
    @include(VIEW_FILE_NAMES['product_seo_meta_content_partials'], [
        'metaContentData' => $product?->seoInfo,
        'product' => $product,
    ])
    <link rel="stylesheet" href="{{ theme_asset(path: 'public/assets/front-end/css/product-details.css') }}" />
@endpush

@section('content')
    <div class="__inline-23">
        <div class="container-fluid mt-4 rtl text-align-direction">
            <div class="row {{ Session::get('direction') === 'rtl' ? '__dir-rtl' : '' }}">
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-lg-5 col-md-4 col-12">
                            <div class="cz-product-gallery">
                                <div class="cz-preview">
                                    <div id="sync1" class="owl-carousel owl-theme product-thumbnail-slider">
                                        @if ($product->images != null && json_decode($product->images) > 0)
                                            @if (json_decode($product->colors) && count($product->color_images_full_url) > 0)
                                                @foreach ($product->color_images_full_url as $key => $photo)
                                                    @if ($photo['color'] != null)
                                                        <div class="product-preview-item d-flex align-items-center justify-content-center {{ $key == 0 ? 'active' : '' }}"
                                                            id="image{{ $photo['color'] }}">
                                                            <img class="cz-image-zoom img-responsive w-100"
                                                                src="{{ getStorageImages(path: $photo['image_name'], type: 'product') }}"
                                                                data-zoom="{{ getStorageImages(path: $photo['image_name'], type: 'product') }}"
                                                                alt="{{ translate('product') }}" width="">
                                                            <div class="cz-image-zoom-pane"></div>
                                                        </div>
                                                    @else
                                                        <div class="product-preview-item d-flex align-items-center justify-content-center {{ $key == 0 ? 'active' : '' }}"
                                                            id="image{{ $key }}">
                                                            <img class="cz-image-zoom img-responsive w-100"
                                                                src="{{ getStorageImages(path: $photo['image_name'], type: 'product') }}"
                                                                data-zoom="{{ getStorageImages(path: $photo['image_name'], type: 'product') }}"
                                                                alt="{{ translate('product') }}" width="">
                                                            <div class="cz-image-zoom-pane"></div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach ($product->images_full_url as $key => $photo)
                                                    <div class="product-preview-item d-flex align-items-center justify-content-center {{ $key == 0 ? 'active' : '' }}"
                                                        id="image{{ $key }}">
                                                        <img class="cz-image-zoom img-responsive w-100"
                                                            src="{{ getStorageImages($photo, type: 'product') }}"
                                                            data-zoom="{{ getStorageImages(path: $photo, type: 'product') }}"
                                                            alt="{{ translate('product') }}" width="">
                                                        <div class="cz-image-zoom-pane"></div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endif
                                    </div>
                                </div>

                                <div class="d-flex flex-column gap-3">
                                    <button type="button" data-product-id="{{ $product['id'] }}"
                                        class="btn __text-18px border wishList-pos-btn d-sm-none product-action-add-wishlist">
                                        <i class="fa {{ $wishlistStatus == 1 ? 'fa-heart' : 'fa-heart-o' }} wishlist_icon_{{ $product['id'] }} web-text-primary"
                                            aria-hidden="true"></i>
                                        <div class="wishlist-tooltip" x-placement="top">
                                            <div class="arrow"></div>
                                            <div class="inner">
                                                <span class="add">{{ translate('added_to_wishlist') }}</span>
                                                <span class="remove">{{ translate('removed_from_wishlist') }}</span>
                                            </div>
                                        </div>
                                    </button>

                                    {{-- <div class="sharethis-inline-share-buttons share--icons text-align-direction">
                                    </div> --}}
                                </div>

                                <div class="cz">
                                    <div class="table-responsive __max-h-515px" data-simplebar>
                                        <div class="d-flex">
                                            <div id="sync2" class="owl-carousel owl-theme product-thumb-slider">
                                                @if ($product->images != null && json_decode($product->images) > 0)
                                                    @if (json_decode($product->colors) && count($product->color_images_full_url) > 0)
                                                        @foreach ($product->color_images_full_url as $key => $photo)
                                                            @if ($photo['color'] != null)
                                                                <div class="">
                                                                    <a class="product-preview-thumb color-variants-preview-box-{{ $photo['color'] }} {{ $key == 0 ? 'active' : '' }} d-flex align-items-center justify-content-center"
                                                                        id="preview-img{{ $photo['color'] }}"
                                                                        href="#image{{ $photo['color'] }}">
                                                                        <img alt="{{ translate('product') }}"
                                                                            src="{{ getStorageImages(path: $photo['image_name'], type: 'product') }}">
                                                                    </a>
                                                                </div>
                                                            @else
                                                                <div class="">
                                                                    <a class="product-preview-thumb {{ $key == 0 ? 'active' : '' }} d-flex align-items-center justify-content-center"
                                                                        id="preview-img{{ $key }}"
                                                                        href="#image{{ $key }}">
                                                                        <img alt="{{ translate('product') }}"
                                                                            src="{{ getStorageImages(path: $photo['image_name'], type: 'product') }}">
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        @foreach ($product->images_full_url as $key => $photo)
                                                            <div class="">
                                                                <a class="product-preview-thumb {{ $key == 0 ? 'active' : '' }} d-flex align-items-center justify-content-center"
                                                                    id="preview-img{{ $key }}"
                                                                    href="#image{{ $key }}">
                                                                    <img alt="{{ translate('product') }}"
                                                                        src="{{ getStorageImages(path: $photo, type: 'product') }}">
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-8 col-12 mt-md-0 mt-sm-3 web-direction">
                            <div class="details __h-100">
                                <span class="mb-2 __inline-24">
                                    <h1 class="text-start">{{ $product->name }}</h1>
                                </span>
                                <div class="d-flex flex-wrap align-items-center mb-2 pro">
                                    <div class="star-rating me-2">
                                        @for ($inc = 1; $inc <= 5; $inc++)
                                            @if ($inc <= (int) $overallRating[0])
                                                <i class="tio-star text-warning"></i>
                                            @elseif ($overallRating[0] != 0 && $inc <= (int) $overallRating[0] + 1.1 && $overallRating[0] > ((int) $overallRating[0]))
                                                <i class="tio-star-half text-warning"></i>
                                            @else
                                                <i class="tio-star-outlined text-warning"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <span
                                        class="d-inline-block  align-middle mt-1 {{ Session::get('direction') === 'rtl' ? 'ml-md-2 ml-sm-0' : 'mr-md-2 mr-sm-0' }} fs-14 text-muted">({{ $overallRating[0] }})</span>
                                    <!-- <span
                                            class="font-regular font-for-tab d-inline-block font-size-sm text-body align-middle mt-1 {{ Session::get('direction') === 'rtl' ? 'mr-1 ml-md-2 ml-1 pr-md-2 pr-sm-1 pl-md-2 pl-sm-1' : 'ml-1 mr-md-2 mr-1 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1' }}">
                                          <span class="web-text-primary">{{ $overallRating[1] }}
                                          </span> {{ translate('reviews') }}</span> -->



                                </div>
                                <div class="mb-3">
                                    <span class="font-weight-normal text-accent d-flex align-items-end gap-2">
                                        {!! getPriceRangeWithDiscount(product: $product) !!}
                                    </span>
                                </div>

                                <form id="add-to-cart-form" class="mb-2">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <div
                                        class="position-relative {{ Session::get('direction') === 'rtl' ? 'ml-n4' : 'mr-n4' }} mb-2">
                                        @if (count(json_decode($product->colors)) > 0)
                                            <div class="flex-start align-items-center mb-2">
                                                <div class="product-description-label m-0 text-dark font-bold">
                                                    {{ translate('color') }}
                                                    :
                                                </div>
                                                <div>
                                                    <ul class="list-inline checkbox-color mb-0 flex-start ms-2 ps-0">
                                                        @foreach (json_decode($product->colors) as $key => $color)
                                                            <li>
                                                                <input type="radio"
                                                                    id="{{ str_replace(' ', '', $product->id . '-color-' . str_replace('#', '', $color)) }}"
                                                                    name="color" value="{{ $color }}"
                                                                    @if ($key == 0) checked @endif>
                                                                <label style="background: {{ $color }};"
                                                                    class="focus-preview-image-by-color shadow-border"
                                                                    for="{{ str_replace(' ', '', $product->id . '-color-' . str_replace('#', '', $color)) }}"
                                                                    data-toggle="tooltip"
                                                                    data-key="{{ str_replace('#', '', $color) }}"
                                                                    data-colorid="preview-box-{{ str_replace('#', '', $color) }}"
                                                                    data-title="{{ \App\Utils\get_color_name($color) }}">
                                                                    <span class="outline"></span></label>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                        @php
                                            $qty = 0;
                                            if (!empty($product->variation)) {
                                                foreach (json_decode($product->variation) as $key => $variation) {
                                                    $qty += $variation->qty;
                                                }
                                            }
                                        @endphp
                                    </div>

                                    @php($extensionIndex = 0)
                                    @if (
                                        $product['product_type'] == 'digital' &&
                                            $product['digital_product_file_types'] &&
                                            count($product['digital_product_file_types']) > 0 &&
                                            $product['digital_product_extensions']
                                    )
                                        @foreach ($product['digital_product_extensions'] as $extensionKey => $extensionGroup)
                                            <div class="row flex-start mx-0 align-items-center mb-1">
                                                <div
                                                    class="product-description-label text-dark font-bold {{ Session::get('direction') === 'rtl' ? 'pl-2' : 'pr-2' }} text-capitalize mb-2">
                                                    {{ translate($extensionKey) }} :
                                                </div>
                                                <div>
                                                    @if (count($extensionGroup) > 0)
                                                        <div
                                                            class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-0 mx-1 flex-start row ps-0">
                                                            @foreach ($extensionGroup as $index => $extension)
                                                                <div>
                                                                    <div class="for-mobile-capacity">
                                                                        <input type="radio" hidden
                                                                            id="extension_{{ str_replace(' ', '-', $extension) }}"
                                                                            name="variant_key"
                                                                            value="{{ $extensionKey . '-' . preg_replace('/\s+/', '-', $extension) }}"
                                                                            {{ $extensionIndex == 0 ? 'checked' : '' }}>
                                                                        <label
                                                                            for="extension_{{ str_replace(' ', '-', $extension) }}"
                                                                            class="__text-12px">
                                                                            {{ $extension }}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                @php($extensionIndex++)
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                    @foreach (json_decode($product->choice_options) as $key => $choice)
                                        <div class="row flex-start mx-0 align-items-center">
                                            <div
                                                class="product-description-label text-dark font-bold {{ Session::get('direction') === 'rtl' ? 'pl-2' : 'pr-2' }} text-capitalize mb-2">
                                                {{ $choice->title }}
                                                :
                                            </div>
                                            <div>
                                                <div
                                                    class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-0 mx-1 flex-start row ps-0">
                                                    @foreach ($choice->options as $index => $option)
                                                        <div>
                                                            <div class="for-mobile-capacity">
                                                                <input type="radio"
                                                                    id="{{ str_replace(' ', '', $choice->name . '-' . $option) }}"
                                                                    name="{{ $choice->name }}"
                                                                    value="{{ $option }}"
                                                                    @if ($index == 0) checked @endif>
                                                                <label class="__text-12px"
                                                                    for="{{ str_replace(' ', '', $choice->name . '-' . $option) }}"">{{ $option }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class=" mt-3">
                                        <div class="product-quantity d-flex flex-column __gap-15">

                                            <div class="d-flex align-items-center gap-3">
                                                <div class="product-description-label text-dark font-bold mt-0">
                                                    {{ translate('quantity') }} :
                                                </div>
                                                <div
                                                    class="d-flex justify-content-center align-items-center quantity-box border rounded border-base web-text-primary">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-number __p-10 web-text-primary"
                                                            type="button" data-type="minus" data-field="quantity"
                                                            disabled="disabled">
                                                            -
                                                        </button>
                                                    </span>
                                                    <input type="text" name="quantity"
                                                        class="form-control input-number text-center cart-qty-field __inline-29 border-0 "
                                                        placeholder="{{ translate('1') }}"
                                                        value="{{ $product->minimum_order_qty ?? 1 }}"
                                                        data-producttype="{{ $product->product_type }}"
                                                        min="{{ $product->minimum_order_qty ?? 1 }}"
                                                        max="{{ $product['product_type'] == 'physical' ? $product->current_stock : 100 }}" readonly>
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-number __p-10 web-text-primary"
                                                            type="button"
                                                            data-producttype="{{ $product->product_type }}"
                                                            data-type="plus" data-field="quantity">
                                                            +
                                                        </button>
                                                    </span>
                                                </div>
                                                <input type="hidden" class="product-generated-variation-code"
                                                    name="product_variation_code">
                                                <input type="hidden" value=""
                                                    class="in_cart_key form-control w-50" name="key">
                                            </div>

                                            <div id="chosen_price_div">
                                                <div
                                                    class="d-none d-sm-flex justify-content-start align-items-center me-2">
                                                    <div
                                                        class="product-description-label text-dark font-bold text-capitalize">
                                                        <strong>{{ translate('total_price') }}</strong> :
                                                    </div>
                                                    &nbsp; <strong id="chosen_price" class="text-base"></strong>
                                                    <small class="ms-2 font-regular">
                                                        (<small>{{ translate('tax') }} : </small>
                                                        <small id="set-tax-amount"></small>)
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="__btn-grp mt-2 mb-3 d-none d-sm-flex">
                                        @if (
                                            ($product->added_by == 'seller' &&
                                                ($sellerTemporaryClose ||
                                                    (isset($product->seller->shop) &&
                                                        $product->seller->shop->vacation_status &&
                                                        $currentDate >= $sellerVacationStartDate &&
                                                        $currentDate <= $sellerVacationEndDate))) ||
                                                ($product->added_by == 'admin' &&
                                                    ($inHouseTemporaryClose ||
                                                        ($inHouseVacationStatus &&
                                                            $currentDate >= $inHouseVacationStartDate &&
                                                            $currentDate <= $inHouseVacationEndDate))))
                                            <button class="btn btn-secondary" type="button" disabled>
                                                {{ translate('buy_now') }}
                                            </button>
                                            <button class="btn btn--primary string-limit" type="button" disabled>
                                                {{ translate('add_to_cart') }}
                                            </button>
                                        @else
                                            <button type="button"
                                                class="btn btn-secondary element-center btn-gap-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }} action-buy-now-this-product">
                                                <span class="string-limit">{{ translate('buy_now') }}</span>
                                            </button>
                                            <button
                                                class="btn btn--primary element-center btn-gap-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }} action-add-to-cart-form"
                                                type="button" data-update-text="{{ translate('update_cart') }}"
                                                data-add-text="{{ translate('add_to_cart') }}">
                                                <span class="string-limit">{{ translate('add_to_cart') }}</span>
                                            </button>
                                        @if($product->bulk_product_status==1)
                                            <button class="btn btn--primary element-center" onclick="openBulkOrderModal()" type="button">
                                                <span class="string-limit">{{ translate('Bulk_Order') }}</span>
                                            </button>
                                        @endif

                                        @endif
                                        <button type="button" data-product-id="{{ $product['id'] }}"
                                            class="btn __text-18px border d-none d-sm-block product-action-add-wishlist">
                                            <i class="fa {{ $wishlistStatus == 1 ? 'fa-heart' : 'fa-heart-o' }} wishlist_icon_{{ $product['id'] }} web-text-primary"
                                                aria-hidden="true"></i>
                                            <span
                                                class="fs-14 text-muted align-bottom countWishlist-{{ $product['id'] }}">{{ $countWishlist }}</span>
                                            <div class="wishlist-tooltip" x-placement="top">
                                                <div class="arrow"></div>
                                                <div class="inner">
                                                    <span class="add">{{ translate('added_to_wishlist') }}</span>
                                                    <span class="remove">{{ translate('removed_from_wishlist') }}</span>
                                                </div>
                                            </div>
                                        </button>
                                        @if (
                                            ($product->added_by == 'seller' &&
                                                ($sellerTemporaryClose ||
                                                    (isset($product->seller->shop) &&
                                                        $product->seller->shop->vacation_status &&
                                                        $currentDate >= $sellerVacationStartDate &&
                                                        $currentDate <= $sellerVacationEndDate))) ||
                                                ($product->added_by == 'admin' &&
                                                    ($inHouseTemporaryClose ||
                                                        ($inHouseVacationStatus &&
                                                            $currentDate >= $inHouseVacationStartDate &&
                                                            $currentDate <= $inHouseVacationEndDate))))
                                            <div class="alert alert-danger" role="alert">
                                                {{ translate('this_shop_is_temporary_closed_or_on_vacation._You_cannot_add_product_to_cart_from_this_shop_for_now') }}
                                            </div>
                                        @endif
                                    </div>
                                    @if (!empty($product->feature_key) && $product->feature_key ==".")
                                        <div class="hightlight d-flex ">
                                            <span class="">Highlight</span>
                                            <?php
                                            echo $product->feature_key;
                                            ?>

                                        </div>
                                        <hr>
                                    @endif
                                    @if (!empty($product->return_policy))
                                        <div class="payment-secure mt-2">
                                            <P class="fw-semi-bold fw-bold">Safe and Secure Payments.Easy returns.100% Authentic
                                                products.
                                            <p>
                                        </div>
                                    @endif
                                    <div class="row no-gutters d-none flex-start d-flex">
                                        <div class="col-12">
                                            @if ($product['product_type'] == 'physical')
                                                <h5 class="text-danger out-of-stock-element d--none">
                                                    {{ translate('out_of_stock') }}</h5>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                                @if($product->bulk_product_status==1)
                                <table class="table table-bordered table-hading-color bulk-table" style="display: none;">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Min Qty</th>
                                            <th>Max Qty</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @if($wholsale->count()> 0)
                                        @foreach($wholsale as $wholesale)
                                        <tr>
                                            <td>{{$wholesale->min_qty}}</td>
                                            <td>
                                                <button class="btn btn-outline-primary btn-control" onclick="changeQuantity(-1,'orderQuantity{{$wholesale->id}}','wholesalePrice{{$wholesale->id}}','{{$wholesale->max_qty}}','{{$wholesale->min_qty}}',{{$wholesale->wholesale_price}},'wholesaleconvertprice{{$wholesale->id}}','orderQuantityrr{{$wholesale->id}}')">-</button>
                                                <span id="orderQuantity{{$wholesale->id}}">{{$wholesale->max_qty}}</span>
                                                <button class="btn btn-outline-primary btn-control" onclick="changeQuantity(1, 'orderQuantity{{$wholesale->id}}','wholesalePrice{{$wholesale->id}}','{{$wholesale->max_qty}}','{{$wholesale->min_qty}}',{{$wholesale->wholesale_price}},'wholesaleconvertprice{{$wholesale->id}}','orderQuantityrr{{$wholesale->id}}')">+</button>
                                            </td>
                                            <td id="wholesalePrice{{$wholesale->id}}">{{webCurrencyConverter(amount: $wholesale->wholesale_price)}}</td>
                                            <form id="wholesaleForm{{$wholesale->id}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$product->id}}">
                                                <input type="hidden" name="wholsale_quantity" id="orderQuantityrr{{$wholesale->id}}" value="{{$wholesale->max_qty}}">
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <input type="hidden" name="wholesale_id" value="{{$wholesale->id}}">
                                                <input type="hidden" name="type" value="wholesale">
                                                <input type="hidden" name="wholesale_price" id="wholesaleconvertprice{{$wholesale->id}}" value="{{$wholesale->wholesale_price}}">
                                                <td><button class="btn btn-secondary btn-sm" type="button" onclick="BuyNowWholesale(this.form); return false;">Buy Now</button></td>
                                            </form>
                                        </tr>
                                        @endforeach
                                      @endif
                                    </tbody>
                                </table>
                            @endif

                                <!-- <div class="vp-front-accordian">
                                    <div class="menu--caret-accordion open">
                                        <div class="card-header flex-between">
                                            <div>
                                                <label class="for-hover-label cursor-pointer " >
                                                    features
                                                </label>
                                            </div>
                                            <div class="px-2 cursor-pointer menu--caret">
                                                <strong class="pull-right for-brand-hover">
                                                    <i class="tio-next-ui fs-13"></i>
                                                </strong>
                                            </div>
                                        </div>
                                        <div class="card-body p-0 ms-2 d--none" id="collapse-414" style="display: block">
                                            <div class="menu--caret-accordion">
                                                <div class="for-hover-label card-header flex-between">
                                                    <div>
                                                        <label class="cursor-pointer" >
                                                            <?= $product->features ?? '' ?>
                                                        </label>
                                                    </div>
                                                    <div class="px-2 cursor-pointer menu--caret">
                                                        <strong class="pull-right">
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0 ms-2 d--none" id="collapse-428">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="menu--caret-accordion">
                                        <div class="card-header flex-between">
                                            <div>
                                                <label class="for-hover-label cursor-pointer " >
                                                    ingredients
                                                </label>
                                            </div>
                                            <div class="px-2 cursor-pointer menu--caret">
                                                <strong class="pull-right for-brand-hover">
                                                    <i class="tio-next-ui fs-13"></i>
                                                </strong>
                                            </div>
                                        </div>
                                        <div class="card-body p-0 ms-2 d--none" id="collapse-414" style="display: none;">
                                            <div class="menu--caret-accordion">
                                                <div class="for-hover-label card-header flex-between">
                                                    <div>
                                                        <label class="cursor-pointer" >
                                                           <?= $product->ingredients1 ?? '' ?>
                                                        </label>
                                                    </div>
                                                    <div class="px-2 cursor-pointer menu--caret">
                                                        <strong class="pull-right">
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0 ms-2 d--none" id="collapse-428" style="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="menu--caret-accordion">
                                        <div class="card-header flex-between">
                                            <div>
                                                <label class="for-hover-label cursor-pointer " >
                                                    How To Use
                                                </label>
                                            </div>
                                            <div class="px-2 cursor-pointer menu--caret">
                                                <strong class="pull-right for-brand-hover">
                                                    <i class="tio-next-ui fs-13"></i>
                                                </strong>
                                            </div>
                                        </div>
                                        <div class="card-body p-0 ms-2 d--none" id="collapse-414" style="display: none;">
                                            <div class="menu--caret-accordion">
                                                <div class="for-hover-label card-header flex-between">
                                                    <div>
                                                        <label class="cursor-pointer" >
                                                           <?= $product->how_to_use ?? '' ?>
                                                        </label>
                                                    </div>
                                                    <div class="px-2 cursor-pointer menu--caret">
                                                        <strong class="pull-right">
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0 ms-2 d--none" id="collapse-428" style="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="menu--caret-accordion">
                                        <div class="card-header flex-between">
                                            <div>
                                                <label class="for-hover-label cursor-pointer " >
                                                    Overview
                                                </label>
                                            </div>
                                            <div class="px-2 cursor-pointer menu--caret">
                                                <strong class="pull-right for-brand-hover">
                                                    <i class="tio-next-ui fs-13"></i>
                                                </strong>
                                            </div>
                                        </div>
                                        <div class="card-body p-0 ms-2 d--none" id="collapse-414" style="display: none;">
                                            <div class="menu--caret-accordion">
                                                <div class="for-hover-label card-header flex-between">
                                                    <div>
                                                        <label class="cursor-pointer " >
                                                            <?= $product->details ?? '' ?>
                                                        </label>
                                                    </div>
                                                    <div class="px-2 cursor-pointer menu--caret">
                                                        <strong class="pull-right">
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0 ms-2 d--none" id="collapse-428" style="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="menu--caret-accordion">
                                        <div class="card-header flex-between">
                                            <div>
                                                <label class="for-hover-label cursor-pointer " >
                                                    Disclaimer
                                                </label>
                                            </div>
                                            <div class="px-2 cursor-pointer menu--caret">
                                                <strong class="pull-right for-brand-hover">
                                                    <i class="tio-next-ui fs-13"></i>
                                                </strong>
                                            </div>
                                        </div>
                                        <div class="card-body p-0 ms-2 d--none" id="collapse-414" style="display: none;">
                                            <div class="menu--caret-accordion">
                                                <div class="for-hover-label card-header flex-between">
                                                    <div>
                                                        <label class="cursor-pointer " >
                                                            <?= $product->disclaimer ?? '' ?>
                                                        </label>
                                                    </div>
                                                    <div class="px-2 cursor-pointer menu--caret">
                                                        <strong class="pull-right">
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0 ms-2 d--none" id="collapse-428" style="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="accordion__custom custom-cr" id="accordion">
                                    <div class="">
                                        <div class="card-header card-head-txt" id="heading-0">
                                            <h6 class="faq-title txt-mb-title mb-0 py-2 fw-bold collapsed" data-toggle="collapse"
                                                data-target="#collapse-0" aria-expanded="false"
                                                aria-controls="collapse-0">
                                                Features
                                            </h6>
                                        </div>

                                        <div id="collapse-0" class="collapse show" aria-labelledby="heading-0"
                                            data-parent="#accordion" style="">
                                            <div class="card-body">
                                                <?= $product->features ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header card-head-txt" id="heading-1">
                                            <h6 class="faq-title txt-mb-title mb-0 fw-bold py-2 collapsed" data-toggle="collapse"
                                                data-target="#collapse-1" aria-expanded="false"
                                                aria-controls="collapse-1">
                                                Ingredients
                                            </h6>
                                        </div>

                                        <div id="collapse-1" class="collapse"  aria-labelledby="heading-1"
                                            data-parent="#accordion" style="">
                                            <div class="card-body">
                                                <?= $product->ingredients1 ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header card-head-txt"  id="heading-2">
                                            <h6 class="faq-title txt-mb-title fw-bold mb-0 py-2 collapsed" data-toggle="collapse"
                                                data-target="#collapse-2" aria-expanded="false"
                                                aria-controls="collapse-2">
                                                How To Use
                                            </h6>
                                        </div>

                                        <div id="collapse-2" class="collapse" aria-labelledby="heading-2"
                                            data-parent="#accordion" style="">
                                            <div class="card-body">
                                                <?= $product->how_to_use ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header card-head-txt" id="heading-3">
                                            <h6 class="faq-title txt-mb-title fw-bold mb-0 py-2 collapsed" data-toggle="collapse"
                                                data-target="#collapse-3" aria-expanded="false"
                                                aria-controls="collapse-3">
                                                Overview
                                            </h6>
                                        </div>

                                        <div id="collapse-3" class="collapse" aria-labelledby="heading-3"
                                            data-parent="#accordion" style="">
                                            <div class="card-body">
                                                <?= $product->details ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header card-head-txt" id="heading-5">
                                            <h6 class="faq-title txt-mb-title fw-bold mb-0 py-2 collapsed" data-toggle="collapse"
                                                data-target="#collapse-5" aria-expanded="false"
                                                aria-controls="collapse-5">
                                                Disclaimer
                                            </h6>
                                        </div>

                                        <div id="collapse-5" class="collapse" aria-labelledby="heading-5"
                                            data-parent="#accordion" style="">
                                            <div class="card-body">
                                                <?= $product->disclaimer ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-4 rtl col-12 text-align-direction">
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div
                                            class="px-4 pb-3 mb-3 mr-0 mr-md-2 bg-white __review-overview __rounded-10 pt-3">
                                            <!-- <ul class="nav nav-tabs nav--tabs d-flex justify-content-center mt-3"
                                                role="tablist">
                                              <li class="nav-item">
                                                    <a class="nav-link __inline-27 active " href="#overview"
                                                        data-toggle="tab" role="tab">
                                                        {{ translate('overview') }}
                                                    </a>
                                                </li> -->

                                            <!-- <li class="nav-item">
                                                    <a class="nav-link __inline-27" href="#features" data-toggle="tab"
                                                        role="tab">
                                                        {{ translate('features') }}
                                                    </a>
                                                </li> -->
                                            <!-- <li class="nav-item">
                                                    <a class="nav-link __inline-27" href="#ingredients1" data-toggle="tab"
                                                        role="tab">
                                                        {{ translate('ingredients') }}
                                                    </a>
                                                </li> -->
                                            <!-- <li class="nav-item">
                                                    <a class="nav-link __inline-27" href="#disclaimer" data-toggle="tab"
                                                        role="tab">
                                                        {{ translate('disclaimer') }}
                                                    </a>
                                                </li> -->


                                            <!-- <li class="nav-item">
                                                    <a class="nav-link __inline-27" href="#reviews" data-toggle="tab"
                                                        role="tab">
                                                        {{ translate('reviews') }}
                                                    </a>
                                                </li>
                                            </ul> -->
                                            <div class="tab-content px-lg-3">
                                                <!-- <div class="tab-pane fade show active text-justify" id="overview"
                                                    role="tabpanel">
                                                    <div class="row pt-2 specification">

                                                        @if ($product->video_url != null && str_contains($product->video_url, 'youtube.com/embed/'))
    <div class="col-12 mb-4">
                                                            <iframe width="420" height="315"
                                                                src="{{ $product->video_url }}">
                                                            </iframe>
                                                        </div>
    @endif
                                                        @if ($product['details'])
    <div class="text-body col-lg-12 col-md-12 overflow-scroll fs-13 text-justify details-text-justify rich-editor-html-content">
                                                            {!! $product['details'] !!}
                                                        </div>
    @endif

                                                    </div>
                                                    @if (!$product['details'] && ($product->video_url == null || !str_contains($product->video_url, 'youtube.com/embed/')))
    <div>
                                                        <div class="text-center text-capitalize py-5">
                                                            <img class="mw-90"
                                                                src="{{ theme_asset(path: 'public/assets/front-end/img/icons/nodata.svg') }}"
                                                                alt="">
                                                            <p class="text-capitalize mt-2">
                                                                <small>{{ translate('product_details_not_found') }}
                                                                    !</small>
                                                            </p>
                                                        </div>
                                                    </div>
    @endif
                                                </div> -->

                                                <div class="" id="reviews" role="tabpanel">
                                                    <div class="review-rating">
                                                        <h4>Ratings & Reviews </h4>
                                                    </div>
                                                    @if (count($product->reviews) == 0 && $productReviews->total() == 0)
                                                        <div>
                                                            <div class="text-center text-capitalize">
                                                                <img class="mw-100"
                                                                    src="{{ theme_asset(path: 'public/assets/front-end/img/icons/empty-review.svg') }}"
                                                                    alt="">
                                                                <p class="text-capitalize">
                                                                    <small>{{ translate('No_review_given_yet') }}!</small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="row  pb-3">
                                                            <div class="col-lg-4 col-md-5 ">
                                                                <div class=" row d-flex  align-items-center">
                                                                    <div class="col-12 d-flex align-items-center">
                                                                        <h2 class="overall_review mb-2 __inline-28">
                                                                            {{ $overallRating[0] }}
                                                                        </h2>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex justify-content-center align-items-center star-rating ">
                                                                        @for ($inc = 1; $inc <= 5; $inc++)
                                                                            @if ($inc <= (int) $overallRating[0])
                                                                                <i class="tio-star text-warning"></i>
                                                                            @elseif ($overallRating[0] != 0 && $inc <= (int) $overallRating[0] + 1.1 && $overallRating[0] > ((int) $overallRating[0]))
                                                                                <i class="tio-star-half text-warning"></i>
                                                                            @else
                                                                                <i
                                                                                    class="tio-star-outlined text-warning"></i>
                                                                            @endif
                                                                        @endfor
                                                                    </div>
                                                                    <div class="col-12 d-flex  align-items-center mt-2">
                                                                        <span class="text-center">
                                                                            {{ $productReviews->total() }}
                                                                            {{ translate('ratings') }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8 col-md-7 pt-sm-3 pt-md-0">
                                                                <div class="d-flex align-items-center mb-2 font-size-sm">
                                                                    <div class="__rev-txt"><span
                                                                            class="d-inline-block align-middle text-body">{{ translate('excellent') }}</span>
                                                                    </div>
                                                                    <div class="w-0 flex-grow">
                                                                        <div class="progress text-body __h-5px">
                                                                            <div class="progress-bar web--bg-primary"
                                                                                role="progressbar"
                                                                                style="width: <?php echo $widthRating = $rating[0] != 0 ? ($rating[0] / $overallRating[1]) * 100 : 0; ?>%;"
                                                                                aria-valuenow="60" aria-valuemin="0"
                                                                                aria-valuemax="100"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1 text-body">
                                                                        <span
                                                                            class=" {{ Session::get('direction') === 'rtl' ? 'mr-3 float-left' : 'ml-3 float-right' }} ">
                                                                            {{ $rating[0] }}
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="d-flex align-items-center mb-2 text-body font-size-sm">
                                                                    <div class="__rev-txt"><span
                                                                            class="d-inline-block align-middle ">{{ translate('good') }}</span>
                                                                    </div>
                                                                    <div class="w-0 flex-grow">
                                                                        <div class="progress __h-5px">
                                                                            <div class="progress-bar web--bg-primary"
                                                                                role="progressbar"
                                                                                style="width: <?php echo $widthRating = $rating[1] != 0 ? ($rating[1] / $overallRating[1]) * 100 : 0; ?>%; background-color: #a7e453;"
                                                                                aria-valuenow="27" aria-valuemin="0"
                                                                                aria-valuemax="100"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        <span
                                                                            class="{{ Session::get('direction') === 'rtl' ? 'mr-3 float-left' : 'ml-3 float-right' }}">
                                                                            {{ $rating[1] }}
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="d-flex align-items-center mb-2 text-body font-size-sm">
                                                                    <div class="__rev-txt"><span
                                                                            class="d-inline-block align-middle ">{{ translate('average') }}</span>
                                                                    </div>
                                                                    <div class="w-0 flex-grow">
                                                                        <div class="progress __h-5px">
                                                                            <div class="progress-bar web--bg-primary"
                                                                                role="progressbar"
                                                                                style="width: <?php echo $widthRating = $rating[2] != 0 ? ($rating[2] / $overallRating[1]) * 100 : 0; ?>%; background-color: #ffda75;"
                                                                                aria-valuenow="17" aria-valuemin="0"
                                                                                aria-valuemax="100"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        <span
                                                                            class="{{ Session::get('direction') === 'rtl' ? 'mr-3 float-left' : 'ml-3 float-right' }}">
                                                                            {{ $rating[2] }}
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="d-flex align-items-center mb-2 text-body font-size-sm">
                                                                    <div class="__rev-txt "><span
                                                                            class="d-inline-block align-middle">{{ translate('below_Average') }}</span>
                                                                    </div>
                                                                    <div class="w-0 flex-grow">
                                                                        <div class="progress __h-5px">
                                                                            <div class="progress-bar web--bg-primary"
                                                                                role="progressbar"
                                                                                style="width: <?php echo $widthRating = $rating[3] != 0 ? ($rating[3] / $overallRating[1]) * 100 : 0; ?>%; background-color: #fea569;"
                                                                                aria-valuenow="9" aria-valuemin="0"
                                                                                aria-valuemax="100"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        <span
                                                                            class="{{ Session::get('direction') === 'rtl' ? 'mr-3 float-left' : 'ml-3 float-right' }}">
                                                                            {{ $rating[3] }}
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="d-flex align-items-center text-body font-size-sm">
                                                                    <div class="__rev-txt"><span
                                                                            class="d-inline-block align-middle ">{{ translate('poor') }}</span>
                                                                    </div>
                                                                    <div class="w-0 flex-grow">
                                                                        <div class="progress __h-5px">
                                                                            <div class="progress-bar web--bg-primary"
                                                                                role="progressbar"
                                                                                style="width: <?php echo $widthRating = $rating[4] != 0 ? ($rating[4] / $overallRating[1]) * 100 : 0; ?>%;"
                                                                                aria-valuenow="4" aria-valuemin="0"
                                                                                aria-valuemax="100"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        <span
                                                                            class="{{ Session::get('direction') === 'rtl' ? 'mr-3 float-left' : 'ml-3 float-right' }}">
                                                                            {{ $rating[4] }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row pb-4 mb-3">
                                                            <div class="__inline-30">
                                                                <span
                                                                    class="text-capitalize">{{ translate('Product_review') }}</span>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <div class="row pb-4">
                                                        <div class="col-12" id="product-review-list">
                                                            @include('web-views.partials._product-reviews')
                                                        </div>

                                                        @if (count($product->reviews) > 2)
                                                            <div
                                                                class="col-12 overflow-scroll fs-13 text-justify details-text-justify rich-editor-html-content">
                                                                <div
                                                                    class="card-footer d-flex justify-content-center align-items-center">
                                                                    <button
                                                                        class="btn text-white view_more_button web--bg-primary">
                                                                        {{ translate('view_more') }}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- <div class="tab-pane fade" id="features" role="tabpanel">
                                                    @if ($product['features'] > 0)
    <div class="col-12 overflow-scroll fs-13 text-justify details-text-justify rich-editor-html-content">
                                                        <div class="card-footer d-flex justify-content-center align-items-center">
                                                            <span
                                                                class="text-capitalize">{{ strip_tags($product['features']) }}</span>
                                                        </div>
                                                    </div>
@else
    <div class="col-12 overflow-scroll fs-13 text-justify details-text-justify rich-editor-html-content">
                                                        <div class="card-footer d-flex justify-content-center align-items-center">
                                                            <span class="text-capitalize">No features available</span>
                                                        </div>
                                                    </div>
    @endif
                                                </div> -->
                                                <!-- <div class="tab-pane fade" id="ingredients1" role="tabpanel">
                                                    @if ($product['ingredients1'] > 0)
    <div class="col-12 overflow-scroll fs-13 text-justify details-text-justify rich-editor-html-content">
                                                        <div class="card-footer d-flex justify-content-center align-items-center">
                                                            <span class="text-capitalize">{{ strip_tags($product['ingredients1']) }}</span>
                                                        </div>
                                                    </div>
@else
    <div class="col-12 overflow-scroll fs-13 text-justify details-text-justify rich-editor-html-content">
                                                        <div class="card-footer d-flex justify-content-center align-items-center">
                                                            <span class="text-capitalize">No ingredients available</span>
                                                        </div>
                                                    </div>
    @endif
                                                </div> -->
                                                <!-- <div class="tab-pane fade" id="disclaimer" role="tabpanel">
                                                    @if ($product['disclaimer'] > 0)
    <div class="col-12 overflow-scroll fs-13 text-justify details-text-justify rich-editor-html-content">
                                                        <div class="card-footer d-flex justify-content-center align-items-center">
                                                            <span class="text-capitalize">{{ strip_tags($product['disclaimer']) }}</span>
                                                        </div>
                                                    </div>
@else
    <div class="col-12 overflow-scroll fs-13 text-justify details-text-justify rich-editor-html-content">
                                                        <div class="card-footer d-flex justify-content-center align-items-center">
                                                            <span class="text-capitalize">No disclaimer available</span>
                                                        </div>
                                                    </div>
    @endif
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">
                    @php($companyReliability = getWebConfig('company_reliability'))
                    @if ($companyReliability != null)
                        <div class="product-details-shipping-details">
                            @foreach ($companyReliability as $key => $value)
                                @if ($value['status'] == 1 && !empty($value['title']))
                                    <div class="shipping-details-bottom-border">
                                        <div class="px-3 py-3">
                                            <img class="{{ Session::get('direction') === 'rtl' ? 'float-right ml-2' : 'mr-2' }} __img-20"
                                                src="{{ getStorageImages(path: imagePathProcessing(imageData: $value['image'], path: 'company-reliability'), type: 'source', source: 'public/assets/front-end/img' . '/' . $value['item'] . '.png') }}"
                                                alt="">
                                            <span>{{ translate($value['title']) }}</span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    <div class="pt-4 pb-3">
                        <span class=" __text-16px font-bold text-capitalize">
                            @if (getWebConfig(name: 'business_mode') == 'multi')
                                {{ translate('more_from_the_store') }}
                            @else
                                {{ translate('you_may_also_like') }}
                            @endif
                        </span>
                    </div>
                    <div>
                        @foreach ($moreProductFromSeller as $item)
                            @include('web-views.partials._seller-products-product-details', [
                                'product' => $item,
                                'decimal_point_settings' => $decimalPointSettings,
                            ])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-sticky bg-white d-sm-none">
            <div class="d-flex flex-column gap-1 py-2">
                <div class="d-flex justify-content-center align-items-center fs-13">
                    <div class="product-description-label text-dark font-bold"><strong
                            class="text-capitalize">{{ translate('total_price') }}</strong> :
                    </div>
                    &nbsp; <strong id="chosen_price_mobile" class="text-base"></strong>
                    <small class="ml-2  font-regular">
                        (<small>{{ translate('tax') }} : </small>
                        <small id="set-tax-amount-mobile"></small>)
                    </small>
                </div>
                <div class="d-flex gap-3 justify-content-center">
                    @if (
                        ($product->added_by == 'seller' &&
                            ($sellerTemporaryClose ||
                                (isset($product->seller->shop) &&
                                    $product->seller->shop->vacation_status &&
                                    $currentDate >= $sellerVacationStartDate &&
                                    $currentDate <= $sellerVacationEndDate))) ||
                            ($product->added_by == 'admin' &&
                                ($inHouseTemporaryClose ||
                                    ($inHouseVacationStatus &&
                                        $currentDate >= $inHouseVacationStartDate &&
                                        $currentDate <= $inHouseVacationEndDate))))
                            <button
                                class="btn btn-secondary btn-sm btn-gap-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}"
                                type="button" disabled>
                                {{ translate('buy_now') }}
                            </button>
                            <button
                                class="btn btn--primary btn-sm string-limit btn-gap-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }}"
                                type="button" disabled>
                                {{ translate('add_to_cart') }}
                            </button>
                        @else
                            <button
                                class="btn btn-secondary btn-sm btn-gap-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }} action-buy-now-this-product"
                                type="button">
                                <span class="string-limit">{{ translate('buy_now') }}</span>
                            </button>
                            <button
                                class="btn btn--primary btn-sm string-limit btn-gap-{{ Session::get('direction') === 'rtl' ? 'left' : 'right' }} action-add-to-cart-form"
                                type="button">
                                <span class="string-limit">{{ translate('add_to_cart') }}</span>
                            </button>
                    @endif
                </div>
            </div>
        </div>

        @if (count($relatedProducts) > 0)
            <div class="container-fluid rtl text-align-direction">
                <div class="card __card border-0 mb-4">
                    <div class="card-body">
                        <div class="row flex-between">
                            <div class="ms-1">
                                <h4 class="text-capitalize font-bold fs-16">{{ translate('similar_products') }}</h4>
                            </div>
                            <div class="view_all d-flex justify-content-center align-items-center">
                                <div>
                                    @php($category = json_decode($product['category_ids']))
                                    @if ($category)
                                        <a class="text-capitalize view-all-text web-text-primary me-1"
                                            href="{{ route('products', ['id' => $category[0]->id, 'data_from' => 'category', 'page' => 1]) }}">{{ translate('view_all') }}
                                            <i
                                                class="czi-arrow-{{ Session::get('direction') === 'rtl' ? 'left mr-1 ml-n1 mt-1 ' : 'right ml-1 mr-n1' }}"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mt-1">
                            @foreach ($relatedProducts as $key => $relatedProduct)
                                <div class="col-xl-2 col-sm-3 col-6">
                                    @include('web-views.partials._inline-single-product-without-eye', [
                                        'product' => $relatedProduct,
                                        'decimal_point_settings' => $decimalPointSettings,
                                    ])
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="modal fade rtl text-align-direction" id="show-modal-view" tabindex="-1" role="dialog"
            aria-labelledby="show-modal-image" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body flex justify-content-center">
                        <button class="btn btn-default __inline-33 dir-end-minus-7px" data-dismiss="modal">
                            <i class="fa fa-close"></i>
                        </button>
                        <img class="element-center" id="attachment-view" src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap 5 Styled Modal -->
    @include('layouts.front-end.partials.modal._chatting', [
        'seller' => $product->seller,
        'user_type' => $product->added_by,
    ])


    <span id="route-review-list-product" data-url="{{ route('review-list-product') }}"></span>
    <span id="products-details-page-data" data-id="{{ $product['id'] }}"></span>
@endsection

@push('script')
    <script src="{{ theme_asset(path: 'public/assets/front-end/js/product-details.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('#orderForm').submit(function(e) {
                e.preventDefault();
                $('#order-now-btn i').css('display', 'block');
                $.ajax({
                    url: "{{ route('bulk_order') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success === true) {
                            $('#error-email').html("");
                            $('#error-name').html("");
                            $('#error-phone-number').html("");
                            $('#error-quantity').html("");
                            $('#order-now-btn i').css('display', 'none');
                            Swal.fire({
                                title: "Thank You for Your Interest in Bulk Order!",
                                text: "Your order request has been submitted successfully!",
                                icon: "success",
                            });
                            $('#myModal').modal('hide');
                            $('#orderForm')[0].reset();
                        } else{
                            $('#order-now-btn i').css('display', 'none');
                            $('#error-email').html(response.message.email);
                            $('#error-name').html(response.message.name);
                            $('#error-phone-number').html(response.message.phone_number);
                            $('#error-quantity').html(response.message.quantity);
                        }
                    },
                    error: function(xhr) {
                        alert("Error: " + xhr.responseText);
                    }
                });
            });
            $(".close-modal").click(function() {
                $('#myModal').modal('hide');
                $('#orderForm')[0].reset();
            });
        });
    </script>

<script>
    function changeQuantity(amount,elementId,elementId1,max_quantity,min_qty,whole_sale_price,updateprice,orderQuantity) {
        let queryElement = document.getElementById(elementId1);
        let quantityElement = document.getElementById(elementId);
        // let queryElementUpdateprice = document.getElementById(updateprice);
        let currentQuantity = parseInt(quantityElement.innerText);

        let newQuantity = currentQuantity + amount;

        if(newQuantity > max_quantity){
            return false;
        }

        if(newQuantity < min_qty){
            return false;
        }

        price = parseFloat(whole_sale_price / max_quantity);
        finell_price = parseFloat(price * newQuantity);

        console.log(price,"total price",finell_price);
        if (newQuantity >= 0) {
            quantityElement.innerText = newQuantity;
        }
        $.ajax({
            url: "{{ url('cart/change_quantity') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                convert_price: finell_price
            },
            success: function(response) {
                if (response.status == true) {
                    queryElement.innerText = response.price;
                    document.getElementById(updateprice).value = finell_price;
                    document.getElementById(orderQuantity).value = newQuantity;

                }
            }
        });
    }
    function BuyNowWholesale(form) {
        const formData = new FormData(form);
        formData.append('quantity', 1);
        formData.append('product_variation_code','');
        document.getElementById('loading').style.display = 'block';
        $.ajax({
            url: "{{ url('/cart/add') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                if (response.status == 1) {
                    document.getElementById('loading').style.display = 'none';
                    window.location.replace("{{ url('shop-cart') }}");
                } else {
                    Swal.fire({
                        title: "Error",
                        text: response.message,
                        icon: "error",
                    });
                }
            },
            error: function(xhr) {
                Swal.fire({
                    title: "Error",
                    text: "An error occurred while processing your request.",
                    icon: "error",
                });
            }
        });
    }

    function openBulkOrderModal(){
        $(".bulk-table").slideToggle(500);
    }
</script>

@endpush
