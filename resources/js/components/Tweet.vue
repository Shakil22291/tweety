<template>
    <div class="tweet">
        <div class="d-flex text-decoration-none p-4 ">
            <img
                width="40"
                height="40"
                :src="tweet.user.avatar"
                alt=""
                class="rounded-circle mr-2"
            />
            <div>
                <div class="d-flex">
                    <a href="" class="text-decoration-none">
                        <h5 class="font-weight-bold mr-2 text-dark">
                            {{ tweet.user.name }}
                        </h5>
                    </a>
                    <div class="text-muted text-secondary">
                        <span>published on {{ tweet.created_at | ago }}</span>
                    </div>
                </div>
                <a href="#" class="text-decoration-none">
                    <p class="m-0 mb-1 text-dark">{{ tweet.body }}</p>
                </a>
            </div>
        </div>
        <img
            :src="tweet.thumbnail"
            v-if="tweet.thumbnail"
            alt=""
            class="rounded img-fluid tweet__img px-2"
        />
        <div class="d-flex">
            <span class="mr-2"><i class="fas fa-thumbs-up"></i></span>
            <span><i class="fas fa-thumbs-down"></i></span>
        </div>
        <hr class="my-0" />
    </div>
</template>

<script>
import moment from "moment";

export default {
    props: ["tweet"],
    filters: {
        ago(date) {
            return moment(date).fromNow();
        }
    }
};
</script>
