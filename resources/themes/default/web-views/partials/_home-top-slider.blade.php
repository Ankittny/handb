@if(count($main_banner) > 0)
<section class="bg-transparent py-3">
    <div class="container-fluid position-relative">
        <div class=" no-gutters position-relative rtl">
            @if ($categories->count() > 0 )
                <!-- <div class="col-xl-3 position-static d-none d-xl-block __top-slider-cate">
                    <div class="category-menu-wrap position-static">
                        <ul class="category-menu mt-0">
                            @foreach ($categories as $key=>$category)
                                <li>
                                    <a href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">{{$category->name}}</a>
                                    @if ($category->childes->count() > 0)
                                        <div class="mega_menu z-2">
                                            @foreach ($category->childes as $sub_category)
                                                <div class="mega_menu_inner">
                                                    <h6><a href="{{route('products',['id'=> $sub_category['id'],'data_from'=>'category','subcategory_slug'=>$sub_category['slug'],'page'=>1])}}">{{$sub_category->name}}</a></h6>
                                                    @if ($sub_category->childes->count() >0)
                                                        @foreach ($sub_category->childes as $sub_sub_category)
                                                            <div><a href="{{route('products',['id'=> $sub_sub_category['id'],'data_from'=>'category','subcategory_slug'=>$sub_sub_category['slug'],'page'=>1])}}">{{$sub_sub_category->name}}</a></div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                            <li class="text-center">
                                <a href="{{route('categories')}}" class="text-primary font-weight-bold justify-content-center text-capitalize">
                                    {{translate('view_all')}}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> -->
            @endif

            <div class="col-12 col-xl-12 __top-slider-images">
                <div class="{{Session::get('direction') === "rtl" ? 'pr-xl-0' : 'pl-xl-0'}}">
                    <div class="owl-theme owl-carousel hero-slider">
                        @foreach($main_banner as $key=>$banner)
                            <a href="{{$banner['url']}}" class="d-block" target="_blank">
                                <img class=" __slide-img" alt="{{$banner->alt_tag ?? 'healthandblossom'}}"
                                    src="{{ getStorageImages(path: $banner->photo_full_url, type: 'banner') }}">
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif