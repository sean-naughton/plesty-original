
/*
 |--------------------------------------------------------------------------
 | Laravel Spark Components
 |--------------------------------------------------------------------------
 |
 | Here we will load the Spark components which makes up the core client
 | application. This is also a convenient spot for you to load all of
 | your components that you write while building your applications.
 */

require('./../spark-components/bootstrap');

require('./plest-gallery');
require('./new-plest');
require('./new-question');

import PlestCard from './PlestCard.vue';

Vue.component('plesty-plest-card', PlestCard);