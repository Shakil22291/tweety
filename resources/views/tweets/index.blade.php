<x-app>
    <div>
        <publish-panel inline-template>
            <form
                method="POST"
                class="bg-light border-primary border rounded-lg p-4 publish-panel mb-4"
                action="/tweets"
                enctype="multipart/form-data"
            >
                @csrf
                <div class="d-flex align-items-end mb-2">
                    <img
                        width="40"
                        height="40"
                        src="/images/default-avatar.jpeg"
                        alt=""
                        class="rounded-circle mr-2"
                    />
                    <div class="flex-grow-1">
                        <textarea
                            placeholder="Write your tweet here !"
                            name="body"
                            class="w-100 publish-panel__input border-bottom border-secondary"
                        ></textarea>
                        @error('body')
                            <div class="form-text text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div
                    v-if="thumbnail"
                    class="publish-panel__preview-image rounded position-relative"
                >
                    <button
                        class="close-preview-image position-absolute bg-dark text-light rounded-circle"
                        @click="removeImage"
                    >
                        <i class="fas fa-times"></i>
                    </button>
                    <img :src="thumbnail" alt="" class="img-fluid" />
                </div>
                <hr />
                <div class="d-flex justify-content-between">
                    <div class="publish-panel__options" title="upload tweet thumbnail">
                        <div class="publish-panel__image">
                            <i class="fas fa-image"></i>
                        </div>
                        <div class="publish-panel__file-input overflow-hidden">
                            <input
                                id="file"
                                type="file"
                                name="thumbnail"
                                @change="getImage"
                            />
                        </div>
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary"
                    > Submit </button>
                </div>
            </form>
        </publish-panel>
        @include('_tweets')
    </div>
</x-app>