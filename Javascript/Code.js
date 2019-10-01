
<script>


function logged(userName)
{
    document.getElementById("LoginState").innerHTML = "<a href='#'>"+ userName +"</a>";
    document.getElementById("LogOutState").innerHTML = "<a href='LogOut.php'>LogOut</a>";
    document.getElementById("RegisterState").innerHTML = "";
}
</script>