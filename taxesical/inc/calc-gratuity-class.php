<?php
function get_gratuity(){
?>
<style>
sup{
	top: 0;
}
sub{
	bottom:0;
}
span.frac {
  display: inline-block;
  text-align: center;
  vertical-align: middle;
}
span.frac > sup, span.frac > sub {
  display: block;
  font: inherit;
  padding: 0 0.3em;
}
span.frac > sup {border-bottom: 0.08em solid;}
span.frac > span {display: none;}

/*-----/for 15/26----*/

	.gratuity_form, .card{
		border: 1px solid #e2e2e2;
		    /*width: 550px;*/
		    height: auto;
		    border-radius: 8px;
		    padding: 10px 20px;
		    box-shadow: 1px 2px 4px #e6e6e6;
	}
	.form-group input[type="text"]{
		width: 100%;
	}
	#gs{
		width: 10px;
	}
	#greater_than_10{
			display: none;
		}
	/* Portrait and Landscape */
@media screen
  and (device-height: 320px) 
  and (-webkit-device-pixel-ratio: 2) {
	.form-group input[type="text"]{
		width: 50%;
	}
}
</style>
<div class="gratuity_form">
	<form method="POST" action="" name="gra-form">
		<div class="conatiner">
			<fieldset>
			  <label>No. of employees in your organisation is Greater than or Equal to 10<span style="color: red;"> * </span></label>
			  <div class="form-group">
			    <div class="custom-control custom-radio">
			      <input type="radio" id="g-10" name="noe" value="greater-10" <?php echo ((isset($_POST['noe']) && $_POST['noe'] == "greater-10") ? "checked" : "")?> class="custom-control-input" onclick="show_form();" required="required">
			      <label class="custom-control-label" for="g-10">Yes</label>
			    </div>
			    <div class="custom-control custom-radio">
			      <input type="radio" id="l-10" name="noe" value="less-10" <?php echo ((isset($_POST['noe']) && $_POST['noe'] == "less-10") ? "checked" : "")?> class="custom-control-input" onclick="hide_form();" required="required">
			      <label class="custom-control-label" for="l-10">No</label>
			    </div>
			  </div>
			</fieldset>
		</div>
		<div class="container" id="greater_than_10">
			<div class="row">
				<div class="col-md-3">
					<fieldset>
					  <label>Gratuity <span style="color: red;"> * </span></label>
					  <div class="form-group">
					    <div class="custom-control custom-radio">
					      <input type="radio" id="sg" name="type_of_gratuity" value="sg" <?php echo ((isset($_POST['type_of_gratuity']) && $_POST['type_of_gratuity'] == "sg") ? "checked" : "")?> class="custom-control-input"  required="required" onclick="change_label2();">
					      <label class="custom-control-label" for="sg">Service Gratuity</label>
					    </div>
					    <div class="custom-control custom-radio">
					      <input type="radio" id="dg" name="type_of_gratuity" value="dg" <?php echo ((isset($_POST['type_of_gratuity']) && $_POST['type_of_gratuity'] == "dg") ? "checked" : "")?> class="custom-control-input"  required="required" onclick="change_label();">
					      <label class="custom-control-label" for="dg">Death Gratuity</label>
					    </div>
					  </div>

					</fieldset>
		</div>
		<div class="col-md-3">
			<div class="form-group">
			  <label class="col-form-label" for="doj" id="l_doj">Date of Joining<span style="color: red;"> * </span></label>
			  <input class="form-control" type="text" onblur="validate()" name="doj" value="<?php echo $_POST['doj'];?>" id="doj" placeholder="dd-mm-yyyy" required="required" autocomplete="off" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}" title="Date format is dd-mm-yyyy.">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
			  <label class="col-form-label" for="dol" id="l_dol"><?php echo ((isset($_POST['type_of_gratuity']) && $_POST['type_of_gratuity'] == "dg") ? "Date of Death" : "Date of Leaving")?><span style="color: red;"> * </span></label>
			  <input class="form-control"  type="text" onblur="validate()" name="dol" value="<?php echo $_POST['dol'];?>" id="dol" placeholder="dd-mm-yyyy" required="required" autocomplete="off" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}" title="Date format is dd-mm-yyyy.">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
			  	<label class="control-label" style="margin-top: 6px;">Basic salary+DA<span style="color: red;"> * </span></label>
			  	<div class="form-group" style="width: 150px;">
			    	<div class="input-group mb-3">
			      		<input type="text" id="gs" name="basic_salary_da" value="<?php echo $_POST['basic_salary_da'];?>" placeholder="Basic Salary+DA(Rs./Month)" class="form-control" aria-label="Amount (to the nearest dollar)" required="required" autocomplete="off" pattern="^\d{0,}(\.\d{1,})?$" title="Enter positive number only!">
			        </div>
			  </div>
			</div>
		</div>
			</div>
			<div class="text-center">
				<button type="submit" name="calculate" class="btn btn-outline-info" value="Calculate">Calculate</button>
			<button type="button" class="btn btn-outline-info" onclick="clearform();" value="Reset">Reset</button>
		</div>
		</div>
		<div id="out_for_l-10" ></div>
	</form>
