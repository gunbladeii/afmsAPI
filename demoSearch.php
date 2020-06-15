<html>
<head>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/cupertino/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.13.5/css/ui.jqgrid.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.13.5/js/jquery.jqgrid.min.js"></script>
</head>
<body>
 	<table id="photos" class="display" cellspacing="0" width="100%">
	</table>
	<div id="pager2"></div>

 <div class="container" style="padding:50px 250px;">
	<form role="form">
        <div class="form-group">
          <input type="input" class="form-control input-lg" id="txt-search" placeholder="Type your search character">
        </div>
	</form>
	<div id="filter-records"></div>
  </div>

<script>
$(document).ready(function(){

var data = "https://iberkat.tech/afms/afmsAPI/api/employeeData/read.php";
$('#txt-search').keyup(function(){
            var searchField = $(this).val();
			if(searchField === '')  {
				$('#filter-records').html('');
				return;
			}
			
            var regex = new RegExp(searchField, "i");
            var output = '<div class="row">';
            var count = 1;
			  $.each(data, function(key, val){
				if ((val.id.search(regex) != -1) || (val.noIC.search(regex) != -1)) {
				  output += '<div class="col-md-6 well">';
				  output += '<div class="col-md-7">';
				  output += '<h5>' + val.id + '</h5>';
				  output += '<p>' + val.nama + '</p>';
				  output += '<p>' + val.noIC + '</p>';
				  output += '<p>' + val.sex + '</p>';
				  output += '<p>' + val.emploeeStatus + '</p>'
				  output += '</div>';
				  output += '</div>';
				  if(count%2 == 0){
					output += '</div><div class="row">'
				  }
				  count++;
				}
			  });
			  output += '</div>';
			  $('#filter-records').html(output);
        });
   });
 </script>

<script type="text/javascript">
  $(document).ready(function(){
		
	$("#photos").jqGrid({
		url:'https://iberkat.tech/afms/afmsAPI/api/employeeData/read.php',
		datatype: "json",
		colNames:['ID', 'No IC', 'Sex', 'Station Code'],
		colModel:[
			{name:'id',index:'id', width:55},
			{name:'noIC',index:'noIC', width:75},
			{name:'sex',index:'sex', width:55},	
			{name:'stationCode',index:'stationCode', width:55}		
		],
		rowNum:10,
		loadonce: true,
		rowList:[10,20,30],
		pager: '#pager2',
		sortname: 'id',
		viewrecords: true,
		sortorder: "desc",
		caption:""
	});
	$("#photos").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false});
    /*var arrayReturn = [];
            $.ajax({
                url: "https://jsonplaceholder.typicode.com/posts",
                async: false,
                dataType: 'json',
                success: function (data) {
					for (var i = 0, len = data.length; i < len; i++) {
						var desc = data[i].body;
						arrayReturn.push([ data[i].userId, '<a href="http://google.com" target="_blank">'+data[i].title+'</a>', desc.substring(0, 12)]);
					}
				inittable(arrayReturn);
                }
            });
	function inittable(data) {	
		//console.log(data);
		$('#photos').DataTable( {
			"aaData": data,
			"dataSrc": function ( json ) {
				console.log(json);
			  for ( var i=0, ien=json.data.length ; i<ien ; i++ ) {
				json.data[i][0] = '<a href="/message/'+json.data[i][0]+'>View message</a>';
			  }
			  return json.data;
			}
		} );
	}*/
  });
</script>

 </body>
 </html>