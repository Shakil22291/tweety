<script>
export default {
    props: ["user"],

    data() {
        return {
            form: new Form({
                name: this.user.name,
                username: this.user.username,
                email: this.user.email,
                description: this.user.description
            })
        };
    },
    methods: {
        submit() {
            this.form
                .patch("/" + this.user.id)
                .then(data => alert("all done"))
                .catch(error => console.log("error"));
        }
    }
};
</script>