</div><br>
	<div class="gratuity card mb-3 " id="info">
			<div class="info" >Gratuity Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis deleniti eos aut recusandae, quam perferendis soluta cumque ratione ad, repudiandae laudantium! Unde numquam fuga ullam nihil saepe voluptatum at, quaerat.</div>
		</div>
	<!-- latest one -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- ui -->
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
	jQuery(function($){
	    $("#doj").datepicker({
            dateFormat: "dd-mm-yy",
            autoclose: true,
	            todayHighlight: true,
		        showOtherMonths: true,
		        selectOtherMonths: true,
		        autoclose: true,
		        changeMonth: true,
		        changeYear: true,
		        orientation: "button",
            maxDate: 0,
            yearRange: "1970: ",
          
            onSelect: function (date) {
                var date2 = $('#doj').datepicker('getDate');
                date2.setDate(date2.getDate() + 1);
                // $('#dol').datepicker('setDate', date2);
                //sets minDate to dt1 date + 1
                $('#dol').datepicker('option', 'minDate', date2);
            }
        });
        $('#dol').datepicker({
            dateFormat: "dd-mm-yy",
            autoclose: true,
	            todayHighlight: true,
		        showOtherMonths: true,
		        selectOtherMonths: true,
		        autoclose: true,
		        changeMonth: true,
		        changeYear: true,
		        orientation: "button",
            maxDate: 0,
            yearRange: "1900: ",
            onClose: function () {
                var dt1 = $('#doj').datepicker('getDate');
                // console.log(dt1);
                var dt2 = $('#dol').datepicker('getDate');
                if (dt2 <= dt1) {
                    var minDate = $('#dol').datepicker('option', 'minDate');
                    $('#dol').datepicker('setDate', minDate);
                }
            }
        });
	});

	function clearform()
	{
	    document.getElementById("gs").value=""; //don't forget to set the textbox id
	    document.getElementById("doj").value = "";
	    document.getElementById("dol").value = "";
	    document.getElementById("sg").checked = false;
	    document.getElementById("dg").checked = false;
	}
	function change_label(){
		if (document.getElementById("dg").checked = true) {
			document.getElementById('l_dol').innerHTML = 'Date of Death<span style="color: red;"> * </span>';
		}
	}
	function change_label2(){
		if (document.getElementById("sg").checked = true) {
			document.getElementById('l_dol').innerHTML = 'Date of Leaving<span style="color: red;"> * </span>';
		}
	}
	function show_form(){
				 document.getElementById('greater_than_10').style.display = 'block';
				 document.getElementById('out_for_l-10').style.display = 'none';
			}
			function hide_form(){
				document.getElementById('greater_than_10').style.display = 'none';
				document.getElementById('out_for_l-10').style.display = 'block';
				document.getElementById('out_for_l-10').innerHTML = '<div class="card mb-3 text-center" style=" text-align:justify;"><div class="card-body"><h4 class="card-title"></h4><p class="card-text"><b>Gratuity is not applicable for your Organisation.</b></p></div></div>';
			}
