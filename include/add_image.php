<div class="package">
    <!-- <div class="page-title">
        <p>Add Images</p>
    </div> -->
    <div class="dashboard-top-bar">
        <!-- <button class="mybtn">VIEW <i class="fa fa-eye"></i> </buton> -->
        <a href="home.php?link=<?php echo 'website'?>"><button class="mybtn">CANCEL</buton></a>
    </div>
    <div class="left"style="margin-top:20px">
    <form id="frmImage"enctype="multipart/form-data">
    <input type="file"id="file"name="files[]"required multiple>
    <input type="submit"class="mybtn"value="SAVE">
    </form>
    </div>
    <div class="view-package">
        <div class="line"></div>
<div id="shown-image">

</div>
    
</div>
<?php include('footer.php');?>
<script>
    $(document).ready(function(){
        $("#file").on('change',function(e) {
    var file = this.files[0];
    var fileType = file.type;
    var match = ['image/jpeg', 'image/png', 'image/jpg'];
    if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))){
        alert('Sorry, only JPG, JPEG, & PNG files are allowed to upload.');
        $("#file").val('');
        
    }else{
        if(window.File && window.FileReader && window.FileList && window.Blob){
        const files=e.target.files;
        const output=document.querySelector('#shown-image');
        for(let i=0; i<files.length; i++){
            if(!files[i].type.match("image"))continue;
            const picReader=new FileReader();
            picReader.addEventListener("load", function(event){
                const picFile=event.target;
                const div=document.createElement("div") ;
                div.innerHTML=`<img class="the-image" src="${picFile.result}" title="${picFile.name}"/>`;
                output.appendChild(div);
            })
            picReader.readAsDataURL(files[i]);
        }
    }else{
        alert('Your browser does not support the File API');
    }
    }
});
        $('#frmImage').on('submit', function(e){
            e.preventDefault()
            $.ajax({
    url: "class/class.php?action=add_image",
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
            $("#frmImage")[0].reset(); 
        }, 2500);
      },
     error: function(e) 
      {
    $("#frmImage").html(e).fadeIn();
      }          
    });
    })
})
</script>