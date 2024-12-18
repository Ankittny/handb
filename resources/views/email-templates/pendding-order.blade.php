<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ translate('pending_order') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ dynamicAsset(path: 'public/assets/back-end/css/email-basic.css') }}">
</head>
<body>



<div class="d-flex justify-content-center align-items-center m-auto vh-100">
    <div class="card">
        <div class="m-auto bg-white pt-40px pb-40px text-center">
            <div class="d-block">
                
            </div>
        </div>
        <div class="card-header mb-3 text-center">
            <h3 class="pb-20px">{{ translate('notification mail for order pending') }}</h3>
            <h3> Dear Seller, </h3>
            {{ translate('We have sent you this email in response to your order pending. You will be able to see your order status after login to your account') }}.
        </div>
        <div class="card-body">
            <p class="text-center">
                {{ translate('If you need help, or you have any other questions, feel free to email us') }}.
            </p>

        </div>
    </div>
</div>
</body>
</html>