function validate(){
	var doj = document.getElementById('doj').value;
	var dol = document.getElementById('dol').value;
}			
</script>
<?php
if(isset($_POST['calculate'])){
		echo "<script>document.getElementById('greater_than_10').style.display = 'block';</script>";
	}
		$option = $_POST['type_of_gratuity'];
		$basic_salary_da = $_POST['basic_salary_da'];
		$sDate = $_POST['doj'];
		$eDate = $_POST['dol'];
		$startDate =  date('Y-m-d', strtotime($sDate)); 
		$endDate =  date('Y-m-d', strtotime($eDate));
		$yos = round((strtotime($eDate )-strtotime($sDate))/(3600*24*365.25));
		$datetime1 = date_create($startDate);
	    $datetime2 = date_create($endDate);
	    $interval = date_diff($datetime1, $datetime2);
	    $years = $interval->format('%y');
	    $months = $interval->format('%m');
	    $days = $interval->format('%d'); 
	    if(!empty($basic_salary_da && $startDate && $endDate)){
	    	if($option == "sg"){
		    	if($yos>=5){
			    	$gratuity = round(($basic_salary_da)*($yos)*15/26);
			    	if($gratuity<= 2000000){
		  	echo '<script>document.getElementById("info").style.display="none";</script>';

			    		return '<br><table class="table table-hover">
								  <thead>
								    <tr>
								      <th scope="col">Type</th>
								      <th scope="col">Date Of Joining</th>
								      <th scope="col">Date Of Leaving</th>
								      <th scope="col">Basic salary + DA</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr class="table-active">
								      <th scope="row">Service Gratuity</th>
								      <td>'.$sDate.'</td>
								      <td>'.$eDate.'</td>
								      <td>Rs. '.$basic_salary_da.'</td>
								    </tr>    
								  </tbody>
								</table> 
								<div class="card mb-3" style="">  
								  <div class="card-body">
								  	<p class="card-text"><b>No. of years of service: '.$yos.'</b></p>
								    <p class="card-title"><b>Gratuity: '.$basic_salary_da.' <span style="font-size: 19px;">&#10799;</span> '.$yos.' <span style="font-size: 19px;">&#10799; </span><span class="frac"><sup>15</sup><span>&frasl;</span><sub>26</sub></span> = Rs.'.$gratuity.'</p></b></p>
								    <p class="card-text"><b>In case of service gratuity 4.5 years of service is sufficient to claim the gratuity.</b></p>
								  </div>
								</div>';
			    	}
			    	else{
		  	echo '<script>document.getElementById("info").style.display="none";</script>';

			    		return '<br><table class="table table-hover">
								  <thead>
								    <tr>
								      <th scope="col">Type</th>
								      <th scope="col">Date Of Joining</th>
								      <th scope="col">Date Of Leaving</th>
								      <th scope="col">Basic salary + DA</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr class="table-active">
								      <th scope="row">Service Gratuity</th>
								      <td>'.$sDate.'</td>
								      <td>'.$eDate.'</td>
								      <td>Rs. '.$basic_salary_da.'</td>
								    </tr>  
								  </tbody>
								</table>
								<div class="card mb-3" style=""> 
								<div class="card-body">
								  	<p class="card-text"><b>No. of years of service: '.$yos.'</b></p>
								    <p class="card-title"><b>Gratuity: '.$basic_salary_da.' <span style="font-size: 19px;">&#10799;</span> '.$yos.' <span style="font-size: 19px;">&#10799; </span><span class="frac"><sup>15</sup><span>&frasl;</span><sub>26</sub></span> = Rs.'.$gratuity.'</p></b></p>
								    <p class="card-text"><b>In case of service gratuity 4.5 years of service is sufficient to claim the gratuity.</b></p>
								    <p class="card-text"><b>Ceiling of tax free service gratuity is 20L. However if the service gratuity amount exceeds 20L, the additional amount will be subject to income tax on legally specified rates.</b></p>
								  </div>
								</div>';
			    	}
			    }
			    else{
		  	echo '<script>document.getElementById("info").style.display="none";</script>';
			    	return '<br><table class="table table-hover">
							  <thead>
							    <tr>
							      <th scope="col">Type</th>
							      <th scope="col">Date Of Joining</th>
							      <th scope="col">Date Of Leaving</th>
							      <th scope="col">Basic salary + DA</th>
							    </tr>
							  </thead>
							  <tbody>
							    <tr class="table-active">
							      <th scope="row">Service Gratuity</th>
							      <td>'.$sDate.'</td>
							      <td>'.$eDate.'</td>
							      <td>Rs. '.$basic_salary_da.'</td>
							    </tr>
							    
							  </tbody>
							</table>
							<div class="card mb-3" style="">
								  
								  <div class="card-body">
								  	<p class="card-text"><b>No. of years of service: '.$yos.'</b></p>
								    <p class="card-text" style="color:red;"><b>You are presently not eligible for service gratuity.</b></p>
								    <p class="card-text"><b>In case of service gratuity minimum 4.5 years of service is required to claim the gratuity.</b></p>
								  </div>
								</div>';
			    }
		    }
		    if($option == "dg"){
		    	if ($yos>=1) {
		    		$gratuity = round(($basic_salary_da)*($yos)*15/26);
			    	if($gratuity<= 2000000){
		  	echo '<script>document.getElementById("info").style.display="none";</script>';

			    		return '<br><table class="table table-hover">
								  <thead>
								    <tr>
								      <th scope="col">Type</th>
								      <th scope="col">Date Of Joining</th>
								      <th scope="col">Date Of Death</th>
								      <th scope="col">Basic salary + DA</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr class="table-active">
								      <th scope="row">Death Gratuity</th>
								      <td>'.$sDate.'</td>
								      <td>'.$eDate.'</td>
								      <td>Rs. '.$basic_salary_da.'</td>
								    </tr>    
								  </tbody>
								</table>
								<div class="card mb-3" style=""> 
								  <div class="card-body">
								  	<p class="card-text"><b>No. of years of service: '.$yos.'</b></p>
								    <p class="card-title"><b>Gratuity: '.$basic_salary_da.' <span style="font-size: 19px;">&#10799;</span> '.$yos.' <span style="font-size: 19px;">&#10799; </span><span class="frac"><sup>15</sup><span>&frasl;</span><sub>26</sub></span> = Rs.'.$gratuity.'</p></b></p>
								    <p class="card-text"><b>In case of death gratuity 6 months of service is sufficient to claim the gratuity.</b></p>
								  </div>
								</div>';
			    	}
			    	else{
		  	echo '<script>document.getElementById("info").style.display="none";</script>';

			    		return '<br><table class="table table-hover">
								  <thead>
								    <tr>
								      <th scope="col">Type</th>
								      <th scope="col">Date Of Joining</th>
								      <th scope="col">Date Of Death</th>
								      <th scope="col">Basic salary + DA</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr class="table-active">
								      <th scope="row">Death Gratuity</th>
								      <td>'.$sDate.'</td>
								      <td>'.$eDate.'</td>
								      <td>Rs. '.$basic_salary_da.'</td>
								    </tr>    
								  </tbody>
								</table>
								<div class="card mb-3" style="">  
								<div class="card-body">
								  	<p class="card-text"><b>No. of years of service: '.$yos.'</b></p>
								    <p class="card-title"><b>Gratuity: '.$basic_salary_da.' <span style="font-size: 19px;">&#10799;</span> '.$yos.' <span style="font-size: 19px;">&#10799; </span><span class="frac"><sup>15</sup><span>&frasl;</span><sub>26</sub></span> = Rs.'.$gratuity.'</p></b></p>
								    <p class="card-text"><b>In case of death gratuity 6 months of service is sufficient to claim the gratuity.</b></p>
								    <p class="card-text"><b>Ceiling of tax free death gratuity is 20L. However if the death gratuity amount exceeds 20L, the additional amount will be subject to income tax on legally specified rates.</b></p>
								  </div>
								</div>';
			    	}
			    	}
			    	else{
		  	echo '<script>document.getElementById("info").style.display="none";</script>';
			    		return '<br><table class="table table-hover">
							  <thead>
							    <tr>
							      <th scope="col">Type</th>
							      <th scope="col">Date Of Joining</th>
							      <th scope="col">Date Of Death</th>
							      <th scope="col">Basic salary + DA</th>
							    </tr>
							  </thead>
							  <tbody>
							    <tr class="table-active">
							      <th scope="row">Death Gratuity</th>
							      <td>'.$sDate.'</td>
							      <td>'.$eDate.'</td>
							      <td>Rs. '.$basic_salary_da.'</td>
							    </tr>
							  </tbody>
							</table>
							<div class="card mb-3" style="">  
							  <div class="card-body">
							  	<p class="card-text"><b>No. of years of service: '.$yos.'</b></p>
							    <p class="card-text" style="color:red;"><b>You are presently not eligible for death gratuity.</b></p>
							    <p class="card-text"><b>In case of death gratuity minimum 6 months of service is required to claim the gratuity.</b></p>
							  </div>
							</div>';
			    	}			    	
			    }
		    }
	    else{
	    	return false;
	    }	
    } 
add_action( 'hook-gratuity', 'get_gratuity');
add_shortcode('GRATUITY', 'get_gratuity');
