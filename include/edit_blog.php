<div class="package">
    <div class="add-destination">
    <?php
            $packageresult=$conn->query("select * from blog where id=".$_SESSION['edit-blog-id']);
            $rows=mysqli_fetch_assoc($packageresult);
        ?>
        <form id="frmBlog" enctype="multipart/form-data">
        <input type="hidden"value="<?php echo $_SESSION['edit-blog-id'];?>"name="id">
        <input type="text"value="<?php echo $rows['blog_name'];?>"placeholder="Blog Title"required name="blogname">
        <span><label>Images: </label><input type="file"name="files[]"id="file" multiple></span><br>
    </div>
    <div class="about-destination">
    <div class="left">
    <label for="">Blog</label><br>
        <textarea class="form-control" name="profile"id="txtblog" rows="3"placeholder="Tour Activities"style="height:500px;"><?php echo $rows['blog'];?></textarea>
    </div>
    <div class="submit-panel">
        <input type="submit"class="mybtn"value="SAVE">
        <a href="home.php?link=<?php echo 'blog'?>"><input type="submit"class="btncancel"value="CANCEL"></a>
    </div>
    </form>
    </div>
</div>
<?php include('footer.php');?>
<script>
$(document).ready(function () {

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
// submit form
 $("#frmBlog").on('submit',(function(e) {
e.preventDefault();
for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }

  $.ajax({
    url: "class/class.php?action=edit_blog",
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
            $("#frmBlog")[0].reset(); 
        }, 2500);
      },
     error: function(e) 
      {
    $("#frmBlog").html(e).fadeIn();
      }          
    });
 }));

 //ckeditor

 CKEDITOR.replace('txtblog',{
    extraPlugins : 'filebrowser',
  filebrowserUploadUrl: 'class/class.php?action=edit-blog-image',
  filebrowserUploadMethod: 'form'
})
ClassicEditor
.create( document.querySelector( '#txtblog' ), {
        simpleUpload: {
            // The URL that the images are uploaded to.
            uploadUrl: 'class/class.php?action=edit-blog-image',
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