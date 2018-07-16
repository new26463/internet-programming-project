function delete_product(id) {
	if (confirm("Are you sure!")) {
		data={"id": id ,"type": 1 };
		$.ajax({
			url:'include/delete.php',type:'post',data:data,
			success:function(result){
				if(result == 'yes'){alert("Delete success!!");location.reload();}
				else{alert(result);}
			}
		})
	}
}
function delete_member(id) {
	if (confirm("Are you sure!")) {
		data={"id": id ,"type": 2 };
		$.ajax({
			url:'include/delete.php',type:'post',data:data,
			success:function(result){
				if(result == 'yes'){alert("Delete success!!");location.reload();}
				else{alert(result);}
			}
		})
	}
}

