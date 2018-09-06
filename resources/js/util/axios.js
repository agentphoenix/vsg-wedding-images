import axios from 'axios';

const instance = axios.create();
const token = document.head.querySelector('meta[name="csrf-token"]');

instance.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

if (token) {
    instance.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

instance.interceptors.response.use(
    (response) => {
        return response;
    },

    (error) => {
        const { status } = error.response;

        if (status >= 500) {
            App.$emit('error', error.response.data.message);
        }

        return Promise.reject(error);
    }
);

export default instance;
