@extends('layouts.front-end.app')

@section('title', translate('contact_us'))

@push('css_or_js')
    <link rel="stylesheet"
        href="{{ theme_asset(path: 'public/assets/front-end/plugin/intl-tel-input/css/intlTelInput.css') }}">
@endpush

@section('content')
    <div class="container-fluid pb-5 mb-2 mb-md-4 rtl __inline-35" dir="ltr">
        <div class="row">
            <div class="col-lg-3">
                <div class="product-details-shipping-details">
                </div>
                <div class="pt-4 pb-3">
                    <span class=" __text-16px font-bold text-capitalize">
                        Recent Post
                    </span>
                </div>
                <!-- <div class="input-group-overlay search-form-mobile text-align-direction">
                    <form action="" method="get">
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
                </div> -->

                <div class="mt-4">
                    @foreach ($recent_posts as $recent)
                        <div class="flash_deal_product rtl cursor-pointer mb-2 get-view-by-onclick"
                            data-link="{{ route('blog-detail', $recent->slug) }}">
                            <div class="d-flex">
                                <div class="d-flex align-items-center justify-content-center p-3">
                                    <div class="flash-deals-background-image image-default-bg-color">
                                        <img class="__img-125px" alt=""
                                            src="{{ asset('public/assets/back-end/bloges/') . '/' . $recent->image }}">
                                    </div>
                                </div>
                                <div class="  pl-3 pr-3 pr-1 d-flex align-items-center">
                                    <div>
                                        <span class="flash-product-title">
                                            {{ $recent->title }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <section class="col-lg-9">
                @php
                    use App\Models\Blog;
                    $blogs = Blog::paginate(10); // Limits the number of blogs to 10
                @endphp

                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class=" col-lg-3 col-md-4 col-sm-4 col-6  p-2">
                            <div class="hidden-text">
                                <div class="overflow-hidden position-relative">
                                    <div class="inline_product product-fix clickable ">
                                        <div class=" lias-int">
                                            <a href="{{ route('blog-detail', $blog->slug) }}" class="w-100"></a>
                                            <img alt=""
                                                src="{{ asset('public/assets/back-end/bloges/') . '/' . $blog->image }}">
                                            </a>
                                        </div>
                                        <div class="text-timedate d-flex gap-2 mt-2">
                                            <p>Celigin</p>
                                            <span>Nov 18, 2024</span>
                                           </div>

                                        <!-- <div class="quick-view">
                                        <a class="btn-circle stopPropagation action-product-quick-view" href="https://new.healthandblossom.com/blog-detail/new-test-detail:" data-product-id="616">
                                            <i class="czi-eye align-middle"></i>
                                        </a>
                                    </div> -->
                                    </div>
                                    <div class="single-product-details">

                                        <div class="frequengtly-ft">
                                            <a href="blog-detail/{{$blog->slug ?? ""}}">
                                                {{ $blog->title }}
                                            </a>
                                        </div>
                                        <div class="justify-content-between fx-justify ">
                                                <?php
                                                    $string = strip_tags($blog->description);
                                                    $string = preg_replace('/\s+/', ' ', $string);
                                                    $string = substr($string, 0, 89) . (strlen($string) > 89 ? '...' : '');
                                                ?>
                                                <?= $string ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pagination-container">
                    {{ $blogs->links() }}
                </div>

        </div>











    </div>
    </section>
    </div>
    </div>
@endsection


@push('script')
    @if (isset($recaptcha) && $recaptcha['status'] == 1)
        <script type="text/javascript">
            "use strict";
            var onloadCallback = function() {
                grecaptcha.render('recaptcha_element', {
                    'sitekey': '{{ getWebConfig(
                        name: '
                                recaptcha ',
                    )[
                        '
                                site_key '
                    ] }}'
                });
            };
        </script>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
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
