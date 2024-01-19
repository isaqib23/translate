<html>
<head>
    <meta charset="UTF-8">
    <title>Receipt Voucher</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-white">
    <div class="container mx-auto px-4">
        <div class="border-b-4 border-blue-800 py-6">
            <div class="flex justify-between items-center">
                <img src="{{ asset('frontend/img/logo.png') }}" alt="Translingua logo placeholder image" class="h-12">
                <div class="text-right">
                    <p class="text-3xl font-bold text-blue-800">Translingua</p>
                    <p class="text-xl text-blue-800">For Translation Services</p>
                </div>
            </div>
            <div class="flex justify-between items-center mt-4">
                <div class="text-lg">
                    <p class="font-bold">Total Amount Dhs. {{$payment->amount}}</p>
                </div>
                <div class="text-lg text-red-600">
                    <p>No. {{$payment->id}}</p>
                </div>
            </div>
            <div class="text-right text-sm">
                <p>RECEIPT VOUCHER {{$payment->user_uuid}}</p>
                <p>Date {{$payment->updated_at}}</p>
            </div>
        </div>
        <div class="py-4">
            <p>Received from Mr./Ms. <u>{{$user->email}}</u></p>
            <p>The sum of Dirham. <u>{{$payment->amount}}</u></p>
            <p>By Cash/ Cheque No: ________________________________________</p>
            <p>Being ______________________________________________________</p>
            <p>Phone No. <u>{{$user->mobile}}</u></p>
            <p class="text-right">Received by <u>{{$payment->employee}}</u></p>
        </div>
        <div class="border-t-2 border-blue-500 py-4">
            <div class="flex justify-between items-center">
                <p class="flex items-center">
                    <i class="fas fa-phone-alt text-blue-800"></i>
                    <span class="ml-2">+971 50 300 7293, +971 55 393 2225</span>
                </p>
                <p class="flex items-center">
                    <i class="fas fa-envelope text-blue-800"></i>
                    <span class="ml-2">Trans4dubai@gmail.com</span>
</p>
<div class="flex items-center">
<a href="#" class="text-blue-800"><i class="fab fa-facebook-f mx-2"></i></a>
<a href="#" class="text-blue-800"><i class="fab fa-twitter mx-2"></i></a>
</div>
</div>
<div class="text-center text-blue-800">
<p>R20, Ground Floor, Supreme Court Building, Dubai Courts Complex, Dubai - U.A.E.</p>
</div>
</div>
</div>

</body>
</html>
