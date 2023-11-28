<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/image')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <!-- Tailwind CSS -->
    <title>Weather App</title>
</head>

<body class="bg-sky-800 bg-cover bg-center">
<div class="container mx-auto text-center mt-16 w-96">
    <div class="container p-6 bg-sky-200 rounded-lg shadow-lg">
    <img src="{{ asset('images/waeas.png') }}" alt="" class="w-[80px]">
      <h1 class="text-4xl font-bold">What's The Weather?</h1>

        <form action="{{ url('/weather') }}" method="GET" class="mt-6">
            <div class="flex bg-white w-80 rounded-lg">
            <fieldset class="form-group">
                <!-- <label for="city" class="block text-left mb-2">Enter the name of a city.</label> -->
                <input type="text" class="form-input w-full border-none px-4 py-4 outline-none rounded-lg " name="city" id="city" placeholder="Eg. London, Tokyo" value="{{ request('city') }}">    
             </fieldset>

            <button type="submit" class="rounded ml-12 py-2">
                <i class="fas fa-search mr-2"></i>
            </button>
            </div>
        </form>

        <div id="weather" class="mt-6 ">
           @isset($weather)
                <div class="alert alert-success" role="alert">
                    <div class="">
                        <div class="m-4 p-4 bg-sky-100 rounded-sm">
                            {{ $weather }}
                        </div>

                        <div class="m-4 p-4 bg-sky-100 rounded-sm">
                            {{ $tempInCelcius }}
                        </div>

                        <div class="m-4 p-4 bg-sky-100 rounded-sm">
                        <i class="fas fa-wind mr-2"></i>{{ $wind }}
                        </div>
                    </div> 
                </div>
            @else
                @isset($error)
                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                @endisset
            @endisset
        </div>
    </div>
    </div>
    <!-- jQuery is not needed for Tailwind CSS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</body>

</html>