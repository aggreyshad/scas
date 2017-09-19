<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script type="text/javascript">
/**
 * File: js/showhide.js
 * Author: design1online.com, LLC
 * Purpose: toggle the visibility of fields depending on the value of another field
 **/
$(document).ready(function () {
    toggleFields(); //call this first so we start out with the correct visibility depending on the selected form values
    //this will call our toggleFields function every time the selection value of our underAge field changes
    $("#age").change(function () {
        toggleFields();
    });

});
//this toggles the visibility of our parent permission fields depending on the current selected value of the underAge field
function toggleFields() {
    if ($("#age").val() <= 13)
        $("#parentPermission").show();
    else
        $("#parentPermission").hide();
}

</script>

</head>

<body>
<h1>Toggle fields based on form values</h1>
<p>Change the age field and see what happens</p>
<form method="POST">
    <p>Name:
        <input type="text" name="player_name" />
    </p>
    <p>Email:
        <input type="text" name="player_email" />
    </p>
    <p>Age:
        <select id="age" name="age">
            <option value="13">13 or younger</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
        </select>
    </p>
    <div id="parentPermission">
        <p>Parent's Name:
            <input type="text" name="parent_name" />
        </p>
        <p>Parent's Email:
            <input type="text" name="parent_email" />
        </p>
        <p>You must have parental permission before you can play.</p>
    </div>
    <p align="center">
        <input type="submit" value="Join!" />
    </p>
</form>






</body>
</html>
