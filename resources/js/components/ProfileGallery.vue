<script>
export default {
    props: ["user"],
    data() {
        return {
            avatar: this.user.avatar,
            banner: this.user.banner
        };
    },
    methods: {
        uploadAvatar(files) {
            let formData = new FormData();
            formData.append("avatar", files[0]);

            //now uploa the server
            axios
                .post("/" + this.user.id + "/avatar", formData, {
                    headers: {
                        "Content-Type": "multipart/form-data"
                    }
                })
                .then(response => {
                    this.avatar = "/storage/" + response.data;
                });
        }
    }
};
</script>
