<div class="package">
    <!-- <div class="page-title"id="response">
        <p>Tour Packages</p>
    </div> -->
   
    <form action="home.php?link=package" method="POST">
    <div class="package-top-bar filter-panel" style="margin-top:10px">
            <div class="filter-group">
            <div class="form-group">
                <label for="" class="small-text">From Date</label>
              <input type="date" name="start-date" required>
            </div>
            <div class="form-group">
                <label for="" class="small-text">To Date</label>
              <input type="date" name="end-date" required>
            </div>
            <div class="form-group">
            <button name="btn-date" class="mybtn">Search <i class="fa-solid fa-search"></i></button>
            </div>
            
            </div>
    </form>
            <div class="filter-group-2">
    <form action="home.php?link=package" method="POST">
            <div class="form-group">
                <label for="" class="small-text">Search By Season</label>
                <select name="txtseason" required>
                    <?php
                        $fileresult = $conn->query("select * from seasons order by season_id DESC");
                        $count = mysqli_num_rows($fileresult);
                        if($count<1){?>
                    <option disabled selected="true">No Package</option>
                        <?php }else{
                            while($filerow=mysqli_fetch_assoc($fileresult)){?>
                                <option value="<?php echo $filerow['season_id'];?>"><?php echo $filerow['season'];?></option>
                            <?php } }?>
                            </select>
            </div>
            <div class="form-group">
                <label for="" class="small-text">Search By Tour Type</label>
                <select name="txttype" id="" required>
                <?php
                        $fileresult = $conn->query("select * from tour_type order by id DESC");
                        $count = mysqli_num_rows($fileresult);
                        if($count<1){?>
                    <option disabled selected="true">No Package</option>
                        <?php }else{
                            while($filerow=mysqli_fetch_assoc($fileresult)){?>
                                <option value="<?php echo $filerow['id'];?>"><?php echo $filerow['tour_name'];?></option>
                            <?php } }?>
            </select>
            </div>
            <div class="form-group">
                <label for="" class="small-text">Offers/Normal</label>
                <select name="txtdeal" id="" required>
                <option value="0">Normal</option>
                <option value="1">Deal</option>
            </select>
            </div>
            <div class="form-group">
                <label for="" class="small-text">From Date</label>
              <input type="date" name="start-date" required>
            </div>
            <div class="form-group">
                <label for="" class="small-text">To Date</label>
              <input type="date" name="end-date" required>
            </div>
            <div class="form-group">
                <button class="mybtn" name="btn-filter">Search <i class="fa-solid fa-filter"></i></button>
            </div>
            </div>
    </form> 
    </div>
   
    </div>
    <div class="package">
    <div class="dashboard-top-bar" style="border-top:1px solid rgb(230,230,230);">
        <a href="home.php?link=<?php echo 'add_package'?>"><button class="mybtn">NEW <i class="fa fa-plus"></i> </button></a>
    </div>
    <table id="tbl-all"cellspacing="0">
        <thead>
              <tr>
                
                <th hidden>#</th>
                <th style="width:fit-content">Action</th>
                <th style="">Name</th>
                <?php
                    $res = $conn->query("select currency from settings limit 1");
                    $currow = mysqli_fetch_assoc($res);
                ?>
                <th style="">Price (<?php echo $currow['currency'];?>)</th>
                <th style="">Duration (Days)</th>
                <th>Season</th>
                <th>Type</th>
                <th>Date Created</th>
              </tr>
          </thead>
          <tbody>
            <?php
            if(isset($_POST["btn-filter"])){
                $start = $_POST['start-date'];
                $end = $_POST['end-date'];
                $txtseason = $_POST['txtseason'];
                $txttype = $_POST['txttype'];
                $txtdeal = $_POST['txtdeal'];

                $result=$conn->query("select * from package_images inner join packages on packages.id=package_images.package_id inner join destinations on packages.package_destination = destinations.id inner join seasons on packages.seasons = seasons.season_id inner join tour_type on package_tour = tour_type.id and package_creation >= '$start' and package_creation <= '$end' and packages.seasons= '$txtseason' and package_tour = '$txttype' and packages.deal = '$txtdeal' group by package_id");
            }else if(isset($_POST['btn-date'])){
                $start = $_POST['start-date'];
                $end = $_POST['end-date'];

                $result=$conn->query("select * from package_images inner join packages on packages.id=package_images.package_id inner join destinations on packages.package_destination = destinations.id inner join seasons on packages.seasons = seasons.season_id inner join tour_type on package_tour = tour_type.id and package_creation >= '$start' and package_creation <= '$end' group by package_id");

            }else{
                $result=$conn->query("select * from package_images inner join packages on packages.id=package_images.package_id inner join destinations on packages.package_destination = destinations.id inner join seasons on packages.seasons = seasons.season_id inner join tour_type on package_tour = tour_type.id group by package_id");
            }
            
            while($rows=mysqli_fetch_assoc($result)){?>
<tr>
            <td hidden><?php echo $rows['package_id'];?></td>
            <td>
                <div class="action-holder">
                <i class="fa fa-eye btn-view-package"></i>
                <i class="fa fa-edit btn-edit-package"></i>
                <i class="fa fa-trash"></i>
                <?php if($rows['status']==1){?>
                    <i class="fa fa-check"></i>
                <?php }?>
                </div>
                </td>
            <td><?php echo $rows["package_name"];?></td>
            <td>
            <?php echo "<span class='price'>".number_format($rows['package_price'])."</p>";?>
            </td>
            <td><?php echo $rows['package_duration']; ?></td>
            <td><?php echo $rows['season'];?></td>
            <td><?php echo $rows['tour_name'];?></td>
            <td><?php
                $created = $rows['package_creation'];
                $newdate = date("d/m/y", strtotime($created));
                echo $newdate;
                ?></td>
        </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>
<?php include('footer.php');?>
<script>
    $(document).ready(function(){
        $('.btn-view-package').on('click', function(){
            data=$(this).closest('tr').find('td:eq(0)').text().trim()
            
            $.ajax({
                url:'class/direction.php?action=view_package',
                method:'POST',
                data:{data:data},
                success:function(data){
                $('#direction-response').html(data);
            }
        })
        })

        $('.btn-edit-package').on('click', function(){
            data=$(this).closest('tr').find('td:eq(0)').text().trim()
            $.ajax({
                url:'class/direction.php?action=edit_package',
                method:'POST',
                data:{data:data},
                success:function(data){
                $('#direction-response').html(data);
            }
        })
        })
        $('.fa-trash').on('click', function(){
            var state=confirm("Delete this tour package?");
            if(state==true){
                data=$(this).closest('tr').find('td:eq(0)').text().trim()
            $.ajax({
                url:'class/class.php?action=delete_package',
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
        /* filter*/
        // $('#packfilter').on("submit", function(e){
        //     e.preventDefault()
        //     var data = $('#packfilter').serialize()

        //     $.ajax({
        //         url:'class/class.php?action=filter_package',
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

        // })


    })
</script>