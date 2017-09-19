<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php $number=0; ?>
<input type="text" id="subject_id" name="subject_id" value="" onclick="">Select Subject<br />
<button id="filldetails" onclick="addFields()" >+</button>
    <div id="container"/>

<script type="text/javascript">
        function addFields(){
            //var number = document.getElementById("subject_id").value;
			
			var number = <?php echo ++$number; ?>;
			//var number += 1;
            var container = document.getElementById("container");
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
                container.appendChild(document.createTextNode("Subject " + (i+1)));
                var input = document.createElement("input");
                input.type = "text";
                input.name = "subject_id" + (i+1);
                input.id = "subject_id" + (i+1);                
                container.appendChild(input);
				var input = document.createElement("input");
				input.type = "button";
                input.name = "subject_id" + (i+1);
                input.id = "subject_id" + (i+1);
				input.value = "+";
				input.onclick= "addFields()";                
                container.appendChild(input);
                container.appendChild(document.createElement("br"));
            }
        }
        </script>

</body>
</html>
