// Income From House Property
jQuery(function($){
	$('#income_house_property').click(function(){
        $('#inner_income_house_property').toggle("slow")
    
    });
});
jQuery(function($){
	$("#income_house_property").click(function () {
        $("#income_house_property").fadeOut(function () {
            $("#income_house_property").text(($("#income_house_property").text() == 'Hide Details') ? 'Show Details' : 'Hide Details').fadeIn();
        })
    })
});

// Capital Gains
jQuery(function($){
	$('#capital_gains').click(function(){
        $('#inner_capital_gains').toggle("slow")
    
    });
});
jQuery(function($){
	$("#capital_gains").click(function () {
        $("#capital_gains").fadeOut(function () {
            $("#capital_gains").text(($("#capital_gains").text() == 'Hide Details') ? 'Show Details' : 'Hide Details').fadeIn();
        })
    })
});

// Income From Other Sources
jQuery(function($){
	$('#income_other_src').click(function(){
        $('#inner_income_other_src').toggle("slow")
    
    });
});
jQuery(function($){
	$("#income_other_src").click(function () {
        $("#income_other_src").fadeOut(function () {
            $("#income_other_src").text(($("#income_other_src").text() == 'Hide Details') ? 'Show Details' : 'Hide Details').fadeIn();
        })
    })
});

// Deductions
jQuery(function($){
	$('#deductions').click(function(){
        $('#inner_deductions').toggle("slow")
    
    });
});
jQuery(function($){
	$("#deductions").click(function () {
        $("#deductions").fadeOut(function () {
            $("#deductions").text(($("#deductions").text() == 'Hide Details') ? 'Show Details' : 'Hide Details').fadeIn();
        })
    })
});


// jQuery(function ($) {
//     $('#addRow').on('click', function () {
//         $('#addedRow').fadeOut(500);
//     });

//     $('#btnAdd').on('click', function () {
//         var rowData = '<tr id="addedRow"><td><input type="text"></td><td><input type="text"></td><td><input id="delRow" type="button" value="&times;"></td></tr>';
//         $('#addRow').append(rowData);
//     });
// });


function add_row()
{
 var new_name=document.getElementById("new_name").value;
 var new_country=document.getElementById("new_country").value;
 // var new_age=document.getElementById("new_age").value;
    
 var table=document.getElementById("data_table");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td id='name_row"+table_len+"'>"+new_name+"</td><td id='country_row"+table_len+"'>"+new_country+"</td><td><input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";

 document.getElementById("new_name").value="";
 document.getElementById("new_country").value="";
 // document.getElementById("new_age").value="";
}

function delete_row(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}


