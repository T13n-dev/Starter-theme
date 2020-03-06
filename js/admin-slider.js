(function($) { 
    'use strict';

    const slidesOpt         = document.querySelector('.thumbs-wrapper'); 
    const slides            = Array.from( slidesOpt.children );
    const formOpt           = document.getElementsByClassName('slides-options');
    const cptParent         = document.getElementsByClassName('thumbs-wrapper')[0];
    const dataIdParent      = cptParent.getAttribute('data-id-parent');
    // data
    const titleSlide        = document.getElementById('title-slide');
    const descSlide         = document.getElementById('description-slide');
    const imgSlide          = document.getElementsByClassName('thumb')[0];
    const img               = imgSlide.children[0];
    // button
    const addSlide          = document.getElementById('add-slide');
    const updateSlide       = document.getElementById('update-slide');
    const cancleSlide       = document.getElementById('cancel-slide');
    // formOpt[0].slideUp(); 

    class MU {
        init() {
            var attachment = '';
            var mediaUploader;

            $('.thumb').on('click', function(e) {
                e.preventDefault();
                if( mediaUploader ) {
                    mediaUploader.open();
                    return;
                }

                mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: 'Set a Slide Image',
                    button: {
                        text: 'Choose Picture'
                    },
                    multiple: false
                })

                mediaUploader.on( 'select', function() {
                    attachment = mediaUploader.state().get( 'selection' ).first().toJSON();
                    $('.thumb img').attr( 'src', attachment.url );
                    $('.thumb').attr('data-image', attachment.url );
                });
                mediaUploader.open();
            });
        }
    }

    class Slide {
        selectSlide() {
            slidesOpt.addEventListener('click', e => {
                e.preventDefault();
                
                var sliderTarget = e.target.closest('li'); // strick

                if ( !sliderTarget ) return;

                if ( formOpt[0].classList.contains('slides-options-show') == false ) {
                    formOpt[0].classList.add('slides-options-show');
                }

                // Remove selected to set it againt :D
                UI.removeSelected(slides);

                sliderTarget.classList.add('selected');
        
                if ( sliderTarget.classList.contains('add-new-btn') ) {
                    titleSlide.value            = '';
                    descSlide.value             = '';
                    // imgSlide.dataset.image   = '';
                    img.setAttribute( 'src', '' );
        
                    UI.btnStatus( true );
                } else {
                    // console.log( sliderTarget.getAttribute('data-id') );
                    var dataId = sliderTarget.getAttribute('data-id');

                    UI.btnStatus( false );
                    $.ajax({
                        type: 'POST',
                        url: ajax_object.ajax_url,
                        data: {
                            'action'        : 'get_slide_cpt',
                            'idParent'      : dataIdParent,
                            'id'            : dataId
                        },
                        success: function (response) {
                            if ( !response ) return;

                            var objSlide = JSON.parse(response);

                            titleSlide.value        = objSlide.post_title;
                            descSlide.value         = objSlide.post_content;
                            // Lấy post excerpt chứa đường dẫn img :D
                            imgSlide.dataset.image  = objSlide.post_excerpt;
                            img.setAttribute( 'src', objSlide.post_excerpt );
                            updateSlide.dataset.id  = dataId;
                        }
                    });
                }
            });
        };

        updateSlide() {
            updateSlide.addEventListener('click', e => { 
                e.preventDefault();
        
                var imgUrl      = imgSlide.dataset.image;
                var title       = titleSlide.value;
                var description = descSlide.value;
                var id          = updateSlide.dataset.id;
        
                $.ajax({
                    type: 'POST',
                    url: ajax_object.ajax_url,
                    data: {
                        'action'        : 'update_slide_cpt',
                        'img'           : imgUrl,
                        'id'            : id,
                        'title'         : title,
                        'description'   : description
                    },
                    success: function (response) {
                        if ( response !== 'updated' ) return;
                        location.reload();
                    }
                });
            });
        };

        deleteSlide() {
            slidesOpt.addEventListener('click', e => {
                var sliderTarget = e.target.closest('li');
                var deleteTarget = e.target.classList.contains('delete-btn'); 
        
                if ( deleteTarget ) {
        
                    var dataId = sliderTarget.getAttribute('data-id');

                    $.ajax({
                        type: 'POST',
                        url: ajax_object.ajax_url,
                        data: {
                            'action'        : 'delete_slide_cpt',
                            'id'            : dataId,
                        },
                        success: function ( id ) {
                            titleSlide.value            = '';
                            descSlide.value             = '';
                            img.setAttribute( 'src', '' );
                            UI.btnStatus( true );
        
                            $('.slide-'+id+'').remove();
                        }
                    });
                }
            });
        }

        addSlide() {
            addSlide.addEventListener('click',  e => {
                e.preventDefault();
        
                var imgUrl       = imgSlide.dataset.image;
                var title        = titleSlide.value;
                var description  = descSlide.value;
        
                $.ajax({
                    type: 'POST',
                    url: ajax_object.ajax_url,
                    data: {
                        'action'        : 'add_slide_cpt',
                        'img'           : imgUrl,
                        'id'            : dataIdParent,
                        'title'         : title,
                        'description'   : description
                    },
                    success: function (response) {
                        if ( response !== 'added' ) return;
                        location.reload();
                    }
                });
            });
        };

        cancleSlide() {
            cancleSlide.addEventListener('click', e => {
                e.preventDefault();

                titleSlide.value            = '';
                descSlide.value             = '';
                img.setAttribute( 'src', '' );
                
            });
        }
    }

    class UI {
        static removeSelected(slides) {
            slides.forEach( slide => {
                if ( slide.classList.contains('selected') ) {
                    slide.classList.remove('selected');
                }
            });
        }

        static btnStatus(boolean) {
            if ( boolean ) {
                addSlide.style.display = 'block';
                updateSlide.style.display = 'none';
            } else {
                addSlide.style.display = 'none';
                updateSlide.style.display = 'block';
            }
        }

        setupAPP() {
            UI.removeSelected(slides);
            UI.btnStatus(true);
        }
    }

    document.addEventListener("DOMContentLoaded", () => {
        const ui = new UI();
        const slide = new Slide();
        const mu = new MU();

        // mediaUploader
        mu.init();
        
        // setup APP
        ui.setupAPP();

        // Handler slider
        slide.selectSlide();
        slide.addSlide();
        slide.deleteSlide();
        slide.updateSlide();
        slide.cancleSlide();
    });

})(jQuery);