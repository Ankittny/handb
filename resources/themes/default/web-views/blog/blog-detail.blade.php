@extends('layouts.front-end.app')

@section('title',translate('contact_us'))

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
                                <div style="float:right;">
                                <span class="card-text text-muted fs-7 mb-0">
                                    <b>Author:</b> Added by Admin | <b>Date:</b> {{ $date->format('d F Y') }}
                                </span>
                                </div>
                                <div class="frequengtly-ft">
                                    <a href="">
                                        {{ $blog->title }}
                                    </a>
                                </div>


                                <div class="justify-content-between ">
                                    <div class="product-price text-center d-flex flex-wrap justify-content-center align-items-center gap-8">
                                        <span class="text-accent text-accents text-dark">
                                         <?= $blog->description ?> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
