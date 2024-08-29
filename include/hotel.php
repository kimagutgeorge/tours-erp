<div class="package">
<!-- <div class="page-title">
        <p>Hotels & Air Bnbs</p>
        <div id="response"></div>
    </div> -->
    <div class="tour-panel">
    <div class="tour-form">
    <form id="frmTour"method="POST">
        <input type="hidden"id="tour_id"name="hotel_id">
        <input type="text"placeholder="Enter Hotel Name"name="hotel_name"id="tour_name"required>
        <input type="number"placeholder="Enter Hotel Price/ Day"name="hotel_price"id="hotel_price"required>
        <select name="destination"required>
        <?php
        $res=$conn->query("select * from destinations");
        $count=mysqli_num_rows($res);
        if($count<1){
            ?><option disabled selected="true">No Locations!</option><?php
        }else{
        ?><option disabled selected="true">Location</option><?php
        while($row=mysqli_fetch_assoc($res)){?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['destination_name'];?></option>
        <?php } } ?>
    </select><br>
        <label for="">Images</label><br>
        <input type="file"placeholder="Enter Tour Type"name="files[]"id="tour_name" multiple>
        <div class="submit-panel">
            <input type="submit"class="mybtn"value="SAVE">
        </div>
    </form>
</div>
<div class="view-tour">
<table id="tbl-all" class="" style="width:100%"cellspacing="0">
<?php
$result=$conn->query("select * from hotel inner join destinations on id=hotel_location");?>
        <thead>
              <tr>
                <th hidden>#</th>
                <th style="width:30%;">Hotel Name</th>
                <th style="width:20%;">Price (Kshs)</th>
                <th style="width:30%">Location</th>
                <th>Action</th>
              </tr>
          </thead>
          <tbody>
            <?php
            while($rows=mysqli_fetch_assoc($result)){?>
            <tr>
            <td hidden><?php echo $rows['hotel_id'];?></td>
            <td><?php echo $rows['hotel_name'];?></td>
            <td><?php echo $rows['hotel_price'];?></td>
            <td><?php echo $rows['destination_name'];?></td>
            <td>
                
            <i class="fa fa-eye btn-view-hotel"></i>
                <i class="fa fa-edit edit-tour"></i>
                <i class="fa fa-trash"></i>
        </td>
        </tr>
        <?php }?>
        </tbody>
            </table>
</div>
    </div>
</div>
<?php include('footer.php');?>
<script>
    $(document).ready(function(){
        $('#frmTour').on('submit', function(e){
            e.preventDefault()
            $.ajax({
                url:'class/class.php?action=add_hotel',
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
            $("#frm_add_package")[0].reset(); 
        }, 2500);
      },
     error: function(e) 
      {
    $("#frm_add_package").html(e).fadeIn();
      }          
    });

        })

        $('.btn-view-hotel').on('click', function(){
            data=$(this).closest('tr').find('td:eq(0)').text().trim()
            $.ajax({
                url:'class/direction.php?action=view_hotel',
                method:'POST',
                data:{data:data},
                success:function(data){
                $('#response').html(data);
            }
        })
        })



        $('.edit-tour').on('click', function(){
            document.getElementById('tour_id').value=$(this).closest('tr').find('td:eq(0)').text().trim()
            document.getElementById('tour_name').value=$(this).closest('tr').find('td:eq(1)').text().trim()
            document.getElementById('hotel_price').value=$(this).closest('tr').find('td:eq(2)').text().trim()
        })
        $('.fa-trash').on('click', function(){
            var state=confirm("Delete this hotel?")
            if(state==true){
                data=$(this).closest('tr').find('td:eq(0)').text().trim()
            $.ajax({
                url:'class/class.php?action=delete_hotel',
                method:'POST',
                data:{data:data},
                success:function(data){
                    document.getElementById('black-panel').style.display='block';
        document.getElementById('response_panel').style.display='block';
        $('#response_panel').html(data);
        setTimeout(() => {
            document.getElementById('black-panel').style.display='none';
        document.getElementById('response_panel').style.display='none';
            
        }, 2500);
            }
        })
            }else{
                
            }
        })

    })
</script>