// Uploading files

jQuery(function ($) {

   var file_frame;
   var buttonID;
   jQuery('.upload_bg').live('click', function( event ){

    event.preventDefault();

    var id = $(this).data('id');

    // Create the media frame.
    file_frame = wp.media.frames.file_frame = wp.media({
      title: jQuery( this ).data( 'uploader_title' ),
      button: {
        text: jQuery( this ).data( 'uploader_button_text' ),
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });

    // When an image is selected, run a callback.
    file_frame.on( 'select', function() {
      
      // We set multiple to false so only get one image from the uploader
      attachment = file_frame.state().get('selection').first().toJSON();
      jQuery( '.upload_image_button'+id).val( attachment.url );

    //  jQuery( '.slider_preview_image' ).attr( 'src', attachment.url );
      
     
    });

    // Finally, open the modal
    file_frame.open();
  });

   jQuery('.upload_image_modal').live('click', function( event ){

    event.preventDefault();

    // Create the media frame.
    file_frame = wp.media.frames.file_frame = wp.media({
      title: jQuery( this ).data( 'uploader_title' ),
      button: {
        text: jQuery( this ).data( 'uploader_button_text' ),
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });

    // When an image is selected, run a callback.
    file_frame.on( 'select', function() {
      
      // We set multiple to false so only get one image from the uploader
      attachment = file_frame.state().get('selection').first().toJSON();

      jQuery( '.image_attach_url' ).val( attachment.url );

      jQuery( '.image_modal_preview').attr( 'src', attachment.url );

    });

    // Finally, open the modal
    file_frame.open();
  });


});




 