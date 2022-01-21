import $ from 'jquery';
import request from './forms/ajax';
const $window   = $(window);
const $document = $(document);

class dragon {
    request = request;
    constructor() {
        $document.ready(() => this.domReady());
        $window.on('load', () => this.windowLoad());
    }

    domReady() {
        $('form.ajax').submit((e) => {
            this.request({}, e)
        })
    }

    windowLoad() {

    }
}

export default dragon;
