require("./bootstrap");

import Tweets from "./components/Tweets.vue";
import Tweet from "./components/Tweet.vue";
import Follow from "./components/Follow.vue";
import EditProfile from "./components/EditProfile.vue";
import ProfileGallery from "./components/ProfileGallery.vue";
import PublishPanel from "./components/PublishPanel.vue";
import Tabs from "./components/Tabs.vue";
import Tab from "./components/Tab.vue";

new Vue({
    el: "#root",
    components: {
        tweets: Tweets,
        tweet: Tweet,
        follow: Follow,
        "edit-profile": EditProfile,
        "profile-gallery": ProfileGallery,
        "publish-panel": PublishPanel,
        Tabs,
        Tab
    }
});
