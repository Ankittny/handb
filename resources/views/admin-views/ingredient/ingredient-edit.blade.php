@extends('layouts.back-end.app')

@section('title', translate('category'))
@push('css_or_js')
    <link href="{{ dynamicAsset(path: 'public/assets/back-end/css/tags-input.min.css') }}" rel="stylesheet">
    <link href="{{ dynamicAsset(path: 'public/assets/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ dynamicAsset(path: 'public/assets/back-end/plugins/summernote/summernote.min.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="content container-fluid">
        <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
            <h2 class="h1 mb-0">
                <img src="{{ dynamicAsset(path: 'public/assets/back-end/img/brand-setup.png') }}" class="mb-1 mr-1" alt="">
                @if($category['position'] == 1)
                    {{ translate('sub') }}
                @elseif($category['position'] == 2)
                    {{ translate('sub_Sub') }}
                @endif
                {{ translate('ingredient') }}
                {{ translate('update') }}
            </h2>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body text-start">
                        <form action="{{ route('admin.category.update', [$category['id']]) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="organic_status" value="1">
                            <ul class="nav nav-tabs w-fit-content mb-4">
                                @foreach($languages as $lang)
                                    <li class="nav-item text-capitalize">
                                        <span
                                            class="nav-link form-system-language-tab cursor-pointer {{ $lang == $defaultLanguage? 'active':''}}"
                                            id="{{ $lang}}-link">
                                            {{ getLanguageName($lang).'('.strtoupper($lang).')'}}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="row">
                                <div
                                    class="{{ $category['parent_id']==0 || $category['position'] == 1 ? 'col-lg-6':'col-12' }}">
                                    @foreach($languages as $lang)
                                        <div>
                                                <?php
                                                if (count($category['translations'])) {
                                                    $translate = [];
                                                    foreach ($category['translations'] as $t) {
                                                        if ($t->locale == $lang && $t->key == "name") {
                                                            $translate[$lang]['name'] = $t->value;
                                                        }
                                                    }
                                                }
                                                ?>
                                            <div class="form-group {{ $lang != $defaultLanguage ? 'd-none':''}} form-system-language-form"
                                                id="{{ $lang}}-form">
                                                <label class="title-color">
                                                    {{ translate('category_Name') }} ({{strtoupper($lang) }})
                                                </label>
                                                <input type="text" name="name[]"
                                                       value="{{ $lang==$defaultLanguage?$category['name']:($translate[$lang]['name']??'') }}"
                                                       class="form-control category-title-name"
                                                       placeholder="{{ translate('new_Category') }}" {{ $lang == $defaultLanguage? 'required':''}}>
                                            </div>
                                            <input type="hidden" name="lang[]" value="{{ $lang}}">
                                            <input type="hidden" name="id" value="{{ $category['id']}}">
                                        </div>
                                    @endforeach

                                   <div class="form-group">
                                        <label class="title-color" for="priority">{{ translate('Description') }}
                                            <span>
                                            <i class="tio-info-outined" data-toggle="tooltip" data-placement="top"
                                               title="{{ translate('description') }}"></i>
                                            </span>
                                        </label>

                                         <textarea name="description" class="form-control">{{$category['description']}}</textarea>
                                    </div>
                                  
                                    <div class="form-group">
                                        <label class="title-color" for="priority">{{ translate('priority') }}</label>
                                        <select class="form-control" name="priority" id="" required>
                                            @for ($index = 0; $index <= 10; $index++)
                                                <option
                                                    value="{{ $index }}" {{ $category['priority']==$index?'selected':''}}>{{ $index }}</option>
                                            @endfor
                                        </select>
                                    </div>

                              <div class="form-group">
                                        <label class="title-color" for="meta_title">{{ translate('Meta Title') }}</label>
                                        <input type="text" name="meta_title" value="{{$category['meta_title']}}" class="form-control" placeholder="{{ translate('enter_meta_title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="title-color" for="meta_description">{{ translate('Meta Description') }}</label>
                                        <textarea name="meta_description" value="{{$category['meta_description']}}" class="form-control" placeholder="{{ translate('enter_meta_description') }}">{{$category['meta_description']}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="title-color" for="keywords">{{ translate('Keywords') }}</label>
                                        <input type="text" name="keywords" value="{{$category['keywords']}}" class="form-control" placeholder="{{ translate('enter_keywords') }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="title-color" for="keywords">{{ translate('Slug') }}</label>
                                        <input type="text" name="slug" value="{{$category['slug']}}" class="form-control" id="slug-id" placeholder="{{ translate('enter_slugs') }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="title-color" for="alt_tag">{{ translate('Alt Tag') }}</label>
                                        <input type="text" name="alt_tag" value="{{$category['alt_tag']}}"  class="form-control" placeholder="{{ translate('enter_alt_tag') }}">
                                    </div>
                              		
                              		<div class="form-group pt-4">
                                        <label class="title-color" for="{{ $lang }}_content_writing_area">
                                            {{ translate('Content Writing Area') }} ({{ strtoupper($lang) }})
                                        </label>
                                        <textarea name="content_writing_area" class="summernote {{ $language == 'en' ? 'content-writing-area' : '' }}">
                                            {!! $translate[$language]['content_writing_area'] ?? $category['content_writing_area'] !!}
                                        </textarea>
                                    </div>
                              		
                              	
                                    @if($category['parent_id']==0 || ($category['position'] == 1 && theme_root_path() == 'theme_aster'))
                                        <div class="from_part_2">
                                            <label class="title-color">{{ translate('category_Logo') }}</label>
                                            <span class="text-info">({{ translate('ratio') }} 1:1)</span>
                                            <div class="custom-file text-left">
                                                <input type="file" name="image" id="category-image"
                                                       class="custom-file-input image-preview-before-upload"
                                                       data-preview="#viewer"
                                                       accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                                <label class="custom-file-label"
                                                       for="category-image">{{ translate('choose_File') }}</label>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-lg-6 mt-5 mt-lg-0 from_part_2">
                                    <div class="form-group">
                                        <div class="text-center mx-auto">
                                            <img class="upload-img-view"
                                                 id="viewer"
                                                 src="{{ getStorageImages(path: $category->icon_full_url , type: 'backend-basic') }}"
                                                 alt=""/>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($category['position'] == 2 || ($category['position'] == 1 && theme_root_path() != 'theme_aster'))
                                    <div class="d-flex justify-content-end gap-3">
                                        <button type="reset" id="reset" class="btn btn-secondary px-4">
                                            {{ translate('reset') }}
                                        </button>
                                        <button type="submit" class="btn btn--primary px-4">
                                            {{ translate('update') }}
                                        </button>
                                    </div>
                                @endif
                            </div>

                            @if($category['parent_id']==0 || ($category['position'] == 1 && theme_root_path() == 'theme_aster'))
                                <div class="d-flex justify-content-end gap-3">
                                    <button type="reset" id="reset"
                                            class="btn btn-secondary px-4">{{ translate('reset') }}</button>
                                    <button type="submit"
                                            class="btn btn--primary px-4">{{ translate('update') }}</button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('script')
 <script src="{{ dynamicAsset(path: 'public/assets/back-end/js/products-management.js') }}"></script>
    <script src="{{ dynamicAsset(path: 'public/assets/back-end/js/tags-input.min.js') }}"></script>
    <script src="{{ dynamicAsset(path: 'public/assets/back-end/js/spartan-multi-image-picker.js') }}"></script>
    <script src="{{ dynamicAsset(path: 'public/assets/back-end/plugins/summernote/summernote.min.js') }}"></script>
    <script src="{{ dynamicAsset(path: 'public/assets/back-end/js/admin/product-add-update.js') }}"></script>
    <script src="{{ dynamicAsset(path: 'public/assets/back-end/js/admin/product-add-colors-img.js') }}"></script>
    <script>
        $('.category-title-name').on('change keyup keypress', function () {
            var slugValue = $(this).val().replace(/\s+/g, '-');
            $('#slug-id').val(slugValue);
        });
    </script>
@endpush
