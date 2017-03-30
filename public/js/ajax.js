$(document).ready(function(){

	// update trạng thái diao dịch
	$('.status').click(function(){
		 status = $(this).attr("status");
		 id = $(this).attr("id");

		 console.log(status);
		 console.log(id);
		 $result = $("#mabomon");
		 $.ajax({
		 	url:'http://localhost/www/lilama/admin/transaction/update_status',
		 	type:'post',
		 	async:true,
		 	dataType:'text',
		 	data:{'status':status , 'id':id},
		 	success:function(data)
		 	{
		 		$result.find("option").remove();
		 		$result.append(data);
		 		
			}
		 	
		 });
	});
});