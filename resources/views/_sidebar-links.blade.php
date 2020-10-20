<div>
    @include('_responsive-nav')
    <div class="sidebar-links-wrapper">
        <ul class="sidebar-links text-dark">
            <li>
                <a 
                    href="/tweets" 
                    class=" {{ Request::is('home') ? 'active' : '' }} sidebar-link d-inline-block py-2 px-3 text-dark"
                >
                    <span class="mr-1"><i class="fas fa-home"></i></span>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a 
     k               href="/explore" 
                    class=" {{ Request::is('explore') ? 'active' : '' }} sidebar-link d-inline-block py-2 px-3 text-dark"
                >
                    <span class="mr-1"><i class="fas fa-hashtag"></i></span>
                    <span>Explore</span>
                </a>
            </li>
            <li>
                <a href="/tweets" class="sidebar-link d-inline-block py-2 px-3 text-dark">
                    <span class="mr-1"><i class="far fa-bell"></i></span>
                    <span>Notification</span>
                </a>
            </li>
            <li>
                <a href="/tweets" class="sidebar-link d-inline-block py-2 px-3 text-dark">
                    <span class="mr-1"><i class="far fa-envelope"></i></span>
                    <span>Messages</span>
                </a>
            </li>
            <li>
                <a href="/tweets" class="sidebar-link d-inline-block py-2 px-3 text-dark">
                    <span class="mr-1"><i class="far fa-bookmark"></i></span>
                    <span>Bookmarks</span>
                </a>
            </li>
            <li>
                <a href="/tweets" class="sidebar-link d-inline-block py-2 px-3 text-dark">
                    <span class="mr-1"><i class="far fa-list-alt"></i></span>
                    <span>Lists</span>
                </a>
            </li>
            <li>
                <a 
                    href="{{auth()->user()->path()}}" 
                    class="{{ Request::is( auth()->user()->username) ? 'active' : '' }} sidebar-link d-inline-block py-2 px-3 text-dark"
                >
                    <span class="mr-1"><i class="far fa-user"></i></span>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="/tweets" class="sidebar-link d-inline-block py-2 px-3 text-dark">
                    <span class="mr-1"><i class="far fa-comment-dots"></i></span>
                    <span>More</span>
                </a>
            </li>
        </ul>
    </div>
</div>