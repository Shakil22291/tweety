@if( ! auth()->user()->is($user))
    <follow 
        url="/{{$user->id}}/follow" 
        is-follow="{{ auth()->user()->following($user)}}" 
        inline-template
    >
        <form action="" @submit.prevent="submit">
            <button class="btn btn-outline-primary rounded-pill" type="submit">
                <span v-if="isLoading">
                    <span
                        class="spinner-border spinner-border-sm"
                        role="status"
                        aria-hidden="true"
                    ></span>
                    <span>Loading...</span>
                </span>
                <span v-else>@{{ followText }} </span>
            </button>
        </form>    
    </follow>
@endif
