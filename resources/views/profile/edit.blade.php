<x-app>
    <edit-profile :user="{{$user}}" inline-template>
        <form @submit.prevent="submit">
            <h4>Edit your profile</h4>
            <div class="form-group">
                <label for="name">Your name</label>
                <input 
                    type="text" 
                    class="form-control" 
                    :class="{'is-invalid': form.errors.has('name')}"
                    name="name"
                    v-model="form.name"
                    id="name"
                >
                <small class="form-text text-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></small>
            </div>

            <div class="form-group">
                <label for="username">Your username</label>
                <input 
                    type="text" 
                    class="form-control" 
                    :class="{'is-invalid': form.errors.has('username')}"
                    v-model="form.username"
                    name="username"
                    id="username"
                >
                <small class="form-text text-danger" v-if="form.errors.has('username')" v-text="form.errors.get('username')"></small>
            </div>

            <div class="form-group">
                <label for="email">Your email</label>
                <input 
                    type="email" 
                    class="form-control" 
                    :class="{'is-invalid': form.errors.has('email')}"
                    v-model="form.email"
                    name="email"
                    id="email"
                >
                <small class="form-text text-danger" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></small>
            </div>
            
            <div class="form-group">
                <label for="description">Your Profile description</label>
                <textarea 
                    class="form-control" 
                    :class="{'is-invalid': form.errors.has('description')}"
                    name="description"
                    v-model="form.description"
                    id="email"
                >
                    @{{form.description}}
                </textarea>
                <small class="form-text text-danger" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></small>
            </div>

            <button type="submit" class="btn btn-primary shadow-sm">Submit</button>
        </form>            
    </edit-profile>
</x-app>