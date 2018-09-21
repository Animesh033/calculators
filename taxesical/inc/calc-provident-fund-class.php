<?php
// Provident Fund Calculation
function cal_pf() { 
	?>
	<style>
		.pf{
			border: 1px solid #e2e2e2;
		    /*width: 550px;*/
		    height: auto;
		    border-radius: 8px;
		    padding: 10px 20px;
		    box-shadow: 1px 2px 4px #e6e6e6;
		}
		.pf input[type="text"]{
			outline: none;
		}
		
		#basic_salary{
			width: 100px;
		}
		table{
			border: 1px solid #ccc;
			width: 100%;
			height: 198px;
			box-shadow: 1px 2px 4px #e6e6e6;
		}
		#greater_than_10{
			display: none;
		}
		.shown{
			display: block;
		}
		.hidden{
			display: none;
		}
		@media only screen and (max-width: 768px){
			table{
				overflow: auto;
				width: 100%;
			}
		}
	</style>
	<br>
	
	<div class="pf">
		<form method="post" action="">
		<div class="conatiner">
			<fieldset>
			  <label>No. of employees in your organisation is Greater than or Equal to 20<span style="color: red;"> * </span></label>
			  <div class="form-group">
			    <div class="custom-control custom-radio">
			      <input type="radio" id="g-10" name="noe" <?php echo ((isset($_POST['noe']) && $_POST['noe'] == "greater-10") ? "checked" : "")?> value="greater-10" class="custom-control-input" onclick="show_form();">
			      <label class="custom-control-label" for="g-10">Yes</label>
			    </div>
			    <div class="custom-control custom-radio">
			      <input type="radio" id="l-10" name="noe"<?php echo ((isset($_POST['noe']) && $_POST['noe'] == "less-10") ? "checked" : "")?> value="less-10" class="custom-control-input" onclick="hide_form();">
			      <label class="custom-control-label" for="l-10">No</label>
			    </div>
			  </div>
			</fieldset>
		</div>
		<div class="conatiner" >
			<fieldset id="greater_than_10y" style="display: none;">
			  <label>Has Your Establishment Obtained Volentary Registration<span style="color: red;"> * </span></label>
			  <div class="form-group">
			    <div class="custom-control custom-radio">
			      <input type="radio" id="g-10y" name="noee" <?php echo ((isset($_POST['noee']) && $_POST['noee'] == "greater-10y") ? "checked" : "")?> value="greater-10y" class="custom-control-input" onchange="show_form2();">
			      <label class="custom-control-label" for="g-10y">Yes</label>
			    </div>
			    <div class="custom-control custom-radio">
			      <input type="radio" id="l-10n" name="noee" value="less-10n" <?php echo ((isset($_POST['noee']) && $_POST['noee'] == "less-10n") ? "checked" : "")?> class="custom-control-input" onchange="hide_form2();">
			      <label class="custom-control-label" for="l-10n">No</label>
			    </div>
			  </div>
			</fieldset>
			
		</div>
			<div class="container-fluid" id="greater_than_10">
				
				<div class="row">
					
					<div class="col-md-4">
						<fieldset>
							<label>Residentship Status <span style="color: red;">*</span></label>
							  <div class="form-group">
							    <select class="custom-select" name="residentship" id="residentship" required="required">
							      <!-- <option value="" title="Select Residentship Status">Residentship Status</option> -->
							      <option value="indian" <?php echo ((isset($_POST['residentship']) && $_POST['residentship'] == "indian") ? "selected" : "")?>>Indian</option>
							      <option value="others" <?php echo ((isset($_POST['residentship']) && $_POST['residentship'] == "others") ? "selected" : "")?>>Others</option>
							    </select>
							  </div>  
						</fieldset>

					</div>
					<div class="col-md-4">
						<div class="form-group">
						  	<label class="control-label">Date of First Contribution<span style="color: red;"> * </span></label>
						  	<div class="form-group" style="">
						    	<div class="input-group mb-3">
						      		<input id="dofc"  name="dofc" value="<?php echo $_POST['dofc']; ?>" class="form-control" placeholder="dd-mm-yyyy" required="required" autocomplete="off" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}" title="Date format is dd-mm-yyyy.">
						        </div>
						  </div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						  	<label class="control-label">Basic Salary <span style="color: red;"> * </span></label>
						  	<div class="form-group" style="">
						    	<div class="input-group mb-3">
						      		<input type="text" id="basic_salary" name="basic_salary" value="<?php echo $_POST['basic_salary']; ?>" placeholder="Basic Salary" class="form-control" required="required" autocomplete="off" pattern="^\d{0,}(\.\d{1,})?$" title="Enter positive number only.">
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
		</div>

			</form>
			
				<br>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- latest one datepicker-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- ui picker-->
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
	jQuery(function($){
	    $('#dofc').datepicker({
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
				yearRange: "2000: "
	        });
	});
