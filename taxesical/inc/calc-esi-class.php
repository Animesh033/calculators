<?php
// ESI Calculation
function cal_esi() { 
	?>
	<style>
		.esi{
			border: 1px solid #e2e2e2;
		    /*width: 550px;*/
		    height: auto;
		    border-radius: 8px;
		    padding: 10px 20px;
		    box-shadow: 1px 2px 4px #e6e6e6;
		}
		.esi input[type="text"]{
			outline: none;
		}
		
		#gross_salary{
			width: 100px;
		}
		table{
			border: 1px solid #ccc;
			width: 100%;
			height: auto;
			box-shadow: 1px 2px 4px #e6e6e6;
		}
		#greater_than_10{
			display: none;
		}
	</style>
	<br>
	
	<div class="esi">
		<form method="post" action="" class="">
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
					
					<div class="col-md-4">
						<fieldset>
						  <label>Disability <span style="color: red;"> * </span></label>
						  <div class="form-group">
						    <div class="custom-control custom-radio">
						      <input type="radio" id="yes" name="disability" value="YES" <?php echo ((isset($_POST['disability']) && $_POST['disability'] == "YES") ? "checked" : "")?> class="custom-control-input"  required="required">
						      <label class="custom-control-label" for="yes">Yes</label>
						    </div>
						    <div class="custom-control custom-radio">
						      <input type="radio" id="no" name="disability" value="No" <?php echo ((isset($_POST['disability']) && $_POST['disability'] == "No") ? "checked" : "")?> class="custom-control-input"  required="required">
						      <label class="custom-control-label" for="no">No</label>
						    </div>
						  </div>

						</fieldset>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  	<label class="control-label">Enter your Gross Salary <span style="color: red;"> * </span></label>
						  	<div class="form-group" style="width: 250px;">
						    	<div class="input-group mb-3">
						      		<div class="input-group-prepend">
						        		<span class="input-group-text">Rs</span>
						      		</div>
						      		<input type="text" id="gross_salary" name="gross_salary" value="<?php echo $_POST['gross_salary']; ?>" placeholder="Gross Salary" class="form-control" aria-label="Amount (to the nearest dollar)" required="required" autocomplete="off" pattern="^\d{0,}(\.\d{1,})?$" title="Enter positive number only">
						       		<div class="input-group-append">
						        		<span class="input-group-text">/Month</span>
						      		</div>
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

		</div><br>
<div class="esi" id="info">
	<div class="info" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis deleniti eos aut recusandae, quam perferendis soluta cumque ratione ad, repudiandae laudantium! Unde numquam fuga ullam nihil saepe voluptatum at, quaerat.</div>
</div>
			</form>
			
				<br>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
		    document.querySelector('button type="submit"').addEventListener('click', hideinfo);
		    function hideinfo() {
		        document.getElementById('info').style.display='none';
		        // evt.preventDefault();
		    }
			function clearform()
			{
			    document.getElementById("gross_salary").value=""; //don't forget to set the textbox id
			    document.getElementById("yes").checked = false;
			    document.getElementById("no").checked = false;
			    // document.getElementById("g-10").checked = false;
			    // document.getElementById("l-10").checked = false;
			    // document.getElementById('greater_than_10').style.display = 'none';
			    
			}
			function show_form(){
				 document.getElementById('greater_than_10').style.display = 'block';
				 document.getElementById('out_for_l-10').style.display = 'none';
			}

			function hide_form(){
				document.getElementById('greater_than_10').style.display = 'none';
				document.getElementById('out_for_l-10').style.display = 'block';
				document.getElementById('out_for_l-10').innerHTML = '<div class="card mb-3 text-center" style=" text-align:justify;"><div class="card-body"><h4 class="card-title"></h4><p class="card-text"><b>ESI is not applicable for your Organisation.</b></p></div></div>';
			} 
		</script>	
<?php 
	if(isset($_POST['calculate'])){
		echo "<script>document.getElementById('greater_than_10').style.display = 'block';</script>";
	}
	$no_of_employees = $_POST['noe'];
	$option = $_POST['disability'];
	$gross_salary = $_POST['gross_salary'];
	$more_salary = $_POST['more_salary'];

	// Converting in decimal form
	$number = $gross_salary*0.0175;
	$esi_for_employee = number_format((float)$number, 2, '.', '');
	$number2 = $gross_salary*0.0475;
	$esi_for_employer = number_format((float)$number2, 2, '.', '');

	$number3 = $gross_salary*0.0475;
	$esi_for_goi = number_format((float)$number3, 2, '.', '');



	$add = $esi_for_employee+$esi_for_goi;
	$total = number_format((float)$add, 2, '.', '');

	if(!empty($gross_salary) && $option == 'No'){
		
		if ($gross_salary <= 21000 && $gross_salary >= 2500) {
		  	echo '<script>document.getElementById("info").style.display="none";</script>';
		  	return '<table class="table table-hover">
		  <tbody>
		    <tr class="table-active">
		      <td><p class="text-center">The Below Info is for person <b>with no disabilities</b>, having Gross Salary <b>Rs.'.$gross_salary.'</b> Per Month</p></td>
		      
		    </tr>
		  </tbody>
		</table>
		  	<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col" style="text-align:center"> </th>
		      <th scope="col" style="text-align:center">Percentage</th>
		      <th scope="col" style="text-align:center">Contribution Value</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th scope="row">Employee</th>
		      <td style="text-align:center">1.75</td>
		      <td style="text-align:center">'.$esi_for_employee.'</td>
		    </tr>
		   <tr>
		      <th scope="row">Employer</th>
		      <td style="text-align:center">4.75 </td>
		      <td style="text-align:center">'.$esi_for_employer.'</td>
		    </tr>
		    <tr>
		      <th scope="row">Total</th>
		      <td style="text-align:center"> 6.50 </td>
		      <td style="text-align:center">'.$total.'</td>
		    </tr>
		  </tbody>
		</table>';
		}
		else
			if($gross_salary > 21000){
		  	echo '<script>document.getElementById("info").style.display="none";</script>';


				return '<div class="card mb-3 text-center" style="">
								  <table class="table table-hover">
		  <tbody>
		    <tr class="table-active">
		      <td><p class="text-center">The Below Info is for person <b>with no disabilities</b>, having Gross Salary <b>Rs.'.$gross_salary.'</b> Per Month</p></td>
		      
		    </tr>
		  </tbody>
		</table>
								  <div class="card-body">
								    <p class="card-text"><b>As per <span>ESI Act</span>, your salary exceeds the maximum limit to be covered by <span>ESI Scheme.</b></p>
								  </div>
								</div>';
			}
			else
		  	echo '<script>document.getElementById("info").style.display="none";</script>';
			return '<div class="card mb-3 text-center" style="">
								  <table class="table table-hover">
		  <tbody>
		    <tr class="table-active">
		      <td><p class="text-center">The Belolow Info is for person <b>with no disabilities</b>, having Gross Salary <b>Rs.'.$gross_salary.'</b> Per Month</p></td>
		      
		    </tr>
		  </tbody>
		</table>
								  <div class="card-body">
								    <p class="card-text"><b>As per <span>ESI Act</span>, your minimum salary should be Rs.2500 to be covered by <span>ESI Scheme</span>.</b></p>
								  </div>
								</div>';
	}
	else if(!empty($gross_salary) && $option == ''){
		return 'Please select the disability options.';
	}
	else if(!empty($gross_salary) && $option == 'YES'){
		
		if ($gross_salary >= 2500) {
		  	echo '<script>document.getElementById("info").style.display="none";</script>';
		  	return '<br><div class="result">
		  	<table class="table table-hover">
		  <tbody>
		    <tr class="table-active">
		      <td><p class="text-center">The Below Info is for <b>Physically Challenged</b> person, having Gross Salary <b>Rs.'.$gross_salary.'</b> Per Month</p></td>
		      
		    </tr>
		  </tbody>
		</table>
			  		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col" style="text-align:center"> </th>
		      <th scope="col" style="text-align:center">Percentage</th>
		      <th scope="col" style="text-align:center">Contribution Value</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th scope="row">Employee</th>
		      <td style="text-align:center">1.75</td>
		      <td style="text-align:center">'.$esi_for_employee.'</td>
		    </tr>
		   <tr>
		      <th scope="row">Govt. of India</th>
		      <td style="text-align:center">4.75 </td>
		      <td style="text-align:center">'.$esi_for_goi.'</td>
		    </tr>
		    <tr>
		      <th scope="row">Total</th>
		      <td style="text-align:center"> 6.50 </td>
		      <td style="text-align:center">'.$total.'</td>
		    </tr>
		  </tbody>
		</table>
			  </div>';
		}

		else
		  	echo '<script>document.getElementById("info").style.display="none";</script>';
				return '<div class="card mb-3 text-center" style="">
								  <table class="table table-hover">
		  <tbody>
		    <tr class="table-active">
		      <td><p class="text-center">The Below Info is for <b>Physically Challenged</b> person, having Gross Salary <b>Rs.'.$gross_salary.'</b> Per Month</p></td>
		      
		    </tr>
		  </tbody>
		</table>
								  <div class="card-body">
								    <p class="card-text"><b>As per <span>ESI Act</span>, your minimum salary should be Rs.2500 to be covered by <span>ESI Scheme</span>.</b></p>
								  </div>
								</div>';
	}
	else{
		return false;
	}

} 	
add_shortcode('ESI', 'cal_esi');
add_action( 'hook-esi', 'cal_esi');
// do_action( 'cal_esi');





