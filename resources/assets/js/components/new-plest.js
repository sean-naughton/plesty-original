//noinspection JSAnnotator
Vue.component('new-plest', {
    props: ['user'],

    template: '<h1>Hooplah</h1>',

    ready() {

    },

    data() {
        return {
            image: ''
        }
    },
    
    methods: {
        onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
        },
        createImage(file) {
            var image = new Image();
            var reader = new FileReader();
            var vm = this;

            reader.onload = (e) => {
                vm.image = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        removeImage: function (e) {
            this.image = '';
        }
    },
    
    computed: {
        /**
         * Calculate the style attribute for the photo preview.
         */
        previewStyle() {
            return `background-image: url(${this.user.photo_url})`;
        }
    }
});