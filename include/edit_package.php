<div class="package tour-panel">
    <form id="frm_add_package"action=""method="POST" enctype="multipart/form-data">
<div class="add-package-panel">
    <div class="package-top-bar">
        <input type="hidden"value="<?php echo $_SESSION['edit-package-id'];?>"name="id">
        <?php
            $packageresult=$conn->query("select * from packages inner join destinations on packages.package_destination = destinations.id inner join tour_type on packages.package_tour = tour_type.id and packages.id=".$_SESSION['edit-package-id']);
            $rows=mysqli_fetch_assoc($packageresult);
        ?>
        <div class="form-group">
    <label for="" class="small-text">Package Name <span class="important">*</span></label>
    <input type="text"placeholder="Enter package name"name="name" value="<?php echo $rows['package_name'];?>" required>
    </div>
    <div class="form-group">
    <label for="" class="small-text">Package Duration <span class="important">*</span></label>
    <input type="number"placeholder="Package Duration (Days)"name="duration"value="<?php echo $rows['package_duration'];?>" required>
</div>
    <?php
    $res=$conn->query("select * from destinations");
    ?>
    <div class="form-group">
    <label for="" class="small-text">Destination <span class="important">*</span></label>
    <select name="destination" required>
        <?php
        $count=mysqli_num_rows($res);
        if($count<1){
            ?><option disabled selected="true">No Destinations!</option><?php
        }else{
        ?><option disabled selected="true">Destinations</option><?php
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
    <select name="tour" required>
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
    <input type="number"placeholder="Package Price"name="price" value="<?php echo $rows['package_price'];?>"required>
        </div>
    <div class="form-group">
    <label for="" class="small-text">Package Images <span class="important">*</span></label>
    <input type="file"placeholder="Package Price"name="files[]"id="file" multiple>
        </div>
        <div class="form-group">
    <label for="" class="small-text">Package Type <span class="important">*</span></label>
    <?php
        if($rows['offer'] > 0){?>
        <select name="deal" id="deal-no" onchange ="checkDeal()">
            <option value="1">Deal</option>
            <option value="0">Normal Package</option>
    </select>
            <style>
                #percent-off{
                    display:block;
                }
            </style>
        <?php }else{?>
            <select name="deal" id="deal-no" onchange ="checkDeal()">
            <option value="0">Normal Package</option>
            <option value="1">Deal</option>
    </select>
            <style>
                #percent-off{
                    display:none;
                }
            </style>
        <?php }?>
    
        </div>
   
        <div class="form-group" id="percent-off">
    <label for="" class="small-text">%ge Off </label>
    <input type="number"placeholder="%ge Off"name="offer" value="<?php echo $rows['offer'];?>" >
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
    <div class="package-bottom">
    <div class="left">
    <span for="exampleFormControlTextarea1" class="small-text">Tour Overview</span><br>
    <textarea class="form-control" name="txtactivity"id="txtactivity" rows="3"placeholder="Tour Activities"style="height:300px;"required><?php echo $rows['package_overview'];?></textarea>
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

    <?php // Fetch data from the database
$packId = $_SESSION['package-id'];
$sql = "SELECT * FROM itinerary WHERE pack_id =? ";
    $statement = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($statement, $sql);
    mysqli_stmt_bind_param($statement,"s",$packId);
    $statement->execute();
    $faqs = mysqli_stmt_get_result($statement);
    while($faq = mysqli_fetch_assoc($faqs)){?>
<!-- day -->
<div class="day-container">
            <label for=""class="small-text">Day</label>
            <input type="text"placeholder="Day - Title" name="day-title" value="<?php echo $faq['day_title'];?>" class="day-title">
            <label for="" class="small-text">Activity</label>
            <textarea name="" id="" cols="" rows="" placeholder="Activity" name="day-activity" class="day-activity"><?php echo $faq['activity'];?></textarea><br>
            <div class="remove-day" onclick="removeDay(this)"></div>
        </div>
        <!-- end -->

    <?php }?>
        
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
    url: "class/class.php?action=edit_package",
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
        //     document.getElementById('black-panel').style.display='none';
        // document.getElementById('response_panel').style.display='none';
        //     $("#frm_add_package")[0].reset(); 
        }, 2500);
      },
     error: function(e) 
      {
    $("#frm_add_package").html(e).fadeIn();
      }          
    });
    })

})

</script>