<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
          <meta name="author" content="Creative Tim">
          <meta name="csrf-token" content="{{ csrf_token() }}">

          <title>{{ config('app.name', 'Scout') }}</title>

          <!-- Fonts -->
          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

          <!-- Styles -->
          <link rel="stylesheet" href="{{ mix('css/app.css') }}">
          <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" type="text/css">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />


          <!-- Favicon -->
          <link rel="icon" href="{{ asset('assets/img/brand/favicon.png') }}" type="image/png">
          <!-- Fonts -->
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
          <!-- Icons -->
          <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
          <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
                    type="text/css">
          <!-- Page plugins -->
          <!-- Argon CSS -->
          <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0') }}" type="text/css">

          @livewireStyles

          <!-- Scripts -->
          <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body class="font-sans antialiased">
          <x-jet-banner />

          <div class="min-h-screen bg-gray-100">
                    @livewire('navigation-menu')

                    <!-- Page Heading -->
                    @if (isset($header))
                    <header class="bg-white shadow">
                              <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                        {{ $header }}
                              </div>
                    </header>
                    @endif

                    <!-- Page Content -->
                    <main>
                              {{ $slot }}
                    </main>


          </div>

          @stack('modals')

          @livewireScripts

          <!-- Argon Scripts -->
          <!-- Core -->
          <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
          <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
          <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
          <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
          <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>

          <!-- Optional JS -->
          <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
          <script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>

          <!-- Argon JS -->
          <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
          <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>




</body>



</html>