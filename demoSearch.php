<html>
<head>
	
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/cupertino/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.13.5/css/ui.jqgrid.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.13.5/js/jquery.jqgrid.min.js"></script>
  <title>Test JSON method </title>
  <style>
  body { line-height: 2.1; font-size: 20px; }
  .ui-jqgrid > .ui-jqgrid-view {

    font-size: 15px !important;

}
.ui-jqgrid tr.jqgrow td {
        word-wrap: break-word; /* IE 5.5+ and CSS3 */
        white-space: pre-wrap; /* CSS3 */
        white-space: -moz-pre-wrap; /* Mozilla, since 1999 */
        white-space: -pre-wrap; /* Opera 4-6 */
        white-space: -o-pre-wrap; /* Opera 7 */
        overflow: hidden;
        height: auto;
        vertical-align: middle;
        padding-top: 3px;
        padding-bottom: 3px
    }
</style>
<link rel="preload" href="https://adservice.google.com.my/adsid/integrator.js?domain=js-tutorials.com" as="script"><script type="text/javascript" src="https://adservice.google.com.my/adsid/integrator.js?domain=js-tutorials.com"></script><link rel="preload" href="https://adservice.google.com/adsid/integrator.js?domain=js-tutorials.com" as="script"><script type="text/javascript" src="https://adservice.google.com/adsid/integrator.js?domain=js-tutorials.com"></script>
</head>
<body>
	

<div class="content-wrapper">
	<div class="col-sm-12">
	 	<table id="photos" class="display table-responsive" cellspacing="0" width="100%">
		</table>
		<div id="pager2"></div>
    </div>
</div>


 <div class="container" style="padding:50px 250px;">
	<form role="form">
        <div class="form-group">
          <input type="input" class="form-control input-lg" id="txt-search" placeholder="Type your search character">
        </div>
	</form>
	<div id="filter-records"></div>
  </div>

  <div class="mypanel"></div>

    <script>
    $(document).ready(function(){
    	$.getJSON('https://iberkat.tech/afms/afmsAPI/api/employeeData/read.php', function(data) {
        
	        var text = `id: ${data.id}<br>
	                    noIC: ${data.noIC}<br>
	                    emel: ${data.emel}`
	                    
	        
	        $(".mypanel").html(text);
    	});
    });
    </script>

<script>
//search table using json object method
$(document).ready(function(){

var data = [{"id":"203","noIC":"770303017127","nama":"A.RAHMAN BIN LADAWAK","emel":"17127@afm.com","sex":"male","stationCode":"S006MUA","employeeStatus":"permanent"},{"id":"493","noIC":"021019040401","nama":"Aaron Low Sheng Yong","emel":"040401@afm.com","sex":"male","stationCode":"C009MKZ","employeeStatus":"temp"},{"id":"356","noIC":"720414015073","nama":"Abd Ghaffar B Othman","emel":"15073@afm.com","sex":"male","stationCode":"S001JHB","employeeStatus":"permanent"},{"id":"271","noIC":"880117035767","nama":"ABDUL AZIZ BIN NAWI","emel":"075767@afm.com","sex":"male","stationCode":"N004PMS","employeeStatus":"temp"},{"id":"572","noIC":"890227-14-5421","nama":"ABDUL HALIM BIN MOHD TAIB","emel":"145421@afm.com","sex":"male","stationCode":"C003KDS","employeeStatus":"temp"},{"id":"481","noIC":"930410055567","nama":"Abdul Jabbar Bin Tarmizi","emel":"055567@afm.com","sex":"male","stationCode":"C009MKZ","employeeStatus":"temp"}];
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
				  output += '<p>' + val.employeeStatus + '</p>'
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
//test jgrid table
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