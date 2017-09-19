<script>
var _delay = 3000;
function checkLoginStatus(){
     $.get("checkStatus.php", function(data){
        if(!data) {
            window.location = "logout.php"; 
        }
        setTimeout(function(){  checkLoginStatus(); }, _delay); 
        });
}
checkLoginStatus();
</script>