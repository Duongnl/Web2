<?php session_start();
require_once('../model/quanLyDonHang_model.php');
require_once('../model/db_config.php');
if ( isset($_POST['action'])  && isset($_POST['MaHD']) )
{
   $action =  $_POST['action'];
   $MaHD = $_POST['MaHD'];
   $quanLyDonHang_Model = new quanLyDonHang_model();
   if ($action == 'XuLy') {
        $quanLyDonHang_Model->UpdateTrangThaiDonHang( trim($MaHD),1);
    }
    else if ($action =='Huy') {
        $quanLyDonHang_Model->UpdateTrangThaiDonHang( trim($MaHD),2);
    }
    $_SESSION['quanLyDonHang_controller'] = true;
    header("Location: ../view/quanLyDonHang_page.php");
    exit; // Dừng thực thi PHP sau khi chuyển hướng

}   





