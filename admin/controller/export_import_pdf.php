<?php
require('./system/library/tcpdf/tcpdf.php');

class export_pdf {
    public static function export($maPN)  {
        $import_model = new import_model();
        $query = $import_model->getImportAndStaff($maPN);
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
 
        $pdf->Cell(0, 10, 'Phiếu nhập' , 0, 1,'C');
        $pdf->Cell(0, 10, 'Mã PN: ' . $row['MaPN'] , 0, 1,'L');
        $pdf->Cell(0, 10, 'Tên tài khoản: ' . $row['TenTK'] , 0, 1,'L');
        $pdf->Cell(0, 10, 'Tên nhân viên: ' . $row['TenNV'] , 0, 1,'L');
        $pdf->Cell(0, 10, 'Nhà cung cấp: ' . $row['MaNCC']. ' '.$row['TenNCC'] , 0, 1,'L');
        $pdf->Cell(0, 10, 'Thanh toán: ' . number_format($row['ThanhToan']).'đ', 0, 1,'L');
        $pdf->Cell(0, 10, 'Thời gian: ' . $row['ThoiGianPN'] , 0, 1,'L');
        
        
       
        $pdf->SetFillColor(255, 255, 255); // Màu nền cho bảng
        // Định nghĩa số cột và chiều rộng của từng cột
        $columnCount = 6;
        $columnWidths = array(15, 30, 15,50,20,70); // Đơn vị là mm
        // Tiêu đề bảng
        $pdf->Cell(array_sum($columnWidths), 10, 'GRN Detail', 0, 1, 'C', 1);
        // Tiêu đề cột
        $pdf->SetFillColor(192, 192, 192); // Màu nền cho tiêu đề cột
        $pdf->SetFont('dejavusans', 'B', 12);
        $pdf->Cell($columnWidths[0], 10, 'Mã SP', 1, 0, 'C', 1);
        $pdf->Cell($columnWidths[1], 10, 'Tên SP', 1, 0, 'C', 1);
        $pdf->Cell($columnWidths[2], 10, 'Size', 1, 0, 'C', 1);
        $pdf->Cell($columnWidths[3], 10, 'Đơn giá', 1, 0, 'C', 1);
        $pdf->Cell($columnWidths[4], 10, 'Số lượng', 1, 0, 'C', 1);
        $pdf->Cell($columnWidths[5], 10, 'Thành tiền', 1, 0, 'C', 1);
        $pdf->Ln(); // Xuống dòng
        // Dữ liệu cho bảng
        
        // In dữ liệu vào bảng
        $pdf->SetFont('dejavusans', '', 10);
        $query1 = $import_model->getImportDetailData($maPN);
        while ($row = mysqli_fetch_array($query1)) {
                $pdf->MultiCell($columnWidths[0], 10, $row['MaSP'], 1, 'L', 0, 0, '', '', true, 0, false, true, 0, 'T');
                $pdf->MultiCell($columnWidths[1], 10, $row['TenSP'], 1, 'L', 0, 0, '', '', true, 0, false, true, 0, 'T');
                $pdf->MultiCell($columnWidths[2], 10, $row['MaSize'], 1, 'L', 0, 0, '', '', true, 0, false, true, 0, 'T');
                $pdf->MultiCell($columnWidths[3], 10, number_format($row['DonGia']).'đ', 1, 'L', 0, 0, '', '', true, 0, false, true, 0, 'T');
                $pdf->MultiCell($columnWidths[4], 10, $row['SoLuongCTPN'], 1, 'L', 0, 0, '', '', true, 0, false, true, 0, 'T');
                $pdf->MultiCell($columnWidths[5], 10, number_format($row['ThanhTien']).'đ', 1, 'L', 0, 0, '', '', true, 0, false, true, 0, 'T');
            $pdf->Ln(); 
        }
        $pdf->SetFont('dejavusans', '', 12);
        $pdf->Cell(0, 10, '', 0, 1,'L');
        $pdf->Cell(4);
        $pdf->Cell(0, 10, '                                    Staff                                        Supplier', 0, 1,'L');
        // Kết thúc tài liệu
        $pdfData = $pdf->Output('', 'S'); // Lưu tệp PDF vào biến $pdfData
        return $pdfData;
    }
}
