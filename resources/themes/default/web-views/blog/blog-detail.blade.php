@extends('layouts.front-end.app')

@section('title',translate('healthandblossom blog details'))

@push('css_or_js')
<link rel="stylesheet" href="{{ theme_asset(path: 'public/assets/front-end/plugin/intl-tel-input/css/intlTelInput.css') }}">
@endpush

@section('content')
<div class="container-fluid pb-5 mb-2 mb-md-4 rtl __inline-35" dir="ltr">
    <div class="row">

        <div class="col-lg-12">
            <div class="row" id="ajax-products">
                <div class=" col-lg-12 col-md-12 col-sm-12 col-12  p-2">
                    <div class="product-single-hover style--card">
                        <div class="overflow-hidden position-relative">
                            <div class=" inline_product pro-dct clickable d-flex justify-content-center">
                                <div class="d-flex justify-content-end">
                                    <span class="for-discount-value-null"></span>
                                </div>
                                <div class="p-10px pb-0">
                                    <a href="" class="w-100">
                                        <img alt="" src="{{asset('public/assets/back-end/bloges/').'/'.$blog->image }}">
                                    </a>
                                </div>


                            </div>
                            <div class="single-product-details">
                                @php
                                    $date = new \DateTime($blog->updated_at);
                                @endphp
                                <div class="frequengtly-ft ft-bold">
                                  <h1 class="text-center fw-bold"> {{ $blog->title }}</h1>
                                </div>


                                <div class="justify-content-between ">
                                    <div class="product-description">
                                         <p><?= $blog->description ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="float:right;">
                                <span class="card-text text-muted fs-7 mb-0">
                                    <b>Author:</b> Added by Health and Blossom | <b>Date:</b> {{ $date->format('d F Y') }}
                                </span>
                                </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection


