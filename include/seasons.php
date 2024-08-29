<div class="package">
<!-- <div class="page-title">
        <p>Tour Types</p>
    </div> -->
    <div class="tour-panel">
    <div class="tour-form">
    <form id="frmTour"method="POST">
        <input type="hidden"id="tour_id"name="tour_id">
        <input type="text"placeholder="Enter Tour Type"name="tour_name"id="tour_name"required>
        <div class="submit-panel">
            <input type="submit"class="mybtn"value="SAVE">
        </div>
    </form>
</div>
<div class="view-tour">
<table id="tbl-all" class="" style="width:100%"cellspacing="0">
<?php $result=$conn->query("select * from seasons");?>
        <thead>
              <tr>
                <th hidden>#</th>
                <th style="width:70%;">Season</th>
                <th>Action</th>
              </tr>
          </thead>
          <tbody>
            <?php
            while($rows=mysqli_fetch_assoc($result)){?>
            <tr>
            <td hidden><?php echo $rows['season_id'];?></td>
            <td><?php echo $rows['season'];?></td>
            <td>
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
                url:'class/class.php?action=add_season',
                method:'POST',
                data:$('#frmTour').serialize(),
                success:function(data){
                    document.getElementById('black-panel').style.display='block';
                    document.getElementById('response_panel').style.display='block';
                    $('#response_panel').html(data)
                    setTimeout(() => {
                        document.getElementById('black-panel').style.display='none';
                        document.getElementById('response_panel').style.display='none';
                        $('#response_panel').html('')
                    }, 2500);
                }
            })
        })

        $('.edit-tour').on('click', function(){
            document.getElementById('tour_id').value=$(this).closest('tr').find('td:eq(0)').text().trim()
            document.getElementById('tour_name').value=$(this).closest('tr').find('td:eq(1)').text().trim()
        })
        $('.fa-trash').on('click', function(){
            var state=confirm("Delete this tour package?");
            if(state==true){
                data=document.getElementById('tour_id').value=$(this).closest('tr').find('td:eq(0)').text().trim()
            $.ajax({
                url:'class/class.php?action=delete_tour',
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