<x-app>
    <div>
        @foreach($users as $user)
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <a href="{{$user->path()}}" class="text-decoration-none d-flex">
                        <div>
                            <img 
                                src="{{$user->avatar}}" 
                                class="rounded-circle mr-2 img-fluid"
                                alt=""
                                width="40"
                                height="40"
                            >
                        </div>
                        <div>
                            <h4>{{ $user->name }}</h4>
                            <small class="text-muted"><b>{{$user->followers()->count()}}</b> Followers</small>
                        </div>
                    </a>
                </div>
                <div>
                    <x-follow-btn :user="$user"></x-follow-btn>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
</x-app>