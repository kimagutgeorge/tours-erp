<div class="package">
    <!-- <div class="page-title">
        <p>Blog</p>
    </div> -->
    <div class="dashboard-top-bar">
        <!-- <button class="mybtn">VIEW <i class="fa fa-eye"></i> </buton> -->
        <a href="home.php?link=<?php echo 'add_blog'?>"><button class="mybtn">NEW <i class="fa fa-plus"></i> </buton></a>
    </div>
    <div class="tour-panel">
    <div class="destination-panel"id="response">
    <?php
//    get id
   $destinationresult=$conn->query("select * from destinations");
   $row=mysqli_fetch_assoc($destinationresult);
   $count=mysqli_num_rows($destinationresult);
   if($count<1){?>
    <div class="page-title">
        <p><?php echo "No Blog";?></p>
    </div>
    <?php }else{
   $destinationid=$row['id'];
$selectCat="select * from blog_images inner join blog where blog.id=blog_images.blog_id group by blog_id ";
$result=$conn->query($selectCat);?>
<div class="destination-panel">
<table id="tbl-all" style="width:100%"cellspacing="0">
        <thead>
              <tr hidden>
                <th hidden>#</th>
                <th style="width:100%;">Type</th>
              </tr>
          </thead>
          <tbody>
<?php while($rows=mysqli_fetch_assoc($result)){
  $leid=$rows['blog_id'];
  ?>
            <tr>
            <td hidden><?php echo $leid;?></td>
            <td>
            <div class="page-title">
            <p><?php echo $rows['blog_name'];?></p>
        </div>
        <div class="submit-panel">
                <i class="fa fa-edit"></i>
                <i class="fa fa-trash"></i>
                <!-- <i class="fa fa-eye"></i> -->
            </div>
    <div class="destination-image">
    <img class="d-block w-100 bookimg" src="<?= '../assets/uploads/blog/'.$rows['image_name'];?>"alt="First slide">
    </div>
 
</div>
<!-- text -->
<div class="destination-description">
<?php 
echo $rows['blog'];
?>
</div>
</td>
</tr>
  <?php
}
}
?>
</tbody>           
</table>  
</div>
</div>
<?php include('footer.php');?>
<script>
$(document).ready(function(){
    $('.fa-trash').on('click',function(){
      var state=confirm("Delete this blog?");
            if(state==true){
                data=$(this).closest('tr').find('td:eq(0)').text().trim()
            $.ajax({
                url:'class/class.php?action=delete_blog',
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
    $('.fa-edit').on('click', function(){
            var data=$(this).closest('tr').find('td:eq(0)').text().trim()
            $.ajax({
                url:'class/direction.php?action=edit_blog',
                method:'POST',
                data:{data:data},
                success:function(data){
                $('#response').html(data);
            }
    })
  })
})
    </script>