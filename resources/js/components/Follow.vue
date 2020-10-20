<script>
export default {
    props: ["url", "isFollow"],
    data() {
        return {
            followText: "",
            isLoading: false
        };
    },
    methods: {
        submit() {
            this.isLoading = true;
            axios.post(this.url).then(response => {
                this.isLoading = false;
                this.toggleFollow(response.data);
            });
        },
        toggleFollow(data) {
            this.followText = data ? "Follow me" : "Unfollow me";
        }
    },
    created() {
        this.followText = this.isFollow ? "Unfollow me" : "Follow me";
    }
};
</script>
