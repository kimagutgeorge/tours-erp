<div class="package">
    <div class="tour-panel">
    <form id="frm_add_package"action=""method="POST" enctype="multipart/form-data">
<div class="add-package-panel">
    <div class="package-top-bar">
    <div class="form-group">
        <label for="" class="small-text">Package Name <span class="important">*</span></label>
    <input type="text"placeholder="Enter package name"name="name" required>
    </div>
    <div class="form-group">
        <label for="" class="small-text">Package Duration <span class="important">*</span></label>
    <input type="number"placeholder="Package Duration"name="duration" required>
</div>

    <?php
    $res=$conn->query("select * from destinations");
    ?>
    <div class="form-group">
        <label for="" class="small-text">Destination <span class="important">*</span></label>
    <select name="destination"required>
        <?php
        $count=mysqli_num_rows($res);
        if($count<1){
            ?><option disabled selected="true">No Destinations!</option><?php
        }else{
        ?><option disabled selected="true">Destination</option><?php
        while($row=mysqli_fetch_assoc($res)){?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['destination_name'];?></option>
        <?php } } ?>
    </select>
</div>
    <?php
    $res=$conn->query("select * from tour_type");
    ?>
    <div class="form-group">
        <label for="" class="small-text">Tour Type <span class="important">*</span></label>
    <select name="tour"required>
    <?php
        $count=mysqli_num_rows($res);
        if($count<1){
            ?><option disabled selected="true">No Tour Types!</option><?php
        }else{
        ?><option disabled selected="true">Tour Type</option><?php
        while($row=mysqli_fetch_assoc($res)){?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['tour_name'];?></option>
        <?php } } ?>
    </select>
</div>
    
    </div>
    <div class="package-top-bar">
    <div class="form-group">
        <label for="" class="small-text">Package Price <span class="important">*</span></label>
    <input type="number"placeholder="Package Price"name="price"required>
</div>
<div class="form-group">
        <label for="" class="small-text">Package Images <span class="important">*</span></label>
    <input type="file"placeholder="Package Price"name="files[]"id="file" required multiple>
</div>
<div class="form-group">
        <label for="" class="small-text">Package Type <span class="important">*</span></label>
    <select name="deal" id="deal-no" onchange ="checkDeal()">
            <option value="0">Normal Package</option>
            <option value="1">Deal</option>
    </select>
</div>
<div class="form-group" id="percent-off">
        <label for="" class="small-text">Package Name <span class="important">*</span></label>
    <input type="number"placeholder="%ge Off"name="offer">
</div>
<div class="form-group">
    <label for="" class="small-text">Season</label>
    <select name="season" required>
    <?php
    $res=$conn->query("select * from seasons");
        $count=mysqli_num_rows($res);
        if($count<1){
            ?><option disabled selected="true">No Seasons!</option><?php
        }else{
        ?><option disabled selected="true">Package Season</option><?php
        while($row=mysqli_fetch_assoc($res)){?>
        <option value="<?php echo $row['season_id'];?>"><?php echo $row['season'];?></option>
        <?php } } ?>
    </select>
            </div>
    </div>
    <div class="package-bottom" style="width:100%">
    <div class="left">
    <span for="exampleFormControlTextarea1">Tour Overview</span><br>
    <textarea class="form-control" name="txtactivity"id="txtactivity" rows="3"placeholder="Tour Activities"style="height:300px;"required></textarea>
    </div>
    <div class="right">
    <style>
        .add-panel{
            width:100%;
            margin-top:20px;
        }
        .days-holder{
            width:100%;
            margin-top:10px;
        }
    </style>
    <div class="add-panel">
        <span class="mybtn" style="padding:5px 10px"  onclick="addDay()">Add Day <i class="fa-regular fa-plus"></i></span>
    </div>
    <div class="days-holder" style="max-height:50vh;overflow-y:scroll">
        <!-- day -->
        <div class="day-container">
            <input type="text"placeholder="Day - Title" name="day-title" class="day-title">
            <textarea name="" id="" cols="" rows="" placeholder="Activity" name="day-activity" class="day-activity"></textarea><br>
            <div class="remove-day" onclick="removeDay(this)"></div>
        </div>
        <!-- end -->
        
    </div>

    </div>
    
    </div>
    <div class="submit-panel">
        <input type="submit"class="mybtn"value="SAVE">
        </form>
        
    </div>

</div>
</div>
<?php include('footer.php');?>
<script>

function checkDeal(){
    var deal = document.getElementById('deal-no').value
    if(deal === "1"){
        document.getElementById("percent-off").style.display="block"
    }else{
        document.getElementById("percent-off").style.display="none"
    }
}


$(document).ready(function(e){
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

/* submit form */
$('#frm_add_package').on('submit', function(e){
        e.preventDefault()
        for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }
    
    var data =  new FormData(this)

$('.day-title').each(function(index, element) {
    // Append their values to the FormData object
    data.append('day-title[]', $(element).val());
});
$('.day-activity').each(function(index, element) {
    // Append their values to the FormData object
    data.append('day-activity[]', $(element).val());
});


  $.ajax({
    url: "class/class.php?action=add_package",
   type: "POST",
   data: data,
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
            $("#frm_add_package")[0].reset(); 
        }, 2500);
      },
     error: function(e) 
      {
    $("#frm_add_package").html(e).fadeIn();
      }          
    });
    })
/* end */    
})

</script>