<html>
<head>
<title>Test</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
<link rel="stylesheet" type="text/css" href="css/table.css" />



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<script>
function exportToExcel(arr) {

    var tempTable  = document.getElementById("table").cloneNode(true);
    var row =  tempTable.rows;
    var totalColumns = row[0].cells.length; 

    let table = document.getElementById("myTable");
    $("#myTable tr").remove(); 

    indexes = [];

    for (var i = 0; i < totalColumns; i++) { 
	    if(arr.indexOf(row[0].cells[i].innerHTML) != -1) {
            indexes.push(i);
        }
    }

    for (var j = 0; j < row.length; j++) { 
        let newRow = document.createElement("tr");

            $.each(indexes, function(ind) {
            let col = document.createElement("td")
            col.innerText = row[j].cells[indexes[ind]].innerHTML;
            newRow.appendChild(col)
            });

        table.appendChild(newRow)
    }

      var location = 'data:application/vnd.ms-excel;base64,';
      var excelTemplate = '<html> '+
        '<head> '+
        '<meta http-equiv="content-type" content="text/plain; charset=UTF-8"/> '+
        '</head> '+
        '<body> '+
            table.outerHTML +
        '</body> '+
        '</html>'
      window.location.href = location + window.btoa(excelTemplate);


// var originalTable  = document.getElementById("table").cloneNode(true);
// var tempTable  = document.getElementById("table").cloneNode(true);
// var row =  tempTable.rows;
// let table = document.getElementById("myTable");
  		
// $("#myTable tr").remove(); 

// for (var j = 0; j < row.length; j++) { 
//     indexes = [];
//     $.each(originalTable.rows[0].cells, function(col) {
//             if(arr.indexOf(originalTable.rows[0].cells[col].innerHTML) != -1) {
//                 indexes.push(col);
//             }
//     });
//     let newRow = document.createElement("tr");
//     $.each(indexes, function(ind) {
//         let col = document.createElement("td")
//         col.innerText = row[j].cells[indexes[ind]].innerHTML;
//         newRow.appendChild(col)
//     });
    
//     table.appendChild(newRow)
// };
		 
//     console.log(tempTable);
//     console.log(table);



//   var location = 'data:application/vnd.ms-excel;base64,';
//   var excelTemplate = '<html> '+
//     '<head> '+
//     '<meta http-equiv="content-type" content="text/plain; charset=UTF-8"/> '+
// 	'</head> '+
// 	'<body> '+
//         table.outerHTML +
// 	'</body> '+
// 	'</html>'
//    window.location.href = location + window.btoa(excelTemplate);
}
</script>

</head>
<body>
<table id="myTable"></table>
	<div class="phppot-container">
		<h1>Product List</h1>
		<div id="table-conatainer">
			<table class="striped " id="table">
				<thead>
					<tr>
						<th>Product Name</th>
						<th>Price</th>
						<th>Model</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>GIZMORE Multimedia Speaker with Remote Control, Black</td>
						<td>2300</td>
						<td>2020</td>
					</tr>
					<tr>
						<td>Black Google Nest Mini</td>
						<td>3400</td>
						<td>2021</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="row">
			<input  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"value="Export as CSV" />
		</div>
	</div>



	<!-- POP CODE HEAR -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Seclect columns to exports</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<form>
			<div class="form-check">
				<input class="form-check-input clsCheck" type="checkbox" value="Product Name">
				<label class="form-check-label">
				Product Name
				</label>
			</div>

			<div class="form-check">
				<input class="form-check-input clsCheck" type="checkbox" value="Price">
				<label class="form-check-label">
				Price
				</label>
			</div>

			<div class="form-check">
				<input class="form-check-input clsCheck" type="checkbox" value="Model">
				<label class="form-check-label">
				Model
				</label>
			</div>


			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary"  onclick="exportToExcel(arr)">Export</button>
		</div>
		</div>
	</div>
	</div>
<!-- End pop up code  -->

<script>
    var arr = [];
	$(document).ready(function() {

        $('.clsCheck').change(function() {
	    	if($(this).is(':checked') == true) {
		    	arr.push($(this).val());
    		}
        

		});

  	});

</script>

</body>
</html>