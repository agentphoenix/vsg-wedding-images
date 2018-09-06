import Vue from 'vue';
import axios from '@/util/axios';
import feather from 'feather-icons';

export default class App {
    constructor () {
        this.bus = new Vue();
    }

    run () {
        this.app = new Vue({
            el: '#app',

            mounted () {
                feather.replace();
            }
        });
    }

    static request (options) {
        if (options !== undefined) {
            return axios(options);
        }

        return axios;
    }

    $on (...args) {
        this.bus.$on(...args);
    }

    $once (...args) {
        this.bus.$once(...args);
    }

    $off (...args) {
        this.bus.$off(...args);
    }

    $emit (...args) {
        this.bus.$emit(...args);
    }
}
