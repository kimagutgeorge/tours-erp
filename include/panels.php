
<i class="fa fa-arrow-up"id="btn-back-to-top"></i>
<!-- black panel -->
<div id="black-panel">

</div>
<!-- respnse -->
<div id="response_panel">
    
</div>
<div id="view_booking">
    <div class="close">
        <i class="fa fa-times"id="close-view"></i>
    </div>
    <div class="book-detail">
        <div class="left">
        <?php
        $get=$conn->query('select * from company_info');
        while($content=mysqli_fetch_assoc($get)){
            echo "<p hidden id='jina'>".$content['name']."</p>";
        }?>
            <span>Client Details</span>
        <p>NAME: <label id="person_name"></p>
        <p>EMAIL: <label id="person-email"></p>
        <p> PHONE: <label id="person-phone"></p>
        <span>Tour Details</span>
        <p>ADULTS: <label id="person-adult"></p>
        <p>CHILDREN: <label id="person-child"></p>
        <p>DATE: <label id="person-date"></p>
        </div>
        <div class="right">
        <p> REQUIREMENTS: <label id="person-requirement"></p>
        <span>Package Details</span>
        <p> PACKAGE <label id="person-package"></p>
        <p>PRICE: <label id="person-price"></label> Kshs</p>
        <p> DURATION: <label id="person-duration"></p>

        <div class="pay-method">
            <div class="pay-title">
            <h4>INITIATE PAYMENT</h4>
            </div>
        <button class="mybtn"id="btn-mpesa">MPESA</button>
        <button class="mybtn">VISA</button>
        </div>
        <div id="pay-response"></div>
        </div>
        
    </div>
</div>
<?php include('footer.php');?>