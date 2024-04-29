<?php
class handle_url
{

    public static  function getUrl()
    {
        $request = $_SERVER['REQUEST_URI'];
        $folder_name = handle_url::getParent_Index();
        // URL đầu vào
        $url = $request;
        // Tìm vị trí của từ "Web2" trong chuỗi URL
        $pos = strpos($url, $folder_name);
        if ($pos == true) {
            // Cắt chuỗi từ đầu đến vị trí "Web2" (bao gồm cả "Web2")
            $url = substr($url, 0, $pos + strlen($folder_name));
            // Loại bỏ ký tự "/" cuối cùng nếu có
            $url = rtrim($url, "/");
        }
        return $url;
    }

    public static  function getParent_Index()
    {
        // Lấy đường dẫn tuyệt đối của file đang thực thi
        $script_path = $_SERVER['SCRIPT_FILENAME'];
        // Lấy thư mục chứa file đang thực thi
        $folder_path = dirname($script_path);
        // Lấy tên của thư mục từ đường dẫn
        $folder_name = basename($folder_path);
        return $folder_name;
    }

    public static  function getURLAdmin($request)   {
        $parts = explode("/", $request);  // Tách chuỗi thành các phần tử dựa trên dấu "/"
        $index = array_search("admin", $parts);  // Tìm vị trí của từ khóa "admin"
        $url = implode("/", array_slice($parts, 0, $index + 1));  // Lấy phần từ đầu đến từ khóa "admin" và kết hợp lại thành chuỗi
        return $url;
    }


}
