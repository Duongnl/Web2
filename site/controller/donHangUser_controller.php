<?php session_start();
require_once('../Web2/site/model/chiTietDonHangUser_model.php');
require_once('../Web2/site/model/donHangUser_model.php');
require_once('../Web2/admin/model/db_config.php');


$request = $_SERVER['REQUEST_URI'];
$url = handle_url::getURLAdmin($request);

if ( isset($_POST['action'])  && isset($_POST['MaHD']) )
{
   $action =  $_POST['action'];
   $MaHD = $_POST['MaHD'];
   $donHangUser_model = new donHangUser_model();
   if ($action == 'XuLy') {
        $ctdn_md= new chiTietDonHangUser_model();
        if($ctdn_md->updateSoLuong_updateTrangThai(trim($MaHD))){
            $quanLyDonHang_Model->UpdateTrangThaiDonHang(trim($MaHD),1);
            $_SESSION['Duyet_ThanhCong'] = true;
            $_SESSION['Duyet_ThatBai'] = false;
            
        }else{
            $_SESSION['Duyet_ThatBai'] = true;
            $_SESSION['Duyet_ThanhCong'] = false;
        }
    }
    else if ($action =='Huy') {
        $donHangUser_model->UpdateTrangThaiDonHang( trim($MaHD),2);
    }

    header("Location: $url./order");
    exit; // Dừng thực thi PHP sau khi chuyển hướng

}   





