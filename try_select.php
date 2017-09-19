<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


<select onchange="yesnoCheck(this);">
    <option value="">Valitse automerkkisi</option>
    <option value="lada">Lada</option>
    <option value="mosse">Mosse</option>
    <option value="volga">Volga</option>
    <option value="vartburg">Vartburg</option>
    <option value="other">Muu</option>
    </select>

    <div id="ifYes" style="display: none; background:red;" >
    <label for="car">Muu, mikä?</label> <input type="text" id="car" name="car" /><br />
    </div>

    <script>
    function yesnoCheck(that) {
        if (that.value == "other") {
           // alert("check");
            document.getElementById("ifYes").style.display = "block";
			document.getElementById("ifYes").style.background = "blue";
			document.getElementById("ifYes").style.background = "blue";


        } else {
            document.getElementById("ifYes").style.display = "none";
        }
    }
</script>
</body>
</html>