</script>
		<script>

			function validate(){
				var res = document.getElementById('dofc').value;
				if(res == null || res == undefined){
						alert('Please enter Date of first contribution.');
				}
			}
			function clearform()
			{
			    document.getElementById("basic_salary").value=""; //don't forget to set the textbox id
			    document.getElementById("dofc").value="";
			    document.getElementById("residentship").value = "indian";
			    document.getElementById("yes").checked = false;
			    document.getElementById("no").checked = false;
			    
			}
			function show_form(){
				 document.getElementById('greater_than_10').style.display = 'block';
				 document.getElementById('greater_than_10y').style.display = 'none';
				 document.getElementById('out_for_l-10').style.display = 'none';
				document.getElementById('greater_than_10y').checked = false;

			}

			function hide_form(){
				document.getElementById('greater_than_10').style.display = 'none';
				 document.getElementById('greater_than_10y').style.display = 'block';
				document.getElementById('out_for_l-10').style.display = 'none';
				document.getElementById('g-10y').checked = false;
				document.getElementById('l-10n').checked = false;
			} 
			function show_form2(){
				 document.getElementById('greater_than_10').style.display = 'block';
				 document.getElementById('greater_than_10y').style.display = 'block';
				 document.getElementById('out_for_l-10').style.display = 'none';
				
			}

			function hide_form2(){
				document.getElementById('greater_than_10').style.display = 'none';
				 document.getElementById('greater_than_10y').style.display = 'block';
				document.getElementById('out_for_l-10').style.display = 'block';
				document.getElementById('out_for_l-10').innerHTML = '<div class="card mb-3 text-center" style=" text-align:justify;"><div class="card-body"><h4 class="card-title"></h4><p class="card-text"><b>Provident Fund is not applicable for your Organisation.</b></p></div></div>';
			} 

		</script>
	<?php
	if(isset($_POST['calculate'])){
		if($_POST['noe'] == 'greater-10'){
			echo "
			<script>
				document.getElementById('greater_than_10').style.display = 'block';
			</script>
			";
		}
		else{
			echo "
			<script>
				document.getElementById('greater_than_10').style.display = 'block';
				document.getElementById('greater_than_10y').style.display = 'block';
			</script>
			";
			
		}
	}
	
	$no_of_employee = $_POST['noe'];
	$residentship_status = $_POST['residentship'];
	$dofc = $_POST['dofc'];
	$basic_salary = $_POST['basic_salary'];
	$D1 = date('Y-m-d', strtotime('01-09-2014') );
	$D2 = date('Y-m-d', strtotime($dofc) );
	$Date1 = $D1;
	$Date2 = $D2;
		if ($residentship_status == "indian") {
			
			if($Date2 < $Date1) {
		        if ($basic_salary <= 15000) {
		        	// For Employee 
		        	$employee_epf = $basic_salary*0.12;
		        	// For Employeer
		        	$employer_eps = $basic_salary*0.0833;
		        	$employer_epf = $basic_salary*0.0367;

		        	$trust_employee_epf = $employee_epf;
		        	$trust_employer_eps = $employer_eps;
		        	$trust_employer_epf = $employer_epf;

		        	$normal_employer_eps = $employer_eps;  
					$normal_employer_epf = $employer_epf; 
					$normal_employee_epf = $employee_epf; 


		        	return '<div style="overflow-x:auto;"><table class="table table-hover" style="text-align: left;" border="1" cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="9" rowspan="1" style="vertical-align: top;"><b>Residentship Status-Indian</b><br>
</td>
</tr>
<tr align="center">
<td colspan="9" rowspan="1" style="vertical-align: top;"><b>Date of first contribution: '.$dofc.' and Basic Salary: Rs.'.$basic_salary.'</b><br>
</td>
</tr>

<tr>
<td colspan="3" rowspan="1"
style="vertical-align: top; text-align: center;">Capped Wages(Limited
To RS. 15,000)<br>
</td>
<td colspan="3" rowspan="1"
style="vertical-align: top; text-align: center;">Normal Wages(Without
Capping)<br>
</td>
<td colspan="3" rowspan="1"
style="vertical-align: top; text-align: center;">Trust Account<br>
</td>
</tr>
<tr>
<td colspan="2" rowspan="1"
style="vertical-align: top; text-align: center;">Employer<br>
</td>
<td style="vertical-align: top; text-align: center;">Employee<br>
</td>
<td colspan="2" rowspan="1"
style="vertical-align: top; text-align: center;">Employer<br>
</td>
<td style="vertical-align: top; text-align: center;">Employee<br>
</td>
<td colspan="2" rowspan="1"
style="vertical-align: top; text-align: center;">Employer<br>
</td>
<td style="vertical-align: top; text-align: center;">Employee<br>
</td>
</tr>
<tr>
<td style="vertical-align: top; text-align: center;">EPS(8.33%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPF(3.67%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPF(12%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPS(8.33%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPF(3.67%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPF(12%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPS(8.33%)<br>
</td>
<td style="vertical-align: top; text-align: center;">Trust(3.67%)<br>
</td>
<td style="vertical-align: top; text-align: center;">Trust(12%)<br>
</td>
</tr>
<tr>
<td style="vertical-align: top; text-align: center;">NA<br>
</td>
<td style="vertical-align: top; text-align: center;">NA<br>
</td>
<td style="vertical-align: top; text-align: center;">NA<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$normal_employer_eps, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$normal_employer_epf, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$normal_employee_epf, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$trust_employer_eps, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$trust_employer_epf, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$trust_employee_epf, 2, '.', '').'<br>
</td>
</tr>
</tbody>
</table></div>';
		        }
		        elseif ($basic_salary > 15000) { //For Normal Wages
		        	$basic_salary_max = 15000;
		        	$capped_employee_epf = $basic_salary_max*0.12;
		        	$capped_employer_eps = $basic_salary_max*0.0833;
		        	$capped_employer_epf = $basic_salary_max*0.0367;

		        	// For Employee 
		        	$normal_employee_epf = $basic_salary*0.12;
		        	// For Employeer
		        	$normal_employer_eps = $basic_salary*0.0833;
		        	$normal_employer_epf = $basic_salary*0.0367;

		        	$trust_employer_eps = $normal_employer_eps;
					$trust_employer_epf = $normal_employer_epf;
					$trust_employee_epf = $normal_employee_epf;


		        	return '<div style="overflow-x:auto;"><table class="table table-hover" style="text-align: left; width: 100%;" border="1" cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="9" rowspan="1" style="vertical-align: top;"><b>Residentship Status-Indian</b><br>
</td>
</tr>
<tr align="center">
<td colspan="9" rowspan="1" style="vertical-align: top;"><b>Date of first contribution: '.$dofc.' and Basic Salary: Rs.'.$basic_salary.'</b><br>
</td>
</tr>
<tr>
<td colspan="3" rowspan="1"
style="vertical-align: top; text-align: center;">Capped Wages(Limited
To RS. 15,000)<br>
</td>
<td colspan="3" rowspan="1"
style="vertical-align: top; text-align: center;">Normal Wages(Without
Capping)<br>
</td>
<td colspan="3" rowspan="1"
style="vertical-align: top; text-align: center;">Trust Account<br>
</td>
</tr>
<tr>
<td colspan="2" rowspan="1"
style="vertical-align: top; text-align: center;">Employer<br>
</td>
<td style="vertical-align: top; text-align: center;">Employee<br>
</td>
<td colspan="2" rowspan="1"
style="vertical-align: top; text-align: center;">Employer<br>
</td>
<td style="vertical-align: top; text-align: center;">Employee<br>
</td>
<td colspan="2" rowspan="1"
style="vertical-align: top; text-align: center;">Employer<br>
</td>
<td style="vertical-align: top; text-align: center;">Employee<br>
</td>
</tr>
<tr>
<td style="vertical-align: top; text-align: center;">EPS(8.33%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPF(3.67%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPF(12%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPS(8.33%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPF(3.67%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPF(12%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPS(8.33%)<br>
</td>
<td style="vertical-align: top; text-align: center;">Trust(3.67%)<br>
</td>
<td style="vertical-align: top; text-align: center;">Trust(12%)<br>
</td>
</tr>
<tr>
<td style="vertical-align: top; text-align: center;">NA<br>
</td>
<td style="vertical-align: top; text-align: center;">NA<br>
</td>
<td style="vertical-align: top; text-align: center;">NA<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$normal_employer_eps, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$normal_employer_epf, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$normal_employee_epf, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$trust_employer_eps, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$trust_employer_epf, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$trust_employee_epf, 2, '.', '').'<br>
</td>
</tr>
</tbody>
</table></div>';
		        }
		        

		    }
		    else if($Date2 >=$Date1) {
		        // echo 'Dofc is after 2014-09-01';
		        // For Capped Wages
		        if ($basic_salary <= 15000) {
		        	// For Employee 
		        	$employee_epf = $basic_salary*0.12;
		        	// For Employeer
		        	$employer_eps = $basic_salary*0.0833;
		        	$employer_epf = $basic_salary*0.0367;

		        	$normal_employer_eps = $employer_eps;  
					$normal_employer_epf = $employee_epf - $employer_eps; 
					$normal_employee_epf = $employee_epf;

					$trust_employee_epf = $normal_employee_epf;
		        	$trust_employer_eps = $normal_employer_eps;
		        	$trust_employer_epf = $normal_employer_epf;

		        	return '<div style="overflow-x:auto;"><table class="table table-hover" style="text-align: left; width: 100%;" border="1" cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="9" rowspan="1" style="vertical-align: top;"><b>Residentship Status-Indian</b><br>
</td>
</tr>
<tr align="center">
<td colspan="9" rowspan="1" style="vertical-align: top;"><b>Date of first contribution: '.$dofc.' and Basic Salary: Rs.'.$basic_salary.'</b><br>
</td>
</tr>
<tr>
<td colspan="3" rowspan="1"
style="vertical-align: top; text-align: center;">Capped Wages(Limited
To RS. 15,000)<br>
</td>
<td colspan="3" rowspan="1"
style="vertical-align: top; text-align: center;">Normal Wages(Without
Capping)<br>
</td>
<td colspan="3" rowspan="1"
style="vertical-align: top; text-align: center;">Trust Account<br>
</td>
</tr>
<tr>
<td colspan="2" rowspan="1"
style="vertical-align: top; text-align: center;">Employer<br>
</td>
<td style="vertical-align: top; text-align: center;">Employee<br>
</td>
<td colspan="2" rowspan="1"
style="vertical-align: top; text-align: center;">Employer<br>
</td>
<td style="vertical-align: top; text-align: center;">Employee<br>
</td>
<td colspan="2" rowspan="1"
style="vertical-align: top; text-align: center;">Employer<br>
</td>
<td style="vertical-align: top; text-align: center;">Employee<br>
</td>
</tr>
<tr>
<td style="vertical-align: top; text-align: center;">EPS(8.33%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPF(3.67%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPF(12%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPS(8.33%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPF(3.67%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPF(12%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPS(8.33%)<br>
</td>
<td style="vertical-align: top; text-align: center;">Trust(3.67%)<br>
</td>
<td style="vertical-align: top; text-align: center;">Trust(12%)<br>
</td>
</tr>
<tr>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$employer_eps, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$employer_epf, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$employee_epf, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$normal_employer_eps, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$normal_employer_epf, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$normal_employee_epf, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$trust_employer_eps, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$trust_employer_epf, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$trust_employee_epf, 2, '.', '').'<br>
</td>
</tr>
</tbody>
</table></div>';
		        }
		        elseif ($basic_salary > 15000) { //For Normal Wages
		        	$basic_salary_max = 15000;
		        	$capped_employee_epf = $basic_salary_max*0.12;
		        	$capped_employer_eps = $basic_salary_max*0.0833;
		        	$capped_employer_epf = $basic_salary_max*0.0367;

		        	// For Employee 
		        	$normal_employee_epf = $basic_salary*0.12;
		        	// For Employeer
		        	$normal_employer_eps = $basic_salary_max*0.0833;
		        	$normal_employer_epf = $normal_employee_epf - $normal_employer_eps;

		        	$trust_employer_eps = $normal_employer_eps;
					$trust_employer_epf = $normal_employer_epf;
					$trust_employee_epf = $normal_employee_epf;


		        	return '<div style="overflow-x:auto;"><table class="table table-hover" style="text-align: left; width: 100%;" border="1" cellpadding="2" cellspacing="2">
<tbody>
<tr align="center">
<td colspan="9" rowspan="1" style="vertical-align: top;"><b>Residentship Status-Indian</b><br>
</td>
</tr>
<tr align="center">
<td colspan="9" rowspan="1" style="vertical-align: top;"><b>Date of first contribution: '.$dofc.' and Basic Salary: Rs.'.$basic_salary.'</b><br>
</td>
</tr>
<tr>
<td colspan="3" rowspan="1"
style="vertical-align: top; text-align: center;">Capped Wages(Limited
To RS. 15,000)<br>
</td>
<td colspan="3" rowspan="1"
style="vertical-align: top; text-align: center;">Normal Wages(Without
Capping)<br>
</td>
<td colspan="3" rowspan="1"
style="vertical-align: top; text-align: center;">Trust Account<br>
</td>
</tr>
<tr>
<td colspan="2" rowspan="1"
style="vertical-align: top; text-align: center;">Employer<br>
</td>
<td style="vertical-align: top; text-align: center;">Employee<br>
</td>
<td colspan="2" rowspan="1"
style="vertical-align: top; text-align: center;">Employer<br>
</td>
<td style="vertical-align: top; text-align: center;">Employee<br>
</td>
<td colspan="2" rowspan="1"
style="vertical-align: top; text-align: center;">Employer<br>
</td>
<td style="vertical-align: top; text-align: center;">Employee<br>
</td>
</tr>
<tr>
<td style="vertical-align: top; text-align: center;">EPS(8.33%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPF(3.67%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPF(12%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPS(8.33%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPF(3.67%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPF(12%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPS(8.33%)<br>
</td>
<td style="vertical-align: top; text-align: center;">Trust(3.67%)<br>
</td>
<td style="vertical-align: top; text-align: center;">Trust(12%)<br>
</td>
</tr>
<tr>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$capped_employer_eps, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$capped_employer_epf, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$capped_employee_epf, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$normal_employer_eps, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$normal_employer_epf, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$normal_employee_epf, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$trust_employer_eps, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$trust_employer_epf, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$trust_employee_epf, 2, '.', '').'<br>
</td>
</tr>
</tbody>
</table></div>';
		        }
		    }
		    else
		    	return false;

		}
		if ($residentship_status == "others") {
		        	// For Employee 
		        	$employee_epf_other = $basic_salary*0.12;
		        	// For Employeer
		        	$employer_eps_other = $basic_salary*0.0833;
		        	$employer_epf_other = $basic_salary*0.0367;

		        	$trust_employer_eps = $employer_eps_other;
					$trust_employer_epf = $employer_epf_other;
					$trust_employee_epf = $employee_epf_other;
		        	return '<div style="overflow-x:auto;"><table class="table table-hover" style="text-align: left; width: 100%;" border="1" cellpadding="2"
cellspacing="2">
<tbody>
<tr align="center">
<td colspan="9" rowspan="1" style="vertical-align: top;"><b>Residentship Status-Others</b><br>
</td>
</tr>
<tr align="center">
<td colspan="9" rowspan="1" style="vertical-align: top;"><b>Date of first contribution: '.$dofc.' and Basic Salary: Rs.'.$basic_salary.'</b><br>
</td>
</tr>
<tr>
<td colspan="3" rowspan="1"
style="vertical-align: top; text-align: center;">Capped Wages(Limited
To RS. 15,000)<br>
</td>
<td colspan="3" rowspan="1"
style="vertical-align: top; text-align: center;">Normal Wages(Without
Capping)<br>
</td>
<td colspan="3" rowspan="1"
style="vertical-align: top; text-align: center;">Trust Account<br>
</td>
</tr>
<tr>
<td colspan="2" rowspan="1"
style="vertical-align: top; text-align: center;">Employer<br>
</td>
<td style="vertical-align: top; text-align: center;">Employee<br>
</td>
<td colspan="2" rowspan="1"
style="vertical-align: top; text-align: center;">Employer<br>
</td>
<td style="vertical-align: top; text-align: center;">Employee<br>
</td>
<td colspan="2" rowspan="1"
style="vertical-align: top; text-align: center;">Employer<br>
</td>
<td style="vertical-align: top; text-align: center;">Employee<br>
</td>
</tr>
<tr>
<td style="vertical-align: top; text-align: center;">EPS(8.33%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPF(3.67%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPF(12%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPS(8.33%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPF(3.67%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPF(12%)<br>
</td>
<td style="vertical-align: top; text-align: center;">EPS(8.33%)<br>
</td>
<td style="vertical-align: top; text-align: center;">Trust(3.67%)<br>
</td>
<td style="vertical-align: top; text-align: center;">Trust(12%)<br>
</td>
</tr>
<tr>
<td style="vertical-align: top; text-align: center;">NA<br>
</td>
<td style="vertical-align: top; text-align: center;">NA<br>
</td>
<td style="vertical-align: top; text-align: center;">NA<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$employer_eps_other, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$employer_epf_other, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$employee_epf_other, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$trust_employer_eps, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$trust_employer_epf, 2, '.', '').'<br>
</td>
<td style="vertical-align: top; text-align: center;">Rs.'.number_format((float)$trust_employee_epf, 2, '.', '').'<br>
</td>
</tr>
</tbody>
</table></div>';
		}
		
}
add_action( 'hook-pf', 'cal_pf');
add_shortcode('PF', 'cal_pf');
// do_action( 'hook-pf');