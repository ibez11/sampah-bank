var Dropzone = require('dropzone');

var csrf =  $('meta[name="csrf-token"]').attr('content');

var myDropzone = new Dropzone('div#fileupload', { 
    url: '/gallery/post' ,
    uploadMultiple: false,
    maxFiles: 1,
    init: function() {
        this.on("addedfile", function() {
          if (this.files[1]!=null){
            this.removeFile(this.files[0]);
          }
        });
      },
    headers: {
        'X-CSRF-TOKEN': csrf
    }
});

var dropzone = (function(){
    var init = function(){
        $('.dropzone span').html("Drop image file here to upload");
    }

    return {
        Init: init
    }
});

$(window).on('load', function(){
    dropzone().Init();
})

