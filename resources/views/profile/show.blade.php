<x-app>
    <header class="mb-3 profile-header">
        <profile-gallery :user="{{ $user }}" inline-template>
            <div class="position-relative mb-5 profile-header__banner">
                <img 
                    src="{{$user->banner}}" 
                    class="img-fluid profile-header__banner-img rounded-lg" 
                    alt=""
                >
                <div class="profile-header__profile-img position-absolute">
                    <div class="position-relative">
                        <img 
                            :src="avatar" 
                            class="img-fluid rounded-circle" 
                            alt=""
                            width="150"
                            height="150"
                        >
                        @can('update', $user)
                            <span class="position-absolute profile-header__profile-icon">
                                <i class="fas fa-camera position-absolute"></i>
                                <input type="file" @change="uploadAvatar($event.target.files)">
                            </span>
                        @endcan
                    </div>
                </div>
            </div>    
        </profile-gallery>
        <div class="d-flex justify-content-between mb-3">
            <div>
                <h3 class="mb-0 profile-header__username">{{$user->name}}</h3>
                <small class="text-muted mb-2">Joined {{$user->created_at->diffForHumans()}}</small>
                <div class="d-flex">
                    <span class="text-muted mr-3">
                        <b>{{$user->follows()->count()}}</b> Following 
                    </span>
                    <span class="text-muted">
                        <b>{{$user->followers()->count()}}</b> Followers
                    </span>
                </div>
            </div>
            <div class="d-flex flex-shrink-0">
                @can('update', $user)
                    <div>
                        <a 
                            href="/{{$user->username}}/edit" 
                            class="btn btn-primary mr-2 rounded-pill"
                        >
                            edit profile
                        </a>
                    </div>
                @endcan
                <x-follow-btn :user="$user"></x-follow-btn>
            </div>
        </div>

        <p class="text-center">
            {{ $user->description }}
        </p>
        <hr>
    </header>
    @include('_tweets')
</x-app>