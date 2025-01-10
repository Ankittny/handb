@extends('layouts.front-end.app')

@section('title', translate('sign_in'))

@section('content')

<div class="text-align-direction">
    <div class="login-card">
        <div class="mx-auto __max-w-360 color-bc">
     
            <h2 class="text-center h4 mb-4 font-bold text-capitalize fs-18-mobile">Log In or Sign Up</h2>
      <hr>
            <div class="number-verification mt-3">
                <!-- <p class="text-center">Enter your mobile number</p>
                    <h5 class="text-center">We Will Send you On OTP Message </h5> -->
                <div>
                    <form class="needs-validation mt-2" autocomplete="off" action="{{route('customer.auth.login')}}"
                        method="post" id="customer-login-form">
                        @csrf
                        <div class="form-group">
                            <input class="form-control text-align-direction" type="number" name="mobile_number" id="mobile_number"
                                value="{{old('user_id')}}" placeholder="{{ translate('Enter_mobile_number') }}"
                                required>
                               <span class="text-danger text-align-direction add-fadein" id="customer-login-form"></span>
                        </div>

                        <div class="form-group show-otp" style="display: none">
                            <input class="form-control text-align-direction" type="number" name="otp" id="otp-number" placeholder="{{ translate('Enter_Otp') }}"
                                required>
                                <span class="text-danger text-align-direction add-fadein-otp"></span>
                        </div>
                        <span class="verifyTimer"></span>
                        <button class="btn btn--primary btn-block btn-shadow getotp hide-button" type="submit">GET OTP</button>
                        <button style="display: none" class="btn btn--primary btn-block btn-shadow VARIFYOTP show-button" type="submit">VARIFY OTP</button>
                    </form>
                    @if($web_config['social_login_text'])
                    <div class="text-center m-3 text-black-50">
                        <small>{{ translate('or_continue_with') }}</small>
                    </div>
                    @endif
                    <div class=" my-3 gap-2">
                        @foreach (getWebConfig(name: 'social_login') as $socialLoginService)
                        @if (isset($socialLoginService) && $socialLoginService['status'])
                        <div class=" block-verified bg-white">
                            <a class="d-block mt-2 text-center bl-block" href="{{ route('customer.auth.service-login', $socialLoginService['login_medium']) }}">
                                <img src="{{theme_asset(path: 'public/assets/front-end/img/icons/'.$socialLoginService['login_medium'].'.png') }}" alt="">
                                Google With Continue
                            </a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="text-black-50 text-center">
                        <small>
                            {{ translate('Enjoy_New_experience') }}
                            <a class="text-primary text-underline" href="{{route('customer.auth.sign-up')}}">
                                {{ translate('sign_up') }}
                            </a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('script')
  <script>
    $(".getotp").on("click", function (e) {
        e.preventDefault();
        let mobile = $("#mobile_number").val();
            $.ajax({
                url: "{{url('api/v1/auth/send-otp')}}",
                type: "POST",
                headers: {
                    "Authorization": "Bearer " + "sfdsd12345678",
                },
                contentType: "application/json",
                data: JSON.stringify({
                    phone: mobile,
                    _token: $('meta[name="csrf-token"]').attr("content"),
                }),
                success: function (data) {
                    if (data.status == true) {

                        let countDownDate = new Date().getTime() + 120000;
                        function startCountdown() {
                            let now = new Date().getTime();
                            let distance = countDownDate - now;
                            let seconds = Math.max(Math.floor((distance % (1000 * 60)) / 1000), 0);
                            $(".verifyTimer").html("Resend Code (in "+seconds+" Secs)");
                            if (distance < 0) {
                                clearInterval(x);
                                $(".resend-otp-button").prop('disabled', false);
                                $(".show-button").hide();
                                $(".hide-button").show();
                                $(".show-otp").hide();
                            }
                        }

                        let x = setInterval(startCountdown, 1000);
                        $(".resend-otp-button").prop('disabled', true);
                        setTimeout(function(){
                            $(".resend-otp-button").prop('disabled', false);
                        },30000);

                        $(".add-fadein").html("");
                        $(".hide-button").hide();
                        $(".show-button").show();
                        $(".show-otp").show();
                        console.log("Otp sent");
                    } else {
                        $(".add-fadein").html(data.errors[0].message);
                    }
            }
        });
    });

    $(".VARIFYOTP").on("click", function (e) {
        e.preventDefault();
        let mobile = $("#mobile_number").val();
        let otp = $("#otp-number").val();
        $.ajax({
            url: "{{url('customer/auth/otp-verify-web')}}",
            type: "POST",
            headers: {
                "Authorization": "Bearer " + "sfdsd12345678",
            },
            contentType: "application/json",
            data: JSON.stringify({
                phone: mobile,
                otp: otp,
                cm_firebase_token:"2342354435435",
                _token: "{{ csrf_token() }}",
            }),
            success: function (data) {
                if (data.status == true) {
                    window.location.href = "{{url('/')}}";
                } else {
                    if(typeof data.errors !== 'undefined' && data.errors[0] !== ''){
                        $(".add-fadein").html(data.errors[0].message);
                    }else{
                        $(".add-fadein-otp").html("Verification Failed. Please try again.");
                    }
                }
            }
        });
    });
</script>
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
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer></script>
@endif
@endpush
