<template>
    <div>
        <publish-panel @published="addTweet"></publish-panel>
        <div class="rounded-lg border tweets overflow-hidden">
            <div v-if="tweets.length == 0" class="p-3">No Tweets yet!</div>
            <tweet
                v-for="tweet in tweets"
                v-else
                :key="tweet.id"
                :tweet="tweet"
            ></tweet>
        </div>
    </div>
</template>

<script>
import PublishPanel from "./PublishPanel.vue";
import Tweet from "./Tweet";
export default {
    data() {
        return {
            tweets: []
        };
    },
    components: {
        tweet: Tweet,
        "publish-panel": PublishPanel
    },
    created() {
        axios.get("/tweets").then(response => {
            this.tweets = response.data;
        });
    },
    methods: {
        addTweet(tweet) {
            this.tweets.unshift(tweet);
        }
    }
};
</script>
