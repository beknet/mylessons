jQuery(document).ready(function($){

  var mediaUploader;

  $('.upload-button-image').click(function(e) {
    e.preventDefault();

    var mediaUploader = null;
    
    var formID = $(this).attr('data-id');
    //alert(formID);
    // If the uploader object has already been created, reopen the dialog
    if (mediaUploader) {
      mediaUploader.open();
      return;
    }
    // Extend the wp.media object
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'בחר תמונה',
      button: {
      text: 'בחרתי תמונה'
    }, multiple: true });

    // When a file is selected, grab the URL and set it as the text field's value
    mediaUploader.on('select', function() {
      attachment = mediaUploader.state().get('selection').first().toJSON();
      $('#image-url_'+formID).val(attachment.url);
      $('.image-url_'+formID).attr({'src': ''+attachment.url});
      $('.image-a_'+formID).attr({'href': ''+attachment.url});
    });
    // Open the uploader dialog
    mediaUploader.open();
  });

});
