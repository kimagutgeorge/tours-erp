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
        <p id="get-response">Contacts</p>
    </div>
    
    <div class="view-review"id="response">
<table id="tbl-all" style="width:100%"cellspacing="0">
<?php
$result=$conn->query("select * from faqs");?>
        <thead>
              <tr>
                <th hidden>#</th>
                <th>Action</th>
                <th style="width: 40%">FAQs</th>
                <th style="width: 50%">FAQ Answer</th>
              </tr>
          </thead>
          <tbody>
            <?php
            while($rows=mysqli_fetch_assoc($result)){?>
            <tr>
            <td hidden><?php echo $rows['faq_id'];?></td>
            <td>
                <div class="action-holder">
                <i class="fa fa-edit "></i>
                <i class="fa fa-trash"></i>
                </div>
        </td>
            <td><?php echo $rows['faq_question'];?></td>
            <td><?php echo $rows['faq_answer'];?></td>
            
        </tr>
        <?php }?>
        </tbody>

</div>
</div>
</div>
<?php include('footer.php');?>
<script>
    $(document).ready(function(){
    $('.fa-trash').on('click',function(){
      var state=confirm("Delete this FAQ?");
            if(state==true){
                data=$(this).closest('tr').find('td:eq(0)').text().trim()
            $.ajax({
                url:'class/class.php?action=del-faq',
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
    $('.fa-edit ').on('click',function(){
        data=$(this).closest('tr').find('td:eq(0)').text().trim()
            $.ajax({
                url:'class/class.php?action=edit-faq',
                method:'POST',
                data:{data:data},
                success:function(data){
                    
                $('#get-response').html(data);
        
            }
        })

    })
})
</script>
