
var EnvatoWizard = (function($){

    var t;

    // callbacks from form button clicks.
    var callbacks = {
        install_plugins: function(btn){
            var plugins = new PluginManager();
            plugins.init(btn);
        },
        install_content: function(btn){
            window.location.href = $(btn).attr('href') + '&version=' + $('#et-version').val();
        },
        after_plugins: function(btn){
            window.location.href = $(btn).attr('href');
        },
    };

    function window_loaded(){
        // init button clicks:
        et_progress();
        version_search();
        $('.button-next').on( 'click', function(e) {
            var loading_button = dtbaker_loading_button(this);
            if(!loading_button){
                return false;
            }
            if($(this).data('callback') && typeof callbacks[$(this).data('callback')] != 'undefined'){
                // we have to process a callback before continue with form submission
                $(this).removeClass('loading');
                callbacks[$(this).data('callback')](this);
                return false;
            }else{
                loading_content();
                return true;
            }
        });
        $('.button-upload').on( 'click', function(e) {
            e.preventDefault();
            renderMediaUploader();
        });
        $('.theme-presets a').on( 'click', function(e) {
            e.preventDefault();
            var $ul = $(this).parents('ul').first();
            $ul.find('.current').removeClass('current');
            var $li = $(this).parents('li').first();
            $li.addClass('current');
            var newcolor = $(this).data('style');
            $('#new_style').val(newcolor);
            return false;
        });
        $('.et-button:not(.no-loader)').on('click', function() {
            $(this).addClass('loading');
        });

        $('.version-preview').on('click', function() {
            $('.version-preview').removeClass('active-version');
            $(this).addClass('active-version');
            $('#et-version').val($(this).data('version'));
        });

    }

    function loading_content(){
        // $('.envato-setup-content').block({
        //     message: null,
        //     overlayCSS: {
        //         background: '#fff',
        //         opacity: 0.6
        //     }
        // });
    }

    function PluginManager(){

        var complete;
        var items_completed = 0;
        var current_item = '';
        var $current_node;
        var current_item_hash = '';

        function ajax_callback(response){
            if(typeof response == 'object' && typeof response.message != 'undefined'){
                $current_node.find('span').text(response.message);
                if(typeof response.url != 'undefined'){
                    // we have an ajax url action to perform.

                    if(response.hash == current_item_hash){
                        $current_node.find('span').text("failed");
                        find_next();
                    }else {
                        current_item_hash = response.hash;
                        jQuery.post(response.url, response, function(response2) {
                            process_current();
                            $current_node.find('span').text(response.message + envato_setup_params.verify_text);
                        }).fail(ajax_callback);
                    }

                }else if(typeof response.done != 'undefined'){
                    // finished processing this plugin, move onto next
                    $current_node.find('span').addClass('green-success');
                    find_next();
                }else{
                    // error processing this plugin
                    find_next();
                }
            }else{
                // error - try again with next plugin
                $current_node.find('span').addClass('green-success').text("Success");
                find_next();
            }
        }
        function process_current(){
            if(current_item){
                // query our ajax handler to get the ajax to send to TGM
                // if we don't get a reply we can assume everything worked and continue onto the next one.
                jQuery.post(envato_setup_params.ajaxurl, {
                    action: 'envato_setup_plugins',
                    wpnonce: envato_setup_params.wpnonce,
                    slug: current_item
                }, ajax_callback).fail(ajax_callback);
            }
        }
        function find_next(){
            var do_next = false;
            if($current_node){
                if(!$current_node.data('done_item')){
                    items_completed++;
                    $current_node.data('done_item',1);
                }
                $current_node.find('.spinner').css('visibility','hidden');
            }
            var $li = $('.envato-wizard-plugins li.plugin-to-install').has('input:checked').addClass('installing');
            $('.envato-wizard-plugins li').find('input').prop('disabled', true);
            $li.each(function(){
                if(current_item == '' || do_next){
                    current_item = $(this).data('slug');
                    $current_node = $(this);
                    process_current();
                    do_next = false;
                }else if($(this).data('slug') == current_item){
                    do_next = true;
                }
            });
            if(items_completed >= $li.length){
                // finished all plugins!
                complete();
                if ( $('.button-next').attr('data-continue') ) {
                    $('.button-next').html($('.button-next').attr('data-continue') + '<span class="dashicons dashicons-arrow-right-alt2"><span class="et-loader"><svg class="loader-circular" viewBox="25 25 50 50"><circle class="loader-path" cx="50" cy="50" r="12" fill="none" stroke-width="2" stroke-miterlimit="10"></circle></svg></span>');
                }
                $li.removeClass('installing');
            }

        }

         function import_demo_content( btn ) {
            var version = $('.plugins-form').data('version'),
                importSection = $('.envato-setup-content'),
                envato_action = $('.envato-setup-actions'),
                et_button = $('.et-button');
            if( version == '' ) {
                $(btn).data('callback', 'after_plugins').data('done-loading', 'no').removeClass('dtbaker_loading_button_current');
                return;
            }

            importSection.addClass('import-process');

            if( version == 'default' ) {
                importDefault(function(data) {
                    importSection.find('.loading-info').after('<p class="import-results et-message et-success">' + data + '</p>');
                    $(btn).data('callback', 'after_plugins').data('done-loading', 'no').removeClass('dtbaker_loading_button_current');
                    importSection.removeClass('import-process');
                    $(envato_action).find($(et_button)).removeClass('loading');
                });
            } else {
                importDefault(function(data) {
                    var data = {
                        action:'etheme_import_ajax',
                        version: version
                    };

                    $.ajax({
                        method: "POST",
                        url: envato_setup_params.ajaxurl,
                        data: data,
                        success: function(data){
                            importSection.find('.loading-info').after('<p class="import-results et-message et-success">' + data + '</p>');
                            $(btn).data('callback', 'after_plugins').data('done-loading', 'no').removeClass('dtbaker_loading_button_current');
                        },
                        complete: function(){   
                            importSection.removeClass('import-process');
                            $(envato_action).find($(et_button)).removeClass('loading');
                        }
                    });
                });
            }
        }

        function importDefault( callback ) {
            $.ajax({
                method: "POST",
                url: envato_setup_params.ajaxurl,
                data: {
                    action:'etheme_import_ajax',
                    version: 'default'
                },
                success: function(data){
                    callback(data);
                },
                complete: function(){

                }
            });
        }

        return {
            init: function(btn){
                // $('.envato-wizard-plugins').addClass('installing');
                complete = function(){
                    import_demo_content(btn);
                    //loading_content();
                    //window.location.href=btn.href;
                };
                find_next();
            }
        }
    }

    /**
     * Callback function for the 'click' event of the 'Set Footer Image'
     * anchor in its meta box.
     *
     * Displays the media uploader for selecting an image.
     *
     * @since 0.1.0
     */
    function renderMediaUploader() {
        'use strict';

        var file_frame, attachment;

        if ( undefined !== file_frame ) {
            file_frame.open();
            return;
        }

        file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Upload Logo',//jQuery( this ).data( 'uploader_title' ),
            button: {
                text: 'Select Logo' //jQuery( this ).data( 'uploader_button_text' )
            },
            multiple: false  // Set to true to allow multiple files to be selected
        });

        // When an image is selected, run a callback.
        file_frame.on( 'select', function() {
            // We set multiple to false so only get one image from the uploader
            attachment = file_frame.state().get('selection').first().toJSON();

            jQuery('.site-logo').attr('src',attachment.url);
            jQuery('#new_logo_id').val(attachment.id);
            // Do something with attachment.id and/or attachment.url here
        });
        // Now display the actual file_frame
        file_frame.open();

    }

    function dtbaker_loading_button(btn){

        var $button = jQuery(btn);
        if($button.data('done-loading') == 'yes')return false;
        var existing_text = $button.text();
        var existing_width = $button.outerWidth();
        var loading_text = '⡀⡀⡀⡀⡀⡀⡀⡀⡀⡀⠄⠂⠁⠁⠂⠄';
        var completed = false;

        //$button.css('width',existing_width);
        $button.addClass('dtbaker_loading_button_current');
        var _modifier = $button.is('input') || $button.is('button') ? 'val' : 'text';
        //$button[_modifier](loading_text);
        //$button.attr('disabled',true);
        $button.data('done-loading','yes');

        var anim_index = [0,1,2];

        // animate the text indent
        function moo() {
            if (completed)return;
            var current_text = '';
            // increase each index up to the loading length
            for(var i = 0; i < anim_index.length; i++){
                anim_index[i] = anim_index[i]+1;
                if(anim_index[i] >= loading_text.length)anim_index[i] = 0;
                current_text += loading_text.charAt(anim_index[i]);
            }
            $button[_modifier](current_text);
            setTimeout(function(){ moo();},60);
        }

        //moo();

        return {
            done: function(){
                completed = true;
                $button[_modifier](existing_text);
                $button.removeClass('dtbaker_loading_button_current');
                $button.attr('disabled',false);
            }
        }

    }

    /****************************************************/
    /* Search for versions */
    /****************************************************/
    function version_search(){
        $( '.etheme-versions-search' ).on( 'keyup', function(e){
            var value = $(this).val();

            $( '.etheme-search .spinner' ).addClass( 'is-active' );
            $( '.etheme-search .et-zoom' ).addClass( 'et-invisible' );

            if ( value.length >= 2 ) {
                $( '.version-preview' ).removeClass( 'et-show' ).addClass( 'et-hide' );
                $.each( $( '.version-preview' ), function(){
                    var text = $(this).text();
                    if ( text.toLowerCase().includes(value.toLowerCase()) ) {
                        $(this).removeClass( 'et-hide' ).addClass( 'et-show' );
                    }
                } );
            } else {
                $( '.version-preview' ).removeClass( 'et-hide' ).removeClass( 'et-show' );
            }

            setTimeout(function() {
                $( '.etheme-search .spinner' ).removeClass( 'is-active' );
                $( '.etheme-search .et-zoom' ).removeClass( 'et-invisible' );
            }, 500);

        });
    }

    return {
        init: function(){
            t = this;
            $(window_loaded);
        },
        callback: function(func){
            console.log(func);
            console.log(this);
        }
    }

    function et_progress() {
      var progress = $( 'li.active .progress' );
      var width = progress.width();
      var id = setInterval( frame, 5 );
        function frame() {
            if ( width >= 100 ) {
                clearInterval( id );
            } else if( width == 50 ) {
                width++;
                progress.width( width + '%' );
            } else {
                width++;
                progress.width( width + '%' );
            }
        }
    }

})(jQuery);


EnvatoWizard.init();