<script>
import Form from "../core/Form";

export default {
    data() {
        return {
            isLoading: false,
            thumbnail: null
        };
    },
    methods: {
        getImage(e) {
            // First shoW the preview
            let file = e.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = e => {
                this.thumbnail = e.target.result;
            };

            // lets store the thumbnail
            this.thumbnail = file;
        },

        removeImage() {
            this.thumbnail = null;
        }
    }
};
</script>
