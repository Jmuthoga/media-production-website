<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/icofont/1.0.1/css/icofont.min.css" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --blue: #0d6efd;
            --navy: #041a3a;
            --grad: linear-gradient(135deg, #0d6efd 0%, #041a3a 100%);
        }

        .brand-gradient {
            background: var(--grad);
            color: #fff;
        }

        .btn-primary {
            background: var(--blue);
            border-color: var(--blue);
        }

        .navbar-brand {
            font-weight: 700;
        }

        /* =====================================
           BLUE SCROLLBAR (GLOBAL)
        ===================================== */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background-color: var(--blue);
            border-radius: 6px;
            border: 2px solid #f1f1f1;
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: #0b5ed7;
        }

        /* For Firefox */
        html {
            scrollbar-width: thin;
            scrollbar-color: var(--blue) #f1f1f1;
        }

        /* Scroll reveal animation (shared) */
        .reveal {
            opacity: 0;
            transform: translateY(60px);
            transition: all 0.8s ease-out;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    @yield('head')
</head>

<body>
    {{-- Include Navbar --}}
    @include('layouts.header')

    {{-- Include Body Layout --}}
    @include('layouts.body')

    {{-- Include Footer --}}
    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>
