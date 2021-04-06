//noinspection JSAnnotator
Vue.component('plest-gallery', {
    props: ['user', 'plests'],

    created() {
        this.plests = JSON.parse(this.plests);
    }
});
