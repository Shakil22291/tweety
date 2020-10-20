<x-master>
    <div id="root">
        <section class="px-5 py-4">
            <header class="container mb-3">
                <div class="d-flex align-items-center justify-content-between">
                    <h2>
                        <img src="/images/logo.svg" alt="Tweety">
                    </h2>
                    <span class="burger">
                        <i class="fas fa-bars"></i>
                    </span>
                </div>
                
            </header>
        </section>
        <section>
            <div class="container-lg">
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        @include('_sidebar-links')
                    </div>
                    <div class="col-md-6" style="max-width: 700px;">
                        {{ $slot }} 
                    </div>
                    <div class="col-md-3">
                        <div class="bg-blue-100 rounded d-none d-md-block">
                            <h3 class="font-weight-bold mb-1 px-4 mb-3">Following</h3>
                            @include('_friends-list')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-master>