<div class="py-4 rounded-lg friends">
    @forelse(auth()->user()->follows as $user)
        <a href="{{$user->path()}}" class="friends__link d-flex align-items-centertext-dark text-decoration-none px-4 py-2">
            <img 
                width="40" 
                height="40"
                src="{{ $user->avatar }}" 
                alt=""
                class="rounded-circle mr-2"
            >
            <div>
                <h6 class="mb-0">{{ $user->name }}</h4>
                <small class="text-secondary">@ {{$user->username }}</small>
            </div>
        </a>
    @empty
        <div class="px-4">No Following yet !</div>
    @endforelse

</div>