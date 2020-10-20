<div class="sidebar-wrapper">
    <div class="sidebar p-2">
        <tabs>
            <tab name="Pages" :selected="true">
                <div class="pt-4">
                    <a 
                        href="/tweets" 
                        class="d-block text-center text-dark p-2 font-weight-bold"
                        >Home</a
                    >
                    <a 
                        href="/explore" 
                        class="d-block p-2 text-center text-dark  font-weight-bold"
                        >Explore</a
                    >
                    <a 
                        href="{{ auth()->user()->path() }}" 
                        class="d-block p-2 text-center text-dark font-weight-bold"
                        >Profile</a
                    >
                    <a 
                        href="/logout" 
                        class="d-block p-2 text-center text-dark font-weight-bold"
                        >Logout</a
                    >
                </div>
            </tab>
            <tab name="Following">
                <div class="pt-4">
                    @include('_friends-list')
                </div>
            </tab>
        </tabs>
    </div>
</div>