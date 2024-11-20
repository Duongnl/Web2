
<!-- <div id="overlay_details"> -->
<div class="main-content">
	<?php 
	$request = $_SERVER['REQUEST_URI'];
	$url = handle_url::getURLAdmin($request);
	$phanquyen = new phanquyen_model();

	
	if(isset($_POST["permissionID"]))
	{
		$maQuyen = $_POST["permissionID"];
	}
	?>
  
	<div class="window">
    <div class="back">
    	<a type="button" href="<?php echo $url . "/permission" ?>" class="closebtn btn " >
    <i class="fa-solid fa-arrow-left" style="display: inline-block; font-size: 30px; "></i>
    </a>
    </div>
<!-- <div > -->
	<form action="<?php echo $url.'/permission_controller' ?>" method="POST" id="permission_details_form" class="wrapper" style="padding-top:0px">
	<input type="hidden" value = "<?php echo $maQuyen ?>" name="maQuyen" >
    <div class="right_colum">
            <div class="checkbox_item citem_1">
		        <label class="checkbox_wrap">
			        <input id="QuyenThongKe" type="checkbox" <?php if($phanquyen->checked($_POST["permissionID"], 1)) {echo 'checked';} ?>   name="QuyenThongKe"  class="checkbox_inp q1">
			        <span class="checkbox_mark"></span>
		        </label>
		    <div class="title">Quản lý Thống kê </div>
	        </div>

            <div class="checkbox_item citem_1">
		        <label class="checkbox_wrap">
			        <input type="checkbox" id = "QuyenSanPham"<?php if($phanquyen->checked($_POST["permissionID"], 2)) {echo 'checked';} ?>  name="QuyenSanPham" class="checkbox_inp q2">
			        <span class="checkbox_mark"></span>
		        </label>
		    <div class="title">Quản Lý Sản Phẩm </div>
	        </div>

            <div class="checkbox_item citem_1">
		        <label class="checkbox_wrap">
			        <input id="QuyenCategory" type="checkbox" <?php if($phanquyen->checked($_POST["permissionID"], 3)) {echo 'checked';} ?> name="QuyenCategory" class="checkbox_inp q3">
			        <span class="checkbox_mark"></span>
		        </label>
		    <div class="title">Quản Lý Category  </div>
	        </div>

            <div class="checkbox_item citem_1">
		        <label class="checkbox_wrap">
			        <input type="checkbox" id ="QuyenDiscount" <?php if($phanquyen->checked($_POST["permissionID"], 4)) {echo 'checked';} ?> name="QuyenDiscount" class="checkbox_inp q4">
			        <span class="checkbox_mark"></span>
		        </label>
		    <div class="title">Quản lý Discount </div>
	        </div>

            <div class="checkbox_item citem_1">
		        <label class="checkbox_wrap">
			        <input id="QuyenSupplier" type="checkbox"<?php if($phanquyen->checked($_POST["permissionID"], 5)) {echo 'checked';} ?> name="QuyenSupplier" class="checkbox_inp q5">
			        <span class="checkbox_mark"></span>
		        </label>
		    <div class="title">Quản lý Supplier</div>
	        </div>

			<div class="checkbox_item citem_1">
		        <label class="checkbox_wrap">
			        <input id="QuyenUser" type="checkbox" <?php if($phanquyen->checked($_POST["permissionID"], 11)) {echo 'checked';} ?> name="QuyenUser" class="checkbox_inp q6">
			        <span class="checkbox_mark"></span>
		        </label>
		    <div class="title">Quyền User</div>
	        </div>
        
    </div>
    <div class="left_colum">
            
    	<div class="checkbox_item citem_1">
		        <label class="checkbox_wrap">
			        <input id="QuyenStaff" type="checkbox" <?php if($phanquyen->checked($_POST["permissionID"], 6)) {echo 'checked';} ?> name="QuyenStaff" class="checkbox_inp q7 ">
			        <span class="checkbox_mark"></span>
		        </label>
		    <div class="title">Quản Lý Staff</div>
	    </div>

            <div class="checkbox_item citem_1">
		        <label class="checkbox_wrap">
			        <input id="QuyenGuest" type="checkbox" <?php if($phanquyen->checked($_POST["permissionID"], 7)) {echo 'checked';} ?> name="QuyenGuest" class="checkbox_inp q8">
			        <span class="checkbox_mark"></span>
		        </label>
		    <div class="title">Quản Lý Guest</div>
	        </div>

            <div class="checkbox_item citem_1">
		        <label class="checkbox_wrap">
			        <input id="QuyenOrder" type="checkbox" <?php if($phanquyen->checked($_POST["permissionID"], 8)) {echo 'checked';} ?> name="QuyenOrder" class="checkbox_inp q9">
			        <span class="checkbox_mark"></span>
		        </label>
		    <div class="title">Quản lý Order </div>
	        </div>

            <div class="checkbox_item citem_1">
		        <label class="checkbox_wrap">
			        <input id="QuyenNhap" type="checkbox" <?php if($phanquyen->checked($_POST["permissionID"], 9)) {echo 'checked';} ?> name="QuyenNhap" class="checkbox_inp q10">
			        <span class="checkbox_mark"></span>
		        </label>
		    <div class="title">Quản Lý Nhập </div>
	        </div>

            <div class="checkbox_item citem_1">
		        <label class="checkbox_wrap">
			        <input id="QuyenDuyetNhap" type="checkbox" <?php if($phanquyen->checked($_POST["permissionID"], 10)) {echo 'checked';} ?> name="QuyenDuyetNhap" class="checkbox_inp q11">
			        <span class="checkbox_mark"></span>
		        </label>	
		    <div class="title">Quản lý Duyệt Nhập </div>
	        </div>

			<div class="checkbox_item citem_1">
		        <label class="checkbox_wrap">
			        <input id="Quyen" type="checkbox" <?php if($phanquyen->checked($_POST["permissionID"], 12)) {echo 'checked';} ?> name="QuyenQly" class="checkbox_inp q12">
			        <span class="checkbox_mark"></span>
		        </label>
		    	<div class="title">Quản lý Quyền </div>
	    	</div>


			</div>

		</div>
		<input id="save" name="save" type="submit" class ="btn-save" style=" margin:0 auto;display:block; "  value="save"></input>

		</form>

	

