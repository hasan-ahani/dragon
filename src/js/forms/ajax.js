import $ from 'jquery';

export default function (options, e) {
    let _this = this,
        t   = false;




    options = $.extend({
        beforeSend  : () => {},
        complete    : () => {},
        success     : () => {},
        error       : () => {},
        url         : dragon.ajaxUrl,
        type 		: 'GET',
        data 		: {},
    }, options);

    if (e !== undefined) {

        e.preventDefault();
         t       = $(e.target);

        options.type    = t.attr('method');
        options.data    = t.serialize();
        options.url     = t.attr('action');
    };


    $.ajax({
        type 		: options.type,
        url 		: options.url,
        data 		: options.data,
        beforeSend: function ( jqXHR, settings) {
            if( dragon.nonce !== undefined ){
                jqXHR.setRequestHeader( 'X-WP-Nonce', dragon.nonce );
            }
            if (e !== undefined){
                t.addClass('sending')
                $('button[type=submit]', t).attr('disabled', 'disabled')
            }
            options.beforeSend( jqXHR );
        },
        success 	: function ( result, textStatus, jqXHR ) {
            options.success( result, textStatus, jqXHR );
        },
        complete 	: function ( jqXHR, textStatus) {

            if (e !== undefined){
                t.removeClass('sending')
                $('button[type=submit]', t).removeAttr('disabled')
            }
            options.complete( jqXHR, textStatus );
        },
        error 		: function ( jqXHR, textStatus, errorThrown) {
            options.error( jqXHR, textStatus, errorThrown);
        }
    });
};
