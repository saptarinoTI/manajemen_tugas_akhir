<!DOCTYPE html>
<html lang="en">

<head>
    <x-app._header />
</head>

<body>
    <div id="app">
        {{-- Sidebar --}}
        {{-- <x-app._sidebar /> --}}
        <x-sidebar />
        <div id="main">
            {{-- Navbar --}}
            <x-app._navbar />

            <div class="main-content container-fluid">
                <div class="page-title mb-3">
                    <h3>{{ $name }}</h3>
                    {{-- <p class="text-subtitle text-muted">{{ $description }}</p> --}}
                </div>

                <section class="section">
                    {{ $slot }}
                </section>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')

    <x-app._footer />
    @stack('script')

</body>

</html>
