<template :plest="plest">
    <div class="plest-card col-sm-6 col-md-3">
        <div class="thumbnail">
            <img v-if="plest.thumbnail"
                 :src="'/' + plest.thumbnail.full_size_path"
                 :alt="plest.name">
            <img v-else src="/img/no-thumbnail.jpg" :alt="plest.name">
            <div class="caption">
                <h3 :title="plest.name">{{ plest.name }}</h3>
                <p>{{ plest.description }}</p>
            </div>
            <div class="option-buttons">
                <a href="/storage/games/{{ plest.id }}/index.html"
                   class="btn btn-play"
                   role="button"
                   title="Play"
                >
                    <span class="glyphicon glyphicon-play"></span>
                </a>
                <a href="/plests/{{ plest.id }}/questions/create
                "
                   class="btn btn-create"
                   role="button"
                   title="Edit"
                >
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="#"
                   class="btn btn-favorite"
                   :class="{favorited: isFavorited(plest)}"
                   role="button"
                   title="Favorite"
                   @click="toggleFavorite(plest)"
                >
                    <span class="glyphicon glyphicon-star"></span>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['plest'],

    created() {

    },

    methods: {
        isFavorited(plest) {
            return plest.favorited;
        },

        favoritePlest(plest) {
            this.$http.post('/plests/' + plest.id + '/favorites')
                    .then(function (response) {
                        this.plest = response.data;
                    })
                    .catch(function (response) {

                    });
        },

        toggleFavorite(plest) {
            this.isFavorited(plest) ? this.unfavoritePlest(plest) : this.favoritePlest(plest);
        },

        unfavoritePlest(plest) {
            this.$http.delete('/plests/' + plest.id + '/favorites')
                    .then(function (response) {
                        this.plest = response.data;
                    })
                    .catch(function (response) {
                        console.log(response);
                    });
        }
    }
}
</script>

<style lang="less" scoped>
    @import '../../less/variables';

    .thumbnail {
        background-color: white;
        margin-top: 30px;

        img {
            height: 200px;
            width: 100%;
            background-size: 100% 100%;
        }

        .caption {
            height: 120px;

            h3 {
                overflow: hidden;
                -ms-text-overflow: ellipsis;
                text-overflow: ellipsis;
                white-space: nowrap;
                line-height: 1.4em;
                margin-top: 5px;
            }

            p {
                /* hide text if it more than N lines  */
                overflow: hidden;
                /* for set '...' in absolute position */
                position: relative;
                /* use this value to count block height */
                line-height: 1.2em;
                /* max-height = line-height (1.2) * lines max number (3) */
                max-height: 3.6em;
                /* fix problem when last visible word doesn't adjoin right side  */
                text-align: justify;
                /* place for '...' */
                margin-right: -0.8em;
                padding-right: 1em;
            }

            p::after {
                /* points in the end */
                content: '';
                /* absolute position */
                position: absolute;
                /* set position to right bottom corner of text */
                right: 0;
                /* set width and height */
                width: 1em;
                height: 1em;
                margin-top: 0.2em;
                /* bg color = bg color under block */
                background: white;
            }

            p::before {
                /* points in the end */
                content: '...';
                /* absolute position */
                position: absolute;
                /* set position to right bottom corner of block */
                right: 0;
                bottom: 0;
            }
        }

        .option-buttons {
            text-align: center;

            .btn {
                margin: 5px;

                .glyphicon::after {
                    margin-right: 0;
                }

                &.favorited {
                    color: yellow;
                    background: blue !important;
                }

                .btn-favorite {
                    background-color:blue !important;
                }
            }
        }

        &::selection {
            background: @color-secondary-1-0;
        }
    }
</style>