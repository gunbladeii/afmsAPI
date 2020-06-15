<html>
<head>
	<script src="https://www.googletagservices.com/activeview/js/current/osd.js?cb=%2Fr20100101"></script><script src="https://partner.googleadservices.com/gampad/cookie.js?domain=js-tutorials.com&amp;callback=_gfp_s_&amp;client=ca-pub-1657751670778791&amp;cookie=ID%3D527ac57852636a8e%3AT%3D1592187804%3AS%3DALNI_MaPZMuVtGz3tjLmFctdT0YJF2qz4Q&amp;crv=1"></script><script src="https://pagead2.googlesyndication.com/pagead/js/r20200609/r20190131/show_ads_impl_fy2019.js" id="google_shimpl"></script><script async="" src="https://www.google-analytics.com/analytics.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/cupertino/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.13.5/css/ui.jqgrid.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.13.5/js/jquery.jqgrid.min.js"></script>
  <title>js-tutorials.com : JqGrid jquery simple example and uses </title>
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
	
<section class="content">
<div class="content-wrapper">
	<div class="col-sm-12">
	 	<table id="photos" class="display table-responsive" cellspacing="0" width="100%">
		</table>
		<div id="pager2"></div>
    </div>
</div>
</section>

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