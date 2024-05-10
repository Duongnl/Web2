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
 
        $pdf->Cell(0, 10, 'GRN' , 0, 1,'C');
        $pdf->Cell(0, 10, 'Import ID: ' . $row['MaPN'] , 0, 1,'L');
        $pdf->Cell(0, 10, 'Account staff: ' . $row['TenTK'] , 0, 1,'L');
        $pdf->Cell(0, 10, 'Staff name: ' . $row['TenNV'] , 0, 1,'L');
        $pdf->Cell(0, 10, 'Supplier: ' . $row['MaNCC']. ' '.$row['TenNCC'] , 0, 1,'L');
        $pdf->Cell(0, 10, 'Total: ' . $row['ThanhToan'], 0, 1,'L');
        $pdf->Cell(0, 10, 'Time: ' . $row['ThoiGianPN'] , 0, 1,'L');
        
        
       
        $pdf->SetFillColor(255, 255, 255); // Màu nền cho bảng
        // Định nghĩa số cột và chiều rộng của từng cột
        $columnCount = 6;
        $columnWidths = array(25, 72, 15,17,32,32); // Đơn vị là mm
        // Tiêu đề bảng
        $pdf->Cell(array_sum($columnWidths), 10, 'GRN Detail', 0, 1, 'C', 1);
        // Tiêu đề cột
        $pdf->SetFillColor(192, 192, 192); // Màu nền cho tiêu đề cột
        $pdf->SetFont('dejavusans', 'B', 12);
        $pdf->Cell($columnWidths[0], 10, 'Product ID', 1, 0, 'C', 1);
        $pdf->Cell($columnWidths[1], 10, 'Product name', 1, 0, 'C', 1);
        $pdf->Cell($columnWidths[2], 10, 'Size', 1, 0, 'C', 1);
        $pdf->Cell($columnWidths[3], 10, 'Cost', 1, 0, 'C', 1);
        $pdf->Cell($columnWidths[4], 10, 'Quantity', 1, 0, 'C', 1);
        $pdf->Cell($columnWidths[5], 10, 'Total', 1, 0, 'C', 1);
        $pdf->Ln(); // Xuống dòng
        // Dữ liệu cho bảng
        
        // In dữ liệu vào bảng
        $pdf->SetFont('dejavusans', '', 10);
        $query1 = $import_model->getImportDetailData($maPN);
        while ($row = mysqli_fetch_array($query1)) {
                $pdf->MultiCell($columnWidths[0], 10, $row['MaSP'], 1, 'L', 0, 0, '', '', true, 0, false, true, 0, 'T');
                $pdf->MultiCell($columnWidths[1], 10, $row['TenSP'], 1, 'L', 0, 0, '', '', true, 0, false, true, 0, 'T');
                $pdf->MultiCell($columnWidths[2], 10, $row['MaSize'], 1, 'L', 0, 0, '', '', true, 0, false, true, 0, 'T');
                $pdf->MultiCell($columnWidths[3], 10, $row['DonGia'], 1, 'L', 0, 0, '', '', true, 0, false, true, 0, 'T');
                $pdf->MultiCell($columnWidths[4], 10, $row['SoLuongCTPN'], 1, 'L', 0, 0, '', '', true, 0, false, true, 0, 'T');
                $pdf->MultiCell($columnWidths[5], 10, $row['ThanhTien'], 1, 'L', 0, 0, '', '', true, 0, false, true, 0, 'T');
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
