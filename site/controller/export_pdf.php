<?php
require('./system/library/tcpdf/tcpdf.php');
// require_once('../model/chiTietDonHang_model.php');
// require_once('../model/db_config.php');

class export_pdf {
    public static function export($maHD)  {
        $chiTietDonHangUser_model = new chiTietDonHangUser_model();
        $query = $chiTietDonHangUser_model->getChiTietDonHang_TaiKhoan($maHD);
        $row = mysqli_fetch_array($query);
        
        $pdf = new TCPDF();
        // Thiết lập thông tin tài liệu
        $pdf->SetCreator('Your Name');
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('100');
        
        $pdf->SetSubject('Test PDF');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
        // Thêm một trang mới
        $pdf->AddPage();
        // Bắt đầu nội dung của tài liệu
        $pdf->SetFont('dejavusans', '', 12);
 
        $pdf->Cell(0, 10, 'CHI TIẾT ĐƠN HÀNG' , 0, 1,'C');
        $pdf->Cell(0, 10, 'Mã đơn hàng: ' . $row['MaHD'] , 0, 1,'L');
        $pdf->Cell(0, 10, 'Thời gian: ' . $row['ThoiGianHD'] , 0, 1,'L');
        $pdf->Cell(0, 10, 'Tên tài khoản: ' . $row['TenTK'] , 0, 1,'L');
        $pdf->Cell(0, 10, 'Tên khách hàng: ' . $row['TenKH'] , 0, 1,'L');
       
        $pdf->SetFillColor(255, 255, 255); // Màu nền cho bảng
        // Định nghĩa số cột và chiều rộng của từng cột
        $columnCount = 6;
        $columnWidths = array(17, 80, 15,17,32,32); // Đơn vị là mm
        // Tiêu đề bảng
        $pdf->Cell(array_sum($columnWidths), 10, 'Chi tiết hóa đơn', 0, 1, 'C', 1);
        // Tiêu đề cột
        $pdf->SetFillColor(192, 192, 192); // Màu nền cho tiêu đề cột
        $pdf->SetFont('dejavusans', 'B', 12);
        $pdf->Cell($columnWidths[0], 10, 'Mã SP', 1, 0, 'C', 1);
        $pdf->Cell($columnWidths[1], 10, 'Tên SP', 1, 0, 'C', 1);
        $pdf->Cell($columnWidths[2], 10, 'Size', 1, 0, 'C', 1);
        $pdf->Cell($columnWidths[3], 10, 'Đơn giá', 1, 0, 'C', 1);
        $pdf->Cell($columnWidths[4], 10, 'SL', 1, 0, 'C', 1);
        $pdf->Cell($columnWidths[5], 10, 'Thành tiền', 1, 0, 'C', 1);
        $pdf->Ln(); // Xuống dòng
        // Dữ liệu cho bảng
        
        // In dữ liệu vào bảng
        $pdf->SetFont('dejavusans', '', 10);
        $query1 = $chiTietDonHangUser_model->getChiTietDonHang($maHD);
        while ($row = mysqli_fetch_array($query1)) {
                $pdf->MultiCell($columnWidths[0], 10, $row['MaSP'], 1, 'L', 0, 0, '', '', true, 0, false, true, 0, 'T');
                $pdf->MultiCell($columnWidths[1], 10, $row['TenSP'], 1, 'L', 0, 0, '', '', true, 0, false, true, 0, 'T');
                $pdf->MultiCell($columnWidths[2], 10, $row['MaSize'], 1, 'L', 0, 0, '', '', true, 0, false, true, 0, 'T');
                $pdf->MultiCell($columnWidths[3], 10, $row['DonGia'], 1, 'L', 0, 0, '', '', true, 0, false, true, 0, 'T');
                $pdf->MultiCell($columnWidths[4], 10, $row['ctSoLuong'], 1, 'L', 0, 0, '', '', true, 0, false, true, 0, 'T');
                $pdf->MultiCell($columnWidths[5], 10, $row['ThanhTien'], 1, 'L', 0, 0, '', '', true, 0, false, true, 0, 'T');
            $pdf->Ln(); 
        }
        $pdf->SetFont('dejavusans', '', 12);
        $pdf->Cell(0, 10, '', 0, 1,'L');
        $pdf->Cell(4);
        $pdf->Cell(0, 10, 'Chữ ký người nhập                           Chữ lý hãng nhập                           Chữ ký quản lý', 0, 1,'L');
        $pdf->Cell(4);
        $pdf->Cell(0, 10, '(Ký, ghi rõ họ tên)                            (Ký, ghi rõ họ tên)                        (Ký, ghi rõ họ tên)', 0, 1,'L');
        // Kết thúc tài liệu
        $pdfData = $pdf->Output('', 'S'); // Lưu tệp PDF vào biến $pdfData
        return $pdfData;
    }
}
