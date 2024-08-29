<style>
    table tr td p{
    margin:0;
    font-size:15px;
    font-weight: bold;
}
table tr td p .fa{
    cursor:default;
    font-size:15px;
}
</style>
<div class="package">
    <div class="tour-panel">
    <div class="page-title">
        <p>Tailor Made Requests</p>
    </div>
    
    <div class="view-review"id="response">
<table id="tbl-all" style="width:100%"cellspacing="0">
        <thead>
              <tr>
                <th hidden>#</th>
                <th style="width:30%;">Client</th>
                <th style="width:50%;">Message</th>
                <th style="width:20%">Action</th>
              </tr>
          </thead>
          <tbody>
            <?php $result=$conn->query("select * from contact");
            while($rows=mysqli_fetch_assoc($result)){
            ?>
            <tr>
            <td hidden class="review_id"><?php echo $rows['id'];?></td>
            <td>
            <P style="text-decoration:underline"><i class="fa fa-user"></i><?php echo $rows['name'];?></P><br>
                <P><i class="fa fa-envelope"></i><?php echo $rows['email'];?></P><br>
                <P><i class="fa fa-calendar"></i><?php $checkin= strtotime($rows['date']); echo date('d/m/Y',$checkin);?></P>
        </td>
            <td>
            <P style="text-decoration:underline"><?php echo $rows['subject'];?><br></p>
                <?php echo $rows['message'];?>
            </td>
            <td>
                
                <i class="fa fa-trash"></i>
                <?php if($rows['status']==1){?>
                    <i class="fa fa-check"></i>
                <?php }else{?>
                <i class="fa fa-thumbs-up"></i>
                <?php };?>
        </td>
        </tr>
        <?php };?>
        </tbody>
</div>
</div>
</div>
<?php include('footer.php');?>
<script>
    $(document).ready(function(){
    $('.fa-trash').on('click',function(){
      var state=confirm("Delete this message?");
            if(state==true){
                data=$(this).closest('tr').find('.review_id').text().trim()
            $.ajax({
                url:'class/class.php?action=delete_msg',
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
    $('.fa-thumbs-up').on('click',function(){
      var state=confirm("Mark as Read?");
            if(state==true){
                data=$(this).closest('tr').find('.review_id').text().trim()
            $.ajax({
                url:'class/class.php?action=approve_msg',
                method:'POST',
                data:{data:data},
                success:function(data){          
                 $('#response').html(data);
            }
        })
            }else{
                
            }
    })
})
</script>