<!-- </div> -->

</div>
<script>
	function closePopup() { // Click vào close thì gán style cho Popup là display:none để ẩn đi
    	document.getElementById("overlay_details").style.display = "none";
    }
	function openPopup() { // Click vào button thì gán style cho Popup là display:block để hiển thị lên
   	 	document.getElementById("overlay_details").style.display = "block";
    }

	// var QuyenQly = document.getElementById('Quyen').checked ;
	// QuyenQly = true;



// 	 $(document).ready(function() {

// 		$('#save').click(function() {
// 		var QuyenQly = document.getElementById('Quyen').checked;
// 		var QuyenDuyetNhap = document.getElementById('QuyenDuyetNhap').checked;
// 		var QuyenNhap = document.getElementById('QuyenNhap').checked;
// 		var QuyenOrder = document.getElementById('QuyenOrder').checked;
// 		var QuyenGuest = document.getElementById('QuyenGuest').checked;
// 		var QuyenStaff = document.getElementById('QuyenStaff').checked;
// 		var QuyenUser = document.getElementById('QuyenUser').checked;
// 		var QuyenSupplier = document.getElementById('QuyenSupplier').checked;
// 		var QuyenDiscount = document.getElementById('QuyenDiscount').checked;
// 		var QuyenCategory = document.getElementById('QuyenCategory').checked;
// 		var QuyenThongKe = document.getElementById('QuyenThongKe').checked;
// 		var QuyenSanPham = document.getElementById('QuyenSanPham').checked;

// 			$.post("./admin/controller/permission_controller.php", {
			
// 				QuyenQly: QuyenQly,
// 				QuyenDuyetNhap: QuyenDuyetNhap,
// 				QuyenNhap:QuyenNhap,
// 				QuyenOrder:QuyenOrder,
// 				QuyenGuest:QuyenGuest,
// 				QuyenStaff:QuyenStaff,
// 				QuyenUser:QuyenUser,
// 				QuyenSupplier:QuyenSupplier,
// 				QuyenDiscount:QuyenDiscount,
// 				QuyenCategory:QuyenCategory,
// 				QuyenThongKe:QuyenThongKe,
// 				QuyenSanPham:QuyenSanPham,
// 			},
// 		);

		

// 		});

// });
	document.addEventListener("DOMContentLoaded", function() {
            var quyenDuyetNhapCheckbox = document.getElementById("QuyenDuyetNhap");
            var quyenDuyetCheckbox = document.getElementById("QuyenNhap");

            quyenDuyetNhapCheckbox.addEventListener("change", function() {
                if (quyenDuyetNhapCheckbox.checked) {
                    quyenDuyetCheckbox.checked = true;
                } else {	
                    quyenDuyetCheckbox.checked = false; // Optional: uncheck if you want this behavior
                }
            });
    });
		




</script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	outline: none;
	font-family: 'Open Sans', sans-serif;
}


.btn-save {
	border:none;
	text-decoration: none;
	font-weight:500;
    font-size: 25px;
    color: black;
    box-shadow: 3px 3px 6px rgba(0, 0, 0, 0.3), -3px -3px 6px rgba(255, 255, 255, 0.8);
    border-radius:20px;
	padding: 10px 30px;
}

body{
	/* background-image: radial-gradient(circle at 0 0, #a1cae9, #f7c6c6); */
}
.colum1den10 {
    display:flex;
}
.left_colum , 
.right_colum {
    display:flex ;
    flex-direction: column;
    width:40%;
	
}

.citem_1 {
    display:flex;
    border-radius:40px;
    padding: 10px 20px;
    box-shadow: 3px 3px 6px rgba(0, 0, 0, 0.3), -3px -3px 6px rgba(255, 255, 255, 0.8);
    margin: 10px 0;
    justify-content: space-between;
    background-color:rgb(255,255,255);
}
.wrapper{
	width: 100%;
	border-radius: 3px;
	padding: 50px;
    display:flex ;  
    align-items: center;
    justify-content: center;
    gap:4%;

}

.checkbox_item .title{
	font-size: 25px;
	font-weight: bold;
	letter-spacing: 3px;
	text-align: center;
    display:flex;
    align-items: center;
}

.checkbox_item .checkbox_wrap{
	position: relative;
	display: block;
	cursor: pointer;
}

.checkbox_item:last-child .checkbox_wrap{
	margin-bottom: 0;
}

.checkbox_item .checkbox_wrap .checkbox_inp{
	position: absolute;
	top: 0;
	left: 0;
	opacity: 0;
	z-index: 1;
}

.checkbox_item .checkbox_wrap .checkbox_mark{
	display: inline-block;
	position: relative;
	border-radius: 25px;
}

.checkbox_item .checkbox_wrap .checkbox_mark:before,
.checkbox_item .checkbox_wrap .checkbox_mark:after{
	content: "";
	position: absolute;
	transition: all 0.5s ease;
}



/* basic styles */
.checkbox_item.citem_1 .checkbox_wrap .checkbox_mark{
	background: #f0f0f0;
	width: 100px;
	height: 50px;
	padding: 2px;
    display: flex;
}

.checkbox_item.citem_1 .checkbox_wrap .checkbox_mark:before{
	top: 3px;
	left: 3px;
	width: 44px;
	height: 44px;
	background: #fff;
	border-radius: 50%;
}

.checkbox_item.citem_1 .checkbox_wrap .checkbox_inp:checked ~ .checkbox_mark{
	background: #34bfa3;
}

.checkbox_item.citem_1 .checkbox_wrap .checkbox_inp:checked ~ .checkbox_mark:before{
	left: 54px;
}

</style>