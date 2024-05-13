

<div class="main-content">
    <div class="back">
    <a type="button" href="<?php echo $url.'/permission'?>" class="btn btn-light" >
    <i class="fa-solid fa-arrow-left" style="display: inline-block; font-size: 30px; "></i>
    </a>
    </div>
<div class="wrapper">
    <div class="right_colum">
            <div class="checkbox_item citem_1">
		        <label class="checkbox_wrap">
			        <input type="checkbox" name="checkbox" class="checkbox_inp q1">
			        <span class="checkbox_mark"></span>
		        </label>
		    <div class="title">Quản lý Thống kê </div>
	        </div>

            <div class="checkbox_item citem_1">
		        <label class="checkbox_wrap">
			        <input type="checkbox" name="checkbox" class="checkbox_inp q2">
			        <span class="checkbox_mark"></span>
		        </label>
		    <div class="title">Quản Lý Sản Phẩm </div>
	        </div>

            <div class="checkbox_item citem_1">
		        <label class="checkbox_wrap">
			        <input type="checkbox" name="checkbox" class="checkbox_inp q3">
			        <span class="checkbox_mark"></span>
		        </label>
		    <div class="title">Quản Lý Category  </div>
	        </div>

            <div class="checkbox_item citem_1">
		        <label class="checkbox_wrap">
			        <input type="checkbox" name="checkbox" class="checkbox_inp q4">
			        <span class="checkbox_mark"></span>
		        </label>
		    <div class="title">Quản lý Discount </div>
	        </div>

            <div class="checkbox_item citem_1">
		        <label class="checkbox_wrap">
			        <input type="checkbox" name="checkbox" class="checkbox_inp q5">
			        <span class="checkbox_mark"></span>
		        </label>
		    <div class="title">Quản lý Supplier</div>
	        </div>


        
    </div>
    <div class="left_colum">
            
    <div class="checkbox_item citem_1">
		        <label class="checkbox_wrap">
			        <input type="checkbox" name="checkbox" class="checkbox_inp q6 ">
			        <span class="checkbox_mark"></span>
		        </label>
		    <div class="title">Quản Lý Staff</div>
	        </div>

            <div class="checkbox_item citem_1">
		        <label class="checkbox_wrap">
			        <input type="checkbox" name="checkbox" class="checkbox_inp q7">
			        <span class="checkbox_mark"></span>
		        </label>
		    <div class="title">Quản Lý Guest</div>
	        </div>

            <div class="checkbox_item citem_1">
		        <label class="checkbox_wrap">
			        <input type="checkbox" name="checkbox" class="checkbox_inp q8">
			        <span class="checkbox_mark"></span>
		        </label>
		    <div class="title">Quản lý Order </div>
	        </div>

            <div class="checkbox_item citem_1">
		        <label class="checkbox_wrap">
			        <input type="checkbox" name="checkbox" class="checkbox_inp q9">
			        <span class="checkbox_mark"></span>
		        </label>
		    <div class="title">Quản Lý Import </div>
	        </div>

            <div class="checkbox_item citem_1">
		        <label class="checkbox_wrap">
			        <input type="checkbox" name="checkbox" class="checkbox_inp q10">
			        <span class="checkbox_mark"></span>
		        </label>
		    <div class="title">Quản lý Duyệt Nhập </div>
	        </div>



	    
	</div>
	
</div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	outline: none;
	font-family: 'Open Sans', sans-serif;
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
    border-radius:15px;
    padding: 20px 50px;
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