<div class="centered">
    <div class="login-panel">
        <div class="up-div">
        <span id="login-result"style="color:#979393"></span>  
        </div>
    <form action=""id="login-form"method="POST">
    <input type="text"placeholder="Enter Your Username"name="username"required>
    <input type="password"placeholder="Enter Your Password"name="password"required><br>
    <div class="separator"></div>
    <a href="index.php?link=forgot" style="padding-top:10px"><i class="fa fa-arrow-left"></i> Back</a>
    <input type="submit"value="Login"name="btn-login"id="btn-login"class="mybtn">
    </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#login-form').on('submit', function(e){
            e.preventDefault()
            $.ajax({
                url:'class/class.php?action=login',
                method:'POST',
                data:$('#login-form').serialize(),
                success:function(data){
                    $('#login-result').html(data)
                    setTimeout(() => {
                        $('#login-result').html('')
                    }, 3000);
                }
            })
        })
    })
</script>