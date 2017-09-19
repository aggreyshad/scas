<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


            <!----TABLE LISTING STARTS--->
            <div class="tab-pane  active" id="list">
				<center>
                <form action="" method="post" accept-charset="utf-8">                
                
                <table border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
                	<tr>
                        <td>select exam</td>
                        <td>select class</td>
                        <td>select subject</td>
                        <td>&nbsp;</td>
                	</tr>
                	<tr>
                        <td>
                        	<select name="exam_id" class="form-control"  style="float:left;">
                                	   <option value="" selected="selected">select an exam</option>
                                       <option value="1"> class Term 1 BOT</option>
                                       <option value="2">class Term 1 EOT</option>
                                       <option value="3">class Term 1 MDT</option>
                                       <option value="4"> class English Grammar</option>
                            </select>
                        </td>
                        <td>
                        	<select name="class_id" class="form-control"  onchange="show_subjects(this.value)"  style="float:left;">
                                		<option value="" selected >select a class</option>
                                        <option value="1">Class Senior One</option>
                                        <option value="2">Class Senior Two</option>
                                        <option value="3">Class Senior Three </option>
                                        <option value="4">Class Senio Four</option>
                                        <option value="5">Class Senoir Five</option>
                                        <option value="6">Class Senior Six</option>
                                        <option value="7">Class Senior 6A</option>
                             </select>
                        </td>
                        <td>
							                                
                                <select name="temp" id="subject_id_1" style="display:none;" class="form-control"  style="float:left;" >
                                  
                                    	<option value="" selected="selected" >Subject of class Senior One</option>
                                        <option value="1">English</option>
                                        <option value="2">History</option>
                                        <option value="3">Geography</option>
                                        <option value="4">Mathematics</option>
                                        <option value="5">Physics</option>
                                        <option value="6">Chemistry</option>
                                        <option value="7">Biology</option>
                                        <option value="8">Commerce</option>
                                </select> 
                                                            
                                <select name="subject_id" id="subject_id_2" style="display:block;" class="form-control"  style="float:left;" >
                                  
                                    <option value="">Subject of class Senior Two</option>
                                </select> 
                                                            
                                <select name="temp" id="subject_id_3" style="display:none;" class="form-control"  style="float:left;">
                                  
                                    <option value="">Subject of class Senior Three </option>
                                </select> 
                                                            
                                <select name="temp" id="subject_id_4" style="display:none;" class="form-control"  style="float:left;">
                                  
                                    <option value="">Subject of class Senio Four</option>
                                 </select> 
                                                            
                                <select name="temp" id="subject_id_5" style="display:none;" class="form-control"  style="float:left;">
                                    <option value="">Subject of class Senoir Five</option>
                                </select> 
                                                            
                                <select name="temp"id="subject_id_6"  style="display:none;" class="form-control"  style="float:left;">
                                  
                                    <option value="">Subject of class Senior Six</option>
                                </select> 
                                                            
                                <select name="temp" id="subject_id_7" style="display:none;" class="form-control"  style="float:left;">
                                  
                                    <option value="">Subject of class Senior 6A</option>
                                </select> 
                                                        
                            
                            <select name="temp" id="subject_id_0" style="display:none;" class="form-control" style="float:left;">
                                    <option value="">Select a class first</option>
                            </select>
                        </td>
                        <td>
                        	<input type="hidden" name="operation" value="selection" />
                    		<input type="submit" value="manage marks" class="btn btn-info" />
                        </td>
                	</tr>
                </table>
                </form>
                </center>
                
                
                <br /><br />
                
                
                    <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <td>student</td>
                            <td>mark obtained(out of 100)</td>
                            <td>attendance</td>
                            <td>comment</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    	
                                             </tbody>
                  </table>
            
            			</div>
            <!----TABLE LISTING ENDS--->
            
		</div>
	</div>
</div>

<script type="text/javascript">
  function show_subjects(class_id)
  {
      for(i=0;i<=100;i++)
      {

          try
          {
              document.getElementById('subject_id_'+i).style.display = 'none' ;
	  		  document.getElementById('subject_id_'+i).setAttribute("name" , "temp");
          }
          catch(err){}
      }
      document.getElementById('subject_id_'+class_id).style.display = 'block' ;
	  document.getElementById('subject_id_'+class_id).setAttribute("name" , "subject_id");
  }

</script>
</body>
</html>
