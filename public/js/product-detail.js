
document.getElementById('increase').addEventListener('click', function () {
  var soLuong = parseInt(document.getElementById('chiTietMonHang_thongTin_BUY_SoLuong').value, 10);
  soLuong++;
  if(soLuong <= document.getElementById('chiTietMonHang_thongTin_BUY_SoLuong').max ) {
    document.getElementById('chiTietMonHang_thongTin_BUY_SoLuong').value = soLuong;
  }
});

document.getElementById('decrease').addEventListener('click', function () {
  var value = parseInt(document.getElementById('chiTietMonHang_thongTin_BUY_SoLuong').value, 10);
  value = isNaN(value) ? 0 : value;
  if (value > 1) {
    value--;
    document.getElementById('chiTietMonHang_thongTin_BUY_SoLuong').value = value;
  }
});


document.querySelectorAll('.img_cacAnh').forEach(function (element) {

  if (element.src.value != "") {
    element.addEventListener("click", function (event) {
      var src = event.target.src
      document.querySelector('.img_anhChinh').setAttribute("src", src);
    })
  }
})






