<?php 
class import_model {
    private $db_config ;

    public function __construct() {
        $this->db_config =  new db_config();

    }

     function getImportData () {
       
        $this->db_config->connect();
        $sql = "SELECT *, phieunhap.TrangThai as TrangThaiPN 
        FROM phieunhap, nhanvien, nhacungcap 
        WHERE phieunhap.MaTK = nhanvien.MaTK 
            AND nhacungcap.MaNCC = phieunhap.MaNCC
        ORDER BY phieunhap.MaPN ASC";
        return $this->db_config->execute($sql);
    }

    function getImportDataEnd() {
        $this->db_config->connect();
        $sql = "SELECT *, phieunhap.TrangThai as TrangThaiPN 
                FROM phieunhap, nhanvien, nhacungcap 
                WHERE phieunhap.MaTK = nhanvien.MaTK 
                    AND nhacungcap.MaNCC = phieunhap.MaNCC
                ORDER BY phieunhap.MaPN DESC
                LIMIT 1";
        return $this->db_config->execute($sql);
    }

    function getProductData () {
        $this->db_config->connect();
        $sql = "SELECT * FROM sanpham WHERE sanpham.TrangThai =1";
        return $this->db_config->execute($sql);
    }

    function getImportAndStaff($maPN){
        $this->db_config->connect();
        $sql = "SELECT *, phieunhap.ThoiGian as ThoiGianPN FROM phieunhap, taikhoan,nhanvien,nhacungcap WHERE phieunhap.MaTK = taikhoan.MaTK AND phieunhap.MaTK = nhanvien.MaTK AND phieunhap.MaNCC = nhacungcap.MaNCC AND phieunhap.MaPN = ".$maPN ;
        return $this->db_config->execute($sql);
    }

    function addProductFromImport ($maPN) {
        $this->db_config->connect();
        $sql = "SELECT * FROM ctphieunhap WHERE ctphieunhap.MaPN = ".$maPN;
        $query =  $this->db_config->execute($sql);
        $import_model = new import_model();
        while ($row = mysqli_fetch_array($query)) {
            $import_model->updateQuantity($row['MaSP'], $row['MaSize'], $row['SoLuong'] );
            $import_model->updateSLSP($row['MaSP']);
        }

    }

    function updateQuantity ($maSP, $maSize, $soLuong) {
        $this->db_config->connect();
        $sqlGet = "SELECT * FROM size WHERE MaSP = '$maSP' AND MaSize = '$maSize'";
        $queryGeT =   $this->db_config->execute($sqlGet);
        $rowGet = mysqli_fetch_array($queryGeT);
        $soLuongUpdate = $rowGet['SoLuong'] + $soLuong;

        $sqlUpdate = "UPDATE size SET SoLuong = '$soLuongUpdate' WHERE MaSP = '$maSP' AND MaSize = '$maSize' ";
        $this->db_config->execute($sqlUpdate);
    }

    function updateSLSP ($maSP) {
        $this->db_config->connect();
        $sql = "SELECT *, SUM(size.SoLuong) AS TongSoLuong FROM sanpham
        JOIN size ON sanpham.MaSP = size.MaSP 
        WHERE sanpham.MaSP = '$maSP' 
        GROUP BY sanpham.MaSP 
         ";
        $queryGeT =   $this->db_config->execute($sql);
        $rowGet = mysqli_fetch_array($queryGeT);
        $tongSoLuong = $rowGet['TongSoLuong'] ;

        $sqlUpdate  = "UPDATE sanpham SET SoLuong = '$tongSoLuong' WHERE MaSP = '$maSP'";
        $this->db_config->execute($sqlUpdate);
    }

    function getImportDetailData ($maPN){
        $this->db_config->connect();
        $sql = "SELECT *, ctphieunhap.SoLuong as SoLuongCTPN FROM ctphieunhap,sanpham WHERE ctphieunhap.MaSP = sanpham.MaSP AND ctphieunhap.MaPN =".$maPN;
        return $this->db_config->execute($sql);
    }

    function getSizeProduct ($maSP) {
        $this->db_config->connect();
        $sql = "SELECT * FROM sanpham, size WHERE sanpham.MaSP = size.MaSP AND sanpham.MaSP = ".$maSP;
        return $this->db_config->execute($sql);
    }

    
    function insertImportData (  $maTK, $maNCC, $thanhToan, $thoiGian, $trangThai) {
        $this->db_config->connect();
        $sql = "INSERT INTO phieunhap (MaPN, MaTK, maNCC, ThanhToan, ThoiGian, TrangThai) VALUES (null,'$maTK', '$maNCC','$thanhToan', '$thoiGian', '$trangThai')";
        return  $this->db_config->execute($sql);
    }

    function insertImportDetailData ($maPN,$maSP, $donGia,$soLuong, $thanhTien, $maSize) {
        $this->db_config->connect();
        $sql = "INSERT INTO ctphieunhap (MaCTPN, MaPN, MaSP, DonGia, SoLuong, ThanhTien,MaSize) VALUES (null,'$maPN', '$maSP','$donGia', '$soLuong', '$thanhTien', '$maSize')";
        return  $this->db_config->execute($sql);
    }

    function updateStatusImport ($maPN,$trangThai ) {
        $this->db_config->connect();
        $sql = "UPDATE phieunhap SET TrangThai = '$trangThai' WHERE MaPN = '$maPN' ";
        return  $this->db_config->execute($sql);
    }

    function deleteSupplierData ($maPN) {
        $this->db_config->connect();
        $sql = "DELETE FROM phieunhap WHERE MaNCC = '$maPN'";
        return  $this->db_config->execute($sql);
    }

    function filterImportFollowDate ($dateStart, $dateEnd) {
        $this->db_config->connect();
        $sql = "SELECT *, phieunhap.TrangThai as TrangThaiPN 
        FROM phieunhap, nhanvien, nhacungcap 
        WHERE phieunhap.MaTK = nhanvien.MaTK 
            AND nhacungcap.MaNCC = phieunhap.MaNCC AND phieunhap.ThoiGian >= '$dateStart' AND phieunhap.Thoigian <= '$dateEnd'
        ORDER BY phieunhap.MaPN ASC";
        return  $this->db_config->execute($sql);
    }

}

