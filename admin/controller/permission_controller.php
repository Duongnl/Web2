<?php session_start();
// require_once('./admin/model/ctphanquyen_model.php');
// require_once('./admin/model/phanquyen_model.php');

require_once('./admin/model/quyen_model.php');
require_once('./admin/model/db_config.php');
require_once('./admin/model/phanquyen_model.php');

$request = $_SERVER['REQUEST_URI'];
$url = handle_url::getURLAdmin($request);



if ( isset($_POST['action']) )
{
    $permission_id = $_POST['permission_id'];
    $Permission_name = $_POST['Permission_name'];
    $quyen_model = new quyen_model();
    $action = $_POST['action'];
    
    if ($action == 'add') {
        $quyen_model->insertQuyenData( $Permission_name , 1);
    }
    else if ($action =='edit') {
        $quyen_model->UpdateQuyenData( $permission_id, $Permission_name,1);
    } else if ($action == 'delete') {
        // echo $permission_id . $Permission_name ;
        $quyen_model->UpdateQuyenData( $permission_id, $Permission_name,0);
        
        $query = $quyen_model->getAccountDataForPhanQuyen($permission_id);
        while ($row = mysqli_fetch_array($query)) {
            $quyen_model->UpdateAccountPhanQuyen($row['MaTK']);
        }

    }
    
    
    $_SESSION['back_from_controller'] = true;
    header("Location: $url/permission");
    exit; // Dừng thực thi PHP sau khi chuyển hướng
}




if (isset($_POST["save"])) 
{   
    $phanquyen_model = new phanquyen_model();

    $phanquyen_model->deleteAllPhanQuyen($_POST["maQuyen"]);

    
    if (isset($_POST['QuyenThongKe']) == false)
    {
        $QuyenThongKe = "off";
    } else {
        $QuyenThongKe =$_POST['QuyenThongKe'];
    $phanquyen_model->insertPhanQuyenData($_POST["maQuyen"],1);
    }
    if (isset( $_POST['QuyenCategory']) == false)
    {
        $QuyenCategory = "off";
    } else {
        $QuyenCategory =$_POST['QuyenCategory'];
    $phanquyen_model->insertPhanQuyenData($_POST["maQuyen"],2);

    }


    if (isset( $_POST['QuyenSanPham']) == false)
    {
        $QuyenSanPham = "off";
    } else {
        $QuyenSanPham =$_POST['QuyenSanPham'];
    $phanquyen_model->insertPhanQuyenData($_POST["maQuyen"],3);

    }

    if (isset( $_POST['QuyenDiscount']) == false)
    {
        $QuyenDiscount = "off";
    } else {
        $QuyenDiscount =$_POST['QuyenDiscount'];
    $phanquyen_model->insertPhanQuyenData($_POST["maQuyen"],4);

    }


    if (isset( $_POST['QuyenSupplier']) == false)
    {
        $QuyenSupplier = "off";
    } else {
        $QuyenSupplier =$_POST['QuyenSupplier'];
    $phanquyen_model->insertPhanQuyenData($_POST["maQuyen"],5);

    }

    if (isset( $_POST['QuyenUser']) == false)
    {
        $QuyenUser = "off";
    } else {
        $QuyenUser =$_POST['QuyenUser'];
    $phanquyen_model->insertPhanQuyenData($_POST["maQuyen"],11);

    }

    
    if (isset( $_POST['QuyenStaff']) == false)
    {
        $QuyenStaff = "off";
    } else {
        $QuyenStaff =$_POST['QuyenStaff'];
    $phanquyen_model->insertPhanQuyenData($_POST["maQuyen"],6);

    }

    
    if (isset( $_POST['QuyenGuest']) == false)
    {
        $QuyenGuest = "off";
    } else {
        $QuyenGuest =$_POST['QuyenGuest'];
    $phanquyen_model->insertPhanQuyenData($_POST["maQuyen"],7);

    }


    
    if (isset( $_POST['QuyenOrder']) == false)
    {
        $QuyenOrder = "off";
    } else {
        $QuyenOrder =$_POST['QuyenOrder'];
    $phanquyen_model->insertPhanQuyenData($_POST["maQuyen"],8);

    }

    
    if (isset( $_POST['QuyenNhap']) == false)
    {
        $QuyenNhap = "off";
    } else {
        $QuyenNhap =$_POST['QuyenNhap'];
    $phanquyen_model->insertPhanQuyenData($_POST["maQuyen"],9);

    }

    if (isset( $_POST['QuyenDuyetNhap']) == false)
    {
        $QuyenDuyetNhap = "off";
    } else {
        $QuyenDuyetNhap =$_POST['QuyenDuyetNhap'];
    $phanquyen_model->insertPhanQuyenData($_POST["maQuyen"],10);

    }

    if (isset( $_POST['QuyenQly']) == false)
    {
        $QuyenQly = "off";
    } else {
        $QuyenQly =$_POST['QuyenQly'];
    $phanquyen_model->insertPhanQuyenData($_POST["maQuyen"],12);

    }

    
    $_SESSION['back_from_controller'] = true;
    header("Location: $url/permission");
    exit; // Dừng thực thi PHP sau khi chuyển hướng
    
    
    // $QuyenCategory=$_POST['QuyenCategory'];
    // $QuyenSanPham=$_POST['QuyenSanPham'];
    // $QuyenDiscount=$_POST['QuyenDiscount'];
    // $QuyenSupplier=$_POST['QuyenSupplier'];
    // $QuyenUser=$_POST['QuyenUser'];
    // $QuyenStaff=$_POST['QuyenStaff'];
    // $QuyenGuest=$_POST['QuyenGuest'];
    // $QuyenOrder=$_POST['QuyenOrder'];
    // $QuyenNhap=$_POST['QuyenNhap'];
    // $QuyenDuyetNhap=$_POST['QuyenDuyetNhap'];
    // $QuyenQly=$_POST['QuyenQly'];

    // echo $QuyenThongKe;

    // $ctphanquyen_model= new ctphanquyen_model();
    // $phanquyen_model = new phanquyen_model();
    // $quyen_model = new quyen_model();

    // if($QuyenThongKe==true){
    //     $quyen_model->getQuyenData();
    //     $
    //     $phanquyen_model->
    // }


}




