@props(['title' => 'mypage'])

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="google-site-verification" content="DnwKJVa30q9to0ipyaN3x6yu1QHUbSZ3fRv4F5UpzCU" />
  <title>{{ $title }}</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/fontawesome.min.css"  />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/solid.min.css"  />


  <!-- Fonts: Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
          }
        }
      }
    }
  </script>


  <meta name="csrf-token" content="{{ csrf_token() }}">


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 flex font-sans antialiased">





  <!-- Sidebar -->
  <x-nav></x-nav>

  <!-- Main content area -->
  <main class="flex-1 p-6 overflow-y-auto">
    {{ $slot }}
  </main>

</body>
</html>
