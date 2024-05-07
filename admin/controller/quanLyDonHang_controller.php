<?php session_start();
require_once('./admin/model/quanLyDonHang_model.php');
require_once('./admin/model/chiTietDonHang_model.php');
require_once('./admin/model/db_config.php');


$request = $_SERVER['REQUEST_URI'];
$url = handle_url::getURLAdmin($request);

if ( isset($_POST['action'])  && isset($_POST['MaHD']) )
{
   $action =  $_POST['action'];
   $MaHD = $_POST['MaHD'];
   $quanLyDonHang_Model = new quanLyDonHang_model();
   if ($action == 'XuLy') {
        $ctdn_md= new chiTietDonHang_model();
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
        $quanLyDonHang_Model->UpdateTrangThaiDonHang( trim($MaHD),2);
    }

    header("Location: $url/order");
    exit; // Dừng thực thi PHP sau khi chuyển hướng

}   





