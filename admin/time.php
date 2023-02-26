<script language="javascript" src="jquery-1.8.1.min.js"></script>
<script>
function Realtime(){
   $.ajax({url:"test.php",
   	async:false,
	cache:false,
	global:false,
	type:"POST",
	data:"",
	dataType:"html",
	success: function(result){
		$('#divDetail').html(result);
		setTimeout("Real();",1000);	
		}
	});
}

function Real(){
	Realtime();	
}
</script>
<body onload="Realtime();">

        <div id="divDetail"></div>


</body>