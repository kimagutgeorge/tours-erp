<div class="package users">
<!-- <div class="page-title">
        <p>Hotels & Air Bnbs</p>
        <div id="response"></div>
    </div> -->
    <div class="tour-panel">
    <div class="tour-form">
    <form id="frmUser"method="POST">
        <input type="hidden"id="tour_id"name="user-id" autocomplete="off">
        <input type="text"placeholder="Username"name="username"required autocomplete="off">
        <input type="text"placeholder="Full Name"name="fullname"required autocomplete="off">
        <select name="type" id="">
            <option value="">Admin</option>
            <option value="">Employee</option>
        </select>
        <input type="text"placeholder="Password"name="password"required autocomplete="off">
        <input type="text"placeholder="Confirm Password" required autocomplete="off">
        <div class="submit-panel">
            <input type="submit"class="mybtn"value="SAVE">
            
        </div>
    </form>
</div>
<div class="view-tour">
<table id="tbl-all" class="" style="width:100%"cellspacing="0">
<?php
$result=$conn->query("select * from users");?>
        <thead>
              <tr>
                <th hidden>#</th>
                <th>Manage</th>
                <th style="width:30%;">Username</th>
                <th style="width:20%;">Full Name</th>
                <th style="width:30%">Type</th>
              </tr>
          </thead>
          <tbody>
            <?php
            while($rows=mysqli_fetch_assoc($result)){?>
            <tr>
            <td hidden><?php echo $rows['user_id'];?></td>
            <td>
                <i class="fa fa-edit edit-tour"></i>
                <i class="fa fa-trash"></i>
        </td>
            <td><?php echo $rows['username'];?></td>
            <td><?php echo $rows['full_name'];?></td>
            <td>
                <?php 
                    if($rows['type']=='0'){
                        echo "Admin";
                    }else{
                        echo "Employee";
                    }?>  
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
        $('#frmUser').on('submit', function(e){
            e.preventDefault()
            $.ajax({
                url:'class/class.php?action=add_user',
                method:'POST',
                data:$('#frmUser').serialize(),
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
    })
</script>