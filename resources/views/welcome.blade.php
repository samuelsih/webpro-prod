<x-main title="Ada Utang">
    <div class="flex flex-col justify-center align-center min-h-screen">
        <main class="mt-16 mx-auto max-w-7xl px-4 sm:mt-24">
            <div class="text-center">
                <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                    <span class="block xl:inline">AdaUtang</span>
                    <span id="auto-type" class=" block text-indigo-600 xl:inline"></span>
                </h1>
                <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                    Debt is a scary thing, starts from friends who are fiercer than debtors, to money that doesn't come back. But not anymore. With AdaUtang, start managing all of those in one website.
                </p>

                <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                    <div class="btn-group">
                        @if(Route::has('login'))
                            @auth
                                <a href="{{ route('user.index') }}" class="btn lg:btn-lg md:btn-md bg-gray-900 text-white">Explore</a>
                            @else
                                <a href="{{ route('login') }}" class="btn bg-indigo-600 lg:btn-lg md:btn-md btn-active">Login</a>
                                @if(Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn lg:btn-lg md:btn-md bg-gray-900 text-white">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>

            </div>
       </main>
    </div>

    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <script>
        var app = document.getElementById('auto-type');

        var typewriter = new Typewriter(app, {
            loop: true,
            delay: 150,
        });

        typewriter
        .typeString('Remember Debts Easily')
        .pauseFor(400)
        .start();
    </script>
</x-main>
