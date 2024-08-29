<div class="package">
    <!-- <div class="page-title">
        <p>Website</p>
    </div> -->
    <div class="dashboard-top-bar">
    <!-- <a href="home.php?link=<?php echo 'add_image'?>"><button class="mybtn">HOME SLIDER <i class="fa fa-home"></i> </buton></a> -->
        <a href="home.php?link=<?php echo 'review'?>"><button class="mybtn">REVIEWS <i class="fa fa-user"></i> </buton></a>
        <a href="home.php?link=<?php echo 'contact'?>"><button class="mybtn">CONTACT <i class="fa fa-phone"></i> </buton></a>
    </div>
    <div class="view-package">
        <?php
        $result=$conn->query("select * from home_slide");
        while($rows=mysqli_fetch_assoc($result)){
        ?>
        <div class="slider-image">
            <div class="image_id"hidden><?php echo $rows['id'];?></div>
            <?php echo "<img src='../uploads/homeslider/".$rows['image_name']."'alt='Oops!'>";?>
            <div class="submit-panel">
                <i class="fa fa-trash"></i>
            </div>
        </div>
        <?php };?>
        
    </div>
</div>
<?php include('footer.php')?>
<script>
    $(document).ready(function(){
        $('.fa-trash').on('click', function(){
            var state=confirm("Delete this image?");
            if(state==true){
                data=$(this).closest('.slider-image').find('.image_id').text().trim()
            $.ajax({
                url:'class/class.php?action=delete_image',
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