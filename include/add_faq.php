<div class="package add-faq">
    <div class="tour-panel">
    <div class="page-title">
        <p>Add FAQs</p>
    </div>
    <form action="" id="frmFaq">
        <?php
            $faqid = $_SESSION['faq-id'];
            if(!empty($faqid)){
                $faqresult = $conn->query("select * from faqs where faq_id ='$faqid' ");
                $faqrows = mysqli_fetch_assoc($faqresult);
                
                ?>
               <input type="hidden" placeholder="Type your question" value="<?php echo $faqid;?>" name="faqid" required><br> 
               <label for="">Frequently Asked Question</label><br>
                <input type="text" placeholder="Type your question" value="<?php echo $faqrows['faq_question'];?>" name="question" required><br>
                <label for="">Answer</label><br>
                <textarea id="" cols="" rows=""placeholder="Type Your Answer" name="answer" required><?php echo $faqrows['faq_answer'];?></textarea><br>
            <?php }else{?>
                <input type="hidden" placeholder="Type your question" name="faqid" required><br> 
            <label for="">Frequently Asked Question</label><br>
            <input type="text" placeholder="Type your question" name="question" required><br>
            <label for="">Answer</label><br>
            <textarea id="" cols="" rows=""placeholder="Type Your Answer" name="answer" required></textarea><br>
            <?php }?>
        
        <button class="mybtn">SAVE <i class="fa-solid fa-save"></i></button>
    </form>
    <div id="all-response"></div>
    </div>
</div>
<?php unset($_SESSION['faq-id']); ?>
<script>
    $('#frmFaq').on('submit', function(e){
        e.preventDefault()
        $.ajax({
            url:'class/class.php?action=btn-faq',
            method:'POST',
            data:$('#frmFaq').serialize(),
            success:function(resp){
                $('#all-response').html(resp)
                $('#frmFaq')[0].reset()
            }
        })
    })
</script>