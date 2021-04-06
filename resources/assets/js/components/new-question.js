//noinspection JSAnnotator
Vue.component('new-question', {
    props: ['plest'],

    ready() {
    },

    data: function () {
        return {
            image1: '',
            image2: '',
            image3: '',
            image4: '',
            image5: '',
        }
    },

    methods: {
        onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0], e);
        },
        createImage(file, e) {
            var image = new Image();
            var reader = new FileReader();
            var vm = this;

            var e = e;

            reader.onload = (file) => {
                var imageId = e.target.getAttribute('plest-question-image-id');
                vm['image' + imageId] = file.target.result;
            };
            reader.readAsDataURL(file);
        },
        removeImage: function (e) {
            var imageId = e.target.getAttribute('plest-question-image-id');
            this['image' + imageId] = '';
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