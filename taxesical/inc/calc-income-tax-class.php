<?php
// Income & Tax Calculation
function get_income_tax(){
	?>
	<style>
		.income_tax{
	width: 100%;
	border: 1px solid #ccc;
	border-radius: 10px;
	padding:10px 10px;
	box-shadow: 1px 2px 4px #e6e6e6;
}
.box{
	border: 1px solid #ccc;
	border-radius: 5px;
	padding:10px 10px;
	box-shadow: 1px 2px 4px #e6e6e6;
	margin: auto;
    width: 100%;

}
.left p{
	margin: 10px 10px;
	font-weight: bold;
	/*font-size: 14px;*/
	color: #2C3E50;
}
.left{
	float: left;
	margin-right: 3px;
	
}
.right{
	float: right;
	margin-left: 3px;
}
.btn-info{
	position: absolute; right: 250px;
}
.subbox{
	display: none;
	width: 100%;
}
.gains{
	display: inline-block;

}
.tax_paid input[type="text"]{ 
	width:275px;
	/*height: 23px;*/
}
.tax-paid{
	/*margin-top: 20px;
    margin-left: -142px;*/
}
/*.tax_paid td{
	padding: 10px 5px;
}*/
/*.tax_paid_close{
	height: 25px;
	width: 25px;
	border: 1px solid #ccc;
	border-radius: 50%;
	padding: 0px 6px;
	background-color: #fff;

}*/
/*.tax_paid_close:hover{
	cursor: pointer;*/
	.tax_paid table{
		margin-top: 20px;
	    margin-left: -142px;
	    width: 100%;
	    overflow: auto;
	}
}
	</style>
	<form action="" method="post">
		<div class="income_tax ">
		<div class="box clearfix">
			<div class="left"><div class="form-group"><p>Assessment Year</p></div></div>
			<div class="right">
				 <div class="form-group">
    				<select name="year" id="" class="custom-select">
						<option value="">Select</option>
						<option value="">2019-20</option>
						<option value="">2018-19</option>
						<option value="">2017-18</option>
						<option value="">2016-17</option>
					</select>
  				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Tax Payer</p></div>
			<div class="right">
				<div class="form-group">
					<select name="payer" id="" class="custom-select" disabled="disabled" style="cursor: no-drop;">
						<option value="">individual</option>
					</select>
				</div>
				
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Male / Female / Senior Citizen</p></div>
			<div class="right">
				<div class="form-group">
					<select name="select_mfs" id="" class="custom-select">
						<option value="">Male</option>
						<option value="">Female</option>
						<option value="">Senior Citizen</option>
						<option value="">Super Senior Citizen</option>
					</select>
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Residential Status</p></div>
			<div class="right">
				<div class="form-group">
					<select name="select_mfs" id="" class="custom-select">
						<option value="">Resident</option>
						<option value="">Non Resident</option>
						<option value="">Not Odinary Resident</option>
					</select>
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Income from Salary</p></div>
			<div class="right">
				<div class="form-group">
				  <input type="text" class="form-control" placeholder="" id="">
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Income From House Property</p></div>

			<div class="right">
				<div class="btn btn-info" id="income_house_property" style="position: absolute; right: 250px;">Show Details</div>
				<div class="form-group">
				  <input type="text" class="form-control" placeholder="" id="">
				</div>
			</div><br><br>

			<!-- Sub Box for Income From House Property-->
			<div class="subbox" id="inner_income_house_property">
				<div class="container">
					<div class="row">
						<p>a. Interest Paid/Payable on Housing Loan for Current Financial Year<br>
Interest Paid/Payable on Housing Loan</p>
						<div class="col-md-9">1. Interest on Housing Loan</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Income from Self-occupied House Property</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" class="form-control" placeholder="" id="">
							</div>
						</div>
						<p>b. Income from Let-out Property</p>
						<div class="col-md-9">1. Annual Letable Value/Rent Received or Receivable</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">2. Less: Municipal Taxes Paid During the Year</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">3. Less:Unrealized Rent</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">4. Net Annual Value (1-(2+3))</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" class="form-control" placeholder="" id="">
							</div>
						</div>
						<p>Less: Deductions from Net Annual Value</p>
						<div class="col-md-9">i. Standard Deduction @ 30% of Net Annual Value</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">ii. Interest on Housing Loan</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Income from Let-out House Property</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" class="form-control" placeholder="" id="">
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
	<div class="box clearfix">
		<div class="left"><p>Capital Gains</p></div>
		<div class="right">
			<div class="btn btn-info" id="capital_gains">Show Details</div>
			<div class="form-group">
			  <input type="text" value="0" class="form-control" placeholder="" id="">
			</div>
		</div><br><br>
		<!-- Sub Box for Capital Gains-->
		<div class="subbox" id="inner_capital_gains">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
				<p>Short Term Capital GainS (Other than covered under section <a href="#">111A</a>)</p>
				<table style="text-align: left; width: 100%;" cellpadding="2" cellspacing="2">
				<tbody>
				<tr>
				<td style="vertical-align: top; text-align: center;">From
				16/06/2014 to 15/09/2014<br>
				</td>
				<td style="vertical-align: top; text-align: center;">From
				16/09/2014 to 15/12/2014<br>
				</td>
				<td style="vertical-align: top; text-align: center;">From
				16/12/2014 to 15/03/2015<br>
				</td>
				<td style="vertical-align: top; text-align: center;">From
				16/03/2015 to 31/03/2015<br>
				</td>
				<td style="vertical-align: top; text-align: center;">Total<br>
				</td>
				</tr>
				<tr>
				<td style="vertical-align: top; text-align: right;">
					<div class="form-group">
							  <input type="text" value="" class="form-control" placeholder="" id="">
							</div><br>
				</td>
				<td style="vertical-align: top; text-align: right;">
					<div class="form-group">
							  <input type="text" value="" class="form-control" placeholder="" id="">
							</div><br>
				</td>
				<td style="vertical-align: top; text-align: right;">
					<div class="form-group">
							  <input type="text" value="" class="form-control" placeholder="" id="">
							</div><br>
				</td>
				<td style="vertical-align: top; text-align: right;">
					<div class="form-group">
							  <input type="text" value="" class="form-control" placeholder="" id="">
							</div><br>
				</td>
				<td style="vertical-align: top; text-align: right;">
					<div class="form-group">
							  <input type="text" value="" class="form-control" placeholder="" id="">
							</div><br>
				</td>
				</tr>
				</tbody>
				</table>
				<p>Short Term Capital GainS (Covered under section 111A) <a href="#">111A</a>)</p>
				<table style="text-align: left; width: 100%;" cellpadding="2" cellspacing="2">
				<tbody>
				<tr>
				<td style="vertical-align: top; text-align: center;">From
				16/06/2014 to 15/09/2014<br>
				</td>
				<td style="vertical-align: top; text-align: center;">From
				16/09/2014 to 15/12/2014<br>
				</td>
				<td style="vertical-align: top; text-align: center;">From
				16/12/2014 to 15/03/2015<br>
				</td>
				<td style="vertical-align: top; text-align: center;">From
				16/03/2015 to 31/03/2015<br>
				</td>
				<td style="vertical-align: top; text-align: center;">Total<br>
				</td>
				</tr>
				<tr>
				<td style="vertical-align: top; text-align: right;">
					<div class="form-group">
							  <input type="text" value="" class="form-control" placeholder="" id="">
							</div><br>
				</td>
				<td style="vertical-align: top; text-align: right;">
					<div class="form-group">
							  <input type="text" value="" class="form-control" placeholder="" id="">
							</div><br>
				</td>
				<td style="vertical-align: top; text-align: right;">
					<div class="form-group">
							  <input type="text" value="" class="form-control" placeholder="" id="">
							</div><br>
				</td>
				<td style="vertical-align: top; text-align: right;">
					<div class="form-group">
							  <input type="text" value="" class="form-control" placeholder="" id="">
							</div><br>
				</td>
				<td style="vertical-align: top; text-align: right;">
					<div class="form-group">
							  <input type="text" value="" class="form-control" placeholder="" id="">
							</div><br>
				</td>
				</tr>
				</tbody>
				</table>
				<p>Long Term Capital Gains (Charged to tax @ 20%) <a href="#">111A</a>)</p>
				<table style="text-align: left; width: 100%;" cellpadding="2" cellspacing="2">
				<tbody>
				<tr>
				<td style="vertical-align: top; text-align: center;">From
				16/06/2014 to 15/09/2014<br>
				</td>
				<td style="vertical-align: top; text-align: center;">From
				16/09/2014 to 15/12/2014<br>
				</td>
				<td style="vertical-align: top; text-align: center;">From
				16/12/2014 to 15/03/2015<br>
				</td>
				<td style="vertical-align: top; text-align: center;">From
				16/03/2015 to 31/03/2015<br>
				</td>
				<td style="vertical-align: top; text-align: center;">Total<br>
				</td>
				</tr>
				<tr>
				<td style="vertical-align: top; text-align: right;">
					<div class="form-group">
							  <input type="text" value="" class="form-control" placeholder="" id="">
							</div><br>
				</td>
				<td style="vertical-align: top; text-align: right;">
					<div class="form-group">
							  <input type="text" value="" class="form-control" placeholder="" id="">
							</div><br>
				</td>
				<td style="vertical-align: top; text-align: right;">
					<div class="form-group">
							  <input type="text" value="" class="form-control" placeholder="" id="">
							</div><br>
				</td>
				<td style="vertical-align: top; text-align: right;">
					<div class="form-group">
							  <input type="text" value="" class="form-control" placeholder="" id="">
							</div><br>
				</td>
				<td style="vertical-align: top; text-align: right;">
					<div class="form-group">
							  <input type="text" value="" class="form-control" placeholder="" id="">
							</div><br>
				</td>
				</tr>
				</tbody>
				</table>
				<p>Long Term Capital Gains (Charged to tax @ 10%) <a href="#">111A</a>)</p>
				<table style="text-align: left; width: 100%;" cellpadding="2" cellspacing="2">
				<tbody>
				<tr>
				<td style="vertical-align: top; text-align: center;">From
				16/06/2014 to 15/09/2014<br>
				</td>
				<td style="vertical-align: top; text-align: center;">From
				16/09/2014 to 15/12/2014<br>
				</td>
				<td style="vertical-align: top; text-align: center;">From
				16/12/2014 to 15/03/2015<br>
				</td>
				<td style="vertical-align: top; text-align: center;">From
				16/03/2015 to 31/03/2015<br>
				</td>
				<td style="vertical-align: top; text-align: center;">Total<br>
				</td>
				</tr>
				<tr>
				<td style="vertical-align: top; text-align: right;">
					<div class="form-group">
							  <input type="text" value="" class="form-control" placeholder="" id="">
							</div><br>
				</td>
				<td style="vertical-align: top; text-align: right;">
					<div class="form-group">
							  <input type="text" value="" class="form-control" placeholder="" id="">
							</div><br>
				</td>
				<td style="vertical-align: top; text-align: right;">
					<div class="form-group">
							  <input type="text" value="" class="form-control" placeholder="" id="">
							</div><br>
				</td>
				<td style="vertical-align: top; text-align: right;">
					<div class="form-group">
							  <input type="text" value="" class="form-control" placeholder="" id="">
							</div><br>
				</td>
				<td style="vertical-align: top; text-align: right;">
					<div class="form-group">
							  <input type="text" value="" class="form-control" placeholder="" id="">
							</div><br>
				</td>
				</tr>
				</tbody>
				</table>
			</div>
				</div>
			</div>	
		</div>
	</div>
		<div class="box clearfix">
			<div class="left"><p>Income From Other Sources</p></div>
			<div class="right">
				<div class="btn btn-info" id="income_other_src">Show Details</div>
				<div class="form-group">
				  <input type="text" value=" " class="form-control" placeholder="" id="">
				</div>
			</div><br><br>
			<!-- Sub Box for Income From Other Sources-->
			<div class="subbox" id="inner_income_other_src">
				<div class="container">
					<div class="row">
						<div class="col-md-9">Interest</div>
						<div class="col-md-3">
							<div class="form-group">
							  <input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Commission/Other Income</div>
						<div class="col-md-3">
							<div class="form-group">
							  <input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Winnings from Lottery, Crossword Puzzles, etc.</div>
						<div class="col-md-3">
							<div class="form-group">
							  <input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Profits and Gains of Business or Profession (enter profit only)</p></div>
			<div class="right">
				<div class="form-group">
				  <input type="text" value=" " class="form-control" placeholder="" id="">
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Agricultural Income</p></div>
			<div class="right">
				<div class="form-group">
				  <input type="text" value=" " class="form-control" placeholder="" id="">
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Deductions</p></div>
			<div class="right">
				<div class="btn btn-info" id="deductions">Show Details</div>
				<div class="form-group">
				  <input type="text" value="0" class="form-control" placeholder="" id="">
				</div>
			</div>
			<!-- Sub Box for Deductions-->
			<div class="subbox" id="inner_deductions">
				<div class="container">
					<div class="row">
						<div class="col-md-9">Life Insurance premium paid</div>
						<div class="col-md-3">
							<div class="form-group">
							  <input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Payment for annuity plan</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Contribution toward provident fund / PPF</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Investment in NSC (VIII issue) + Interest</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Contribution toward ULIP</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Contribution toward notified pension fund by MF/UTI</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Re-payment of housing loan etc</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Tuition fees paid for children</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">5 Years fixed deposit with PO or Schedule Bank</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Contribution toward NPF</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Employee's / Self-employed contribution toward NPS (up to 20%) (u/s 80CCD)</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Additional contribution towards NPS [u/s 80CCD(1B)]</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Employer's contribution toward NPS (up to 20%) (u/s 80CCD)</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Long-term infrastructure bonds (u/s 80CCF)</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Investment under equity saving scheme (u/s 80CCG)</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Deposit with Sukanya Samridhi Accounts</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Any other deductable (u/s 80C)</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Total</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Medi-claim premium (u/s 80D)</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Actual payment towards medical treatment (u/s 80DDB )</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Donations (u/s 80G)</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Deduction for maintenance / medical treatment of dependent (u/s 80DD)</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Interest on loan for higher education (u/s 80E)</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Interest on loan taken for Residential House (u/s 80EE)</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Deduction in case of a person with disability (u/s 80U)</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Interest on deposits in saving account (u/s 80TTA)</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>
						<div class="col-md-9">Any other deductions</div>
						<div class="col-md-3">
							<div class="form-group">
							  	<input type="text" value=" " class="form-control" placeholder="" id="">
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Net Taxable Income</p></div>
			<div class="right">
				<div class="form-group">
				  <input type="text" value=" " class="form-control" placeholder="" id="">
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Income Liable to Tax at Normal Rate ---</p></div>
			<div class="right">
				<div class="container">
					<div class="row">
						<div class="form-group col-md-6">
						  <input type="text" value=" " class="form-control" placeholder="" id="">
						</div>
						<div class="form-group col-md-6">
						  <input type="text" value=" " class="form-control" placeholder="" id="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Short Term Capital Gains (Covered u/s 111A) 15%</p></div>
			<div class="right">
				<div class="container">
					<div class="row">
						<div class="form-group col-md-6">
						  <input type="text" value=" " class="form-control" placeholder="" id="">
						</div>
						<div class="form-group col-md-6">
						  <input type="text" value=" " class="form-control" placeholder="" id="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Long Term Capital Gains (Charged to tax @ 20%) 20%</p></div>
			<div class="right">
				<div class="container">
					<div class="row">
						<div class="form-group col-md-6">
						  <input type="text" value=" " class="form-control" placeholder="" id="">
						</div>
						<div class="form-group col-md-6">
						  <input type="text" value=" " class="form-control" placeholder="" id="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Long Term Capital Gains (Charged to tax @ 10%) 10%</p></div>
			<div class="right">
				<div class="container">
					<div class="row">
						<div class="form-group col-md-6">
						  <input type="text" value=" " class="form-control" placeholder="" id="">
						</div>
						<div class="form-group col-md-6">
						  <input type="text" value=" " class="form-control" placeholder="" id="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Winnings from Lottery, Crossword Puzzles, etc) 30%</p></div>
			<div class="right">
				<div class="container">
					<div class="row">
						<div class="form-group col-md-6">
						  <input type="text" value=" " class="form-control" placeholder="" id="">
						</div>
						<div class="form-group col-md-6">
						  <input type="text" value=" " class="form-control" placeholder="" id="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Income Tax</p></div>
			<div class="right">
				<div class="form-group">
				  <input type="text" value=" " class="form-control" placeholder="" id="">
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Surcharge</p></div>
			<div class="right">
				<div class="form-group">
				  <input type="text" value=" " class="form-control" placeholder="" id="">
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Education Cess</p></div>
			<div class="right">
				<div class="form-group">
				  <input type="text" value=" " class="form-control" placeholder="" id="">
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Secondary and higher education cess</p></div>
			<div class="right">
				<div class="form-group">
				  <input type="text" value=" " class="form-control" placeholder="" id="">
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Total Tax Liability</p></div>
			<div class="right">
				<div class="form-group">
				  <input type="text" value=" " class="form-control" placeholder="" id="">
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Due date of submission of return</p></div>
			<div class="right">
				<div class="form-group">
				  <input type="text" value=" " class="form-control" placeholder="" id="">
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Actual date of submission of return/date of completion of assessment</p></div>
			<div class="right">
				<div class="form-group">
				  <input type="text" value=" " class="form-control" placeholder="" id="">
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Relief</p></div>
			<div class="right">
				<div class="form-group">
				  <input type="text" value=" " class="form-control" placeholder="" id="">
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>TDS/TCS/MAT (AMT) Credit Utilized</p></div>
			<div class="right">
				<div class="form-group">
				  <input type="text" value=" " class="form-control" placeholder="" id="">
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Detail of tax paid</p></div>
			<div class="right">
				<!-- <input type="text"> -->
			</div><br>
			<div class="container">
				<div class="row">
					<div class="tax_paid">
						<!-- <input id="btnAdd" type="button" value="Add a New List Item" /> -->
					    <!-- <ul>
					        <li><input type="text"></li>
					        <li><input type="text"></li>
					    </ul> -->
					    <!-- <table border="1" id="addRow">
					    	<th>Date</th>
					    	<th>Amount</th>
					    	<th></th>
					    	<tr id="dataRow">
					    		<td><input type="text"></td>
					    		<td><input type="text"></td>
					    		<td><input type="button" value="&times;"></td>
					    	</tr>
					    </table> -->
					    <div id="wrapper">
<table align='center' cellspacing=2 cellpadding=5 id="data_table" border=1>
<tr>
<th>Date</th>
<th>Amount</th>
<th></th>
</tr>

<tr>
<td><input type="text" id="new_name"></td>
<td><input type="text" id="new_country"></td>
<!-- <td><input type="text" id="new_age"></td> -->
<td><input type="button" class="add" onclick="add_row();" value="Add Row"></td>
</tr>

</table>
					</div>
				</div>
			</div>
		</div><br>
	</div>
		<div class="box clearfix">
			<div class="left"><p>Amount of interest u/s <a href="#">234A</a></p></div>
			<div class="right">
				<div class="form-group">
				  <input type="text" value=" " class="form-control" placeholder="" id="">
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Amount of interest u/s <a href="#">234B</a></p></div>
			<div class="right">
				<div class="form-group">
				  <input type="text" value=" " class="form-control" placeholder="" id="">
				</div>
			</div>
		</div>
		<div class="box clearfix">
			<div class="left"><p>Amount of interest u/s <a href="#">234C</a></p></div>
			<div class="right">
				<div class="form-group">
				  <input type="text" value=" " class="form-control" placeholder="" id="">
				</div>
			</div>
		</div><br>
	
		<div class="reset_and_calculate text-center">
			<input type="submit" value="Calculate" class="btn btn-primary">
			<input type="button" value="Reset" class="btn btn-primary">
		</div>	
</div>
</form>
<?php
}
add_action('get_income_tax', 'get_income_tax');
add_shortcode('INCOME_TAX','get_income_tax');


