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
<div class="package"id="response">
    <!-- <div class="page-title">
        <p>Booking</p>
    </div> -->
    <div class="tour-panel">
    <div class="dashboard-top-bar">
        <a href="home.php?link=<?php echo 'book'?>"><button class="mybtn">BOOK <i class="fa fa-plus"></i> </buton></a>
        <!-- <a href="home.php?link=<?php echo 'book'?>"><button class="mybtn">BACK UP <i class="fa fa-arrow-up"></i> </buton></a>
        <button class="mybtn del-all"style="background:red;">DELETE COMPLETED TOURS <i class="fa fa-trash"style="color:white;"></i> </buton> -->
    </div>
    <div class="view-review"style="width:96%">
<table id="tbl-all" style="width:100%"cellspacing="0">
        <thead>
              <tr>
                <th hidden>#</th>
                <th>Action</th>
                <th style="width:20%;">Client</th>
                <th style="width:30%;">Tour</th>
                <th style="width:30%;">Package</th>
              </tr>
          </thead>
          <tbody>
            <?php
            if(!empty($_SESSION['search-date'])){
                $checkin = $_SESSION['search-date'];

                $result=$conn->query("SELECT *
                FROM booking
                INNER JOIN packages ON booking.package_id = packages.id
                WHERE check_in = DATE_ADD('$checkin', INTERVAL 1 DAY)
                ORDER BY booking.booking_id DESC;
                ");
            }else{
                $result=$conn->query("select * from booking inner join packages on booking.package_id=packages.id order by booking.booking_id DESC");
            }
            
            while($rows=mysqli_fetch_assoc($result)){?>
<tr>
            <td hidden><?php echo $rows['booking_id'];?></td>
            <td>
                <div class="action-holder">
                <i class="fa fa-eye"></i>
                <i class="fa fa-edit"></i>
                <i class="fa fa-trash"></i>
                <?php if($rows['status']==1){?>
                    <i class="fa fa-check"></i>
                <?php }?>
                </div>
                </td>
            <td><?php echo $rows["full_name"];?></td>
            <td>
            <?php echo $rows['email']."<br>";?>
            <?php echo "<span class='price'>".$rows['phone']."</p>";?>
            </td>
            <td><?php echo $rows['package_name']; ?></td>
            
        </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>
</div>
</div>

<?php include('footer.php');?>
<script>
     $('.fa-eye').on('click', function(){
        data=$(this).closest('tr').find('td:eq(0)').text().trim()
            $.ajax({
                url:'class/direction.php?action=view_booking',
                method:'POST',
                data:{data:data},
                success:function(data){
                $('#response').html(data);
            }
    })
        
    })
    
    $('.fa-thumbs-up').on('click',function(){
      var state=confirm("Approve this booking?");
            if(state==true){
                data=$(this).closest('tr').find('td:eq(0)').text().trim()
            $.ajax({
                url:'class/class.php?action=approve_booking',
                method:'POST',
                data:{data:data},
                success:function(data){          
                 $('#response').html(data);
            }
        })
            }else{
                
            }
    })
    $('.fa-trash').on('click', function(){
            var state=confirm("Delete this booking?");
            if(state==true){
                data=$(this).closest('tr').find('td:eq(0)').text().trim()
            $.ajax({
                url:'class/class.php?action=delete_booking',
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
        $('.del-all').on('click', function(){
            var state=confirm("Delete all completed tours?");
            if(state==true){
        //         data=$(this).closest('tr').find('td:eq(0)').text().trim()
        //     $.ajax({
        //         url:'class/class.php?action=delete_all',
        //         method:'POST',
        //         data:{data:data},
        //         success:function(data){
        //             document.getElementById('black-panel').style.display='block';
        // document.getElementById('response_panel').style.display='block';
        // $('#response_panel').html(data);
        // setTimeout(() => {
        //     document.getElementById('black-panel').style.display='none';
        // document.getElementById('response_panel').style.display='none';
            
        // }, 2500);
        //     }
        // })
            }else{
                
            }
        })
        $('.fa-edit').on('click', function(){
            data=$(this).closest('tr').find('td:eq(0)').text().trim()
            $.ajax({
                url:'class/direction.php?action=edit_booking',
                method:'POST',
                data:{data:data},
                success:function(data){
                $('#response').html(data);
            }
    })
  })
  $('#btn-mpesa').on('click', function(){
    var data=$(this).closest('.book-detail').find('#person-phone').text().trim()
    var jina=$(this).closest('.book-detail').find('#jina').text().trim()
    var price=$(this).closest('.book-detail').find('#person-price').text().trim()
        $.ajax({
            url:'class/mpesa-pay/stkpush.php',
            method:'POST',
            data:{data:data,
                    jina:jina,
                    price:price
            },
            success:function(resp){
                $('#pay-response').html(resp);
            }
        })
  })
</script>
<?php unset($_SESSION['search-date']);?>