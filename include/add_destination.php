<div class="package">
    <form id="frmDestination"enctype="multipart/form-data">
    <div class="add-destination">
        <input type="text"placeholder="Destination Title"required name="destinationname">
        <span><label>Images: </label><input type="file"required name="files[]" id="file" multiple></span><br>
    </div>
    <div class="about-destination">
    <div class="left">
    <label for="">About Destination</label><br>
        <textarea class="form-control" name="profile"id="abt-destination" rows="3"placeholder="Tour Activities"></textarea>
    </div>
    <div class="submit-panel">
        <input type="submit"class="mybtn"value="SAVE">
        <a href="home.php?link=<?php echo 'destination'?>"class="btncancel">CANCEL</a>
    </div>
    </div>
    </form>
</div>
<?php include('footer.php');?>
<script>

    /* end of texeditor */
    
    $(document).ready(function () {
// submit form
$("#frmDestination").on('submit',(function(e) {
e.preventDefault();
for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }

  $.ajax({
    url: "class/class.php?action=add_destination",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    // $("#preview").fadeOut();
    // $("#err").fadeOut();
   },
   success: function(data)
      {
        document.getElementById('black-panel').style.display='block';
        document.getElementById('response_panel').style.display='block';
        $('#response_panel').html(data);
        setTimeout(() => {
            document.getElementById('black-panel').style.display='none';
        document.getElementById('response_panel').style.display='none';
            $("#frmDestination")[0].reset(); 
        }, 2500);
      },
     error: function(e) 
      {
    $("#frmDestination").html(e).fadeIn();
      }          
    });
 }));


$("#file").on('change',function() {
    var file = this.files[0];
    var fileType = file.type;
    var match = ['image/jpeg', 'image/png', 'image/jpg'];
    if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))){
        alert('Sorry, only JPG, JPEG, & PNG files are allowed to upload.');
        $("#file").val('');
        return false;
    }
});



 CKEDITOR.replace('abt-destination', {
  extraPlugins : 'filebrowser',
  filebrowserUploadUrl: 'class/class.php?action=destination-image',
  filebrowserUploadMethod: 'form'
})
ClassicEditor
.create( document.querySelector( '#abt-destination' ), {
        simpleUpload: {
            // The URL that the images are uploaded to.
            uploadUrl: 'class/class.php?action=destination-image',
        }
    } )
    .then( editor => {
        window.editor = editor;
    } )
    .catch( err => {
        console.error( err.stack );
    } );
});
</script>