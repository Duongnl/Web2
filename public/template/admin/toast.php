<?php 
 class toast {
  
    public static function memo($text, $session, $color) {
?>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11" >
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: <?php echo $color ?> ">
    <div class="toast-header">
      <i class="fa-solid fa-comment rounded me-2"></i> 
      <strong class="me-auto">Notification</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
       <?php echo $text?>
    </div>
  </div>
</div>
<?php
if (isset($_SESSION[$session]) && $_SESSION[$session] == true) {
    // Xóa cờ để tránh hiển thị thông báo nếu trang được tải lại
    unset($_SESSION[$session]);
?>
<script>
 document.addEventListener('DOMContentLoaded', function() {
        var toastLiveExample = document.getElementById('liveToast')
        var toast = new bootstrap.Toast(toastLiveExample);
        toast.show();
    });
</script>

<?php
    }
  }
  
}
?>



