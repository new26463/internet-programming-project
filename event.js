$(function(){
			//อีเวนในการลงทะเบียน
			$("#form_signup").on("submit",function(e){  
				if (confirm("ยืนยันการลงทะเบียน!")) {
					e.preventDefault(); // ปิดการใช้งาน submit ปกติ เพื่อใช้งานผ่าน ajax 
					var data = new FormData($(this)[0]);   // เตรียมข้อมูล form สำหรับส่งด้วย  FormData Object  
					$.ajax({
						url:'include/reg_insert.php',type:'post',data:data,
						async: false,cache: false,contentType: false,processData: false, // กรณีใช้งานอัพโหลดไฟล์ด้วย ajax ต้องกำหนด  contentType: false, และ processData: false  
						success:function(result){
							if(result == 'yes'){
								alert("สมัครเรียบร้อย");
								location.reload();
							}else{
								alert(result);
							}
						}
					})
				}else{
					e.preventDefault(); //มีไว้เฉย ไม่ให้ข้อความที่พิมหายไป 5555
				}
			});
			//อีเวนเข้าสู่ระบบ
			$("#form_login").on("submit",function(e){  
				e.preventDefault(); // ปิดการใช้งาน submit ปกติ เพื่อใช้งานผ่าน ajax 
				var data = new FormData($(this)[0]);   // เตรียมข้อมูล form สำหรับส่งด้วย  FormData Object  
				$.ajax({
					url:'include/login.php',type:'post',data:data,
					async: false,cache: false,contentType: false,processData: false, // กรณีใช้งานอัพโหลดไฟล์ด้วย ajax ต้องกำหนด  contentType: false, และ processData: false  
					success:function(result){
						if(result == 'admin' || result == 'customer'){
							location.reload();
						}else{
							alert(result);
						}
					}
				})
			});
			//อีเวนออกจากระบบ
			$("#form_logout").on("submit",function(e){  
				$.ajax({
					url:'include/logout.php',
					success:function(result){
						location.assign("index.php");
					}
				})
			});
			//อีเวน เพิ่มสินค้า
			$("#form_add").on("submit",function(e){  
				e.preventDefault(); // ปิดการใช้งาน submit ปกติ เพื่อใช้งานผ่าน ajax 
				var data = new FormData($(this)[0]);   // เตรียมข้อมูล form สำหรับส่งด้วย  FormData Object  
				$.ajax({
					url:'admin/savetodb.php',type:'post',data:data,
					async: false,cache: false,contentType: false,processData: false, // กรณีใช้งานอัพโหลดไฟล์ด้วย ajax ต้องกำหนด  contentType: false, และ processData: false  
					success:function(result){
						alert(result);
						location.reload();
					}
				})
			});
			//อีเวน ซื้อสินค้า
			$("#form_cart").on("submit",function(e){  
				if (confirm("Are you sure!")) {
					e.preventDefault();
					$.ajax({
						url:'include/pay.php',
						success:function(result){
							alert(result);
							location.reload();
							
						}
					})
				}else{
					e.preventDefault(); //มีไว้เฉย ไม่ให้ข้อความที่พิมหายไป 5555
				}
			});
			//อีเวนในการแก้ไข
			$("#form_edit").on("submit",function(e){  
					if (confirm("You need to edit ?!")) {
						e.preventDefault(); // ปิดการใช้งาน submit ปกติ เพื่อใช้งานผ่าน ajax 
						var data = new FormData($(this)[0]);   // เตรียมข้อมูล form สำหรับส่งด้วย  FormData Object  
						$.ajax({
							url:'include/edit_insert.php',type:'post',data:data,
							async: false,cache: false,contentType: false,processData: false, // กรณีใช้งานอัพโหลดไฟล์ด้วย ajax ต้องกำหนด  contentType: false, และ processData: false  
							success:function(result){
								if(result == 'yes'){
									alert("done");
									location.reload();
								}else{
									alert(result);
								}
							}
						})
					}else{
						e.preventDefault(); //มีไว้เฉย ไม่ให้ข้อความที่พิมหายไป 5555
					}
			});
			//อีเวนในการแก้ไขpassword
			$("#form_change").on("submit",function(e){  
					if (confirm("You need to change ?!")) {
						e.preventDefault(); // ปิดการใช้งาน submit ปกติ เพื่อใช้งานผ่าน ajax 
						var data = new FormData($(this)[0]);   // เตรียมข้อมูล form สำหรับส่งด้วย  FormData Object  
						$.ajax({
							url:'include/edit_password.php',type:'post',data:data,
							async: false,cache: false,contentType: false,processData: false, // กรณีใช้งานอัพโหลดไฟล์ด้วย ajax ต้องกำหนด  contentType: false, และ processData: false  
							success:function(result){
								if(result == 'yes'){
									alert("done");
									location.reload();
								}else{
									alert(result);
								}
							}
						})
					}else{
						e.preventDefault(); //มีไว้เฉย ไม่ให้ข้อความที่พิมหายไป 5555
					}
			});
});