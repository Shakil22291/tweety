<div class="rounded-lg border tweets overflow-hidden">
    @forelse ($tweets as $tweet)
        <div class="tweet d-flex p-4">
            <img
                width="40"
                height="40"
                src="{{$tweet->user->avatar}}"
                alt=""
                class="rounded-circle mr-2"
            />
            <div class="flex-grow-1">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <div class="d-flex">
                        <a href="">
                            <h5 class="font-weight-bold mr-2 text-dark">{{$tweet->user->name}}</h5>
                        </a>
                        <div class="text-muted text-secondary">
                            {{-- <span class="mr-1">@shakilhossain</span> --}}
                            <span>published on {{ $tweet->created_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    @can('delete', $tweet)
                        <form action="/tweets/{{ $tweet->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill">Delete</button>
                        </form>
                    @endcan

                </div>
                <div>
                    <p class="m-0 mb-1 text-dark">{{$tweet->body}}</p>

                    @if($tweet->thumbnail)
                        <img
                            src="/storage/{{$tweet->thumbnail}}"
                            alt=""
                            class="rounded img-fluid tweet__img mb-2"
                        />
                    @endif

                    <div class="d-flex">
                        <form
                            method="POST"
                            action="/tweets/{{$tweet->id}}/like"
                            class="mr-2"
                        >
                            @csrf
                            <button
                                title="I like it"
                                type="submit"
                                class="border-0 {{ $tweet->isLikedBy(auth()->user()) ? 'text-primary' : 'text-secondary'}} bg-transparent"
                            >
                                <span>
                                    <i class="fas fa-thumbs-up"></i>
                                </span>
                                <span>{{$tweet->likes ?: 0}}</span>
                            </button>
                        </form>

                        <form method="POST" action="/tweets/{{$tweet->id}}/dislike">
                            @csrf
                            @method('DELETE')
                            <button
                                title="I Dislike it"
                                type="submit"
                                class="border-0 {{ $tweet->isDislikedBy(auth()->user()) ? 'text-primary' : 'text-secondary'}} bg-transparent"
                            >
                                <span>
                                    <i class="fas fa-thumbs-down"></i>
                                </span>
                                <span>{{$tweet->dislikes ?: 0}}</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr class="m-0">
    @empty
        <div class="p-3">
            No Tweets Yet !
        </div>
    @endforelse
</div>