import App from './vsg';

import './components';

;(function () {
    this.CreateApp = function () {
        return new App;
    };
}.call(window));
