// Error show by bootstrap
(function() {
    'use strict';
    window.addEventListener('load', function() {
      var forms = document.getElementsByClassName('needs-validation');
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
})();

let $NhanVien = {
    ho_ten: "",
    ngay_sinh: "",
    so_dien_thoai: "",
    email: "",
    gender: "",
    address: ""
}

document.getElementById("inputName").addEventListener("keyup", function(event) {
    $NhanVien.ho_ten = event.target.value;
    console.log("Họ và tên:", $NhanVien.ho_ten);
});

document.getElementById("inputBirthday").addEventListener("change", function(event) {
    $NhanVien.ngay_sinh = event.target.value;
    console.log("Ngày sinh:", $NhanVien.ngay_sinh);
});

document.getElementById("inputPhoneNumber").addEventListener("keyup", function(event) {
    $NhanVien.so_dien_thoai = event.target.value;
    console.log("Số điện thoại:", $NhanVien.so_dien_thoai);
});

document.getElementById("inputEmail").addEventListener("keyup", function(event) {
    $NhanVien.email = event.target.value;
    console.log("Email:", $NhanVien.email);
    
});

document.getElementById("inputGender").addEventListener("change", function(event) {
    $NhanVien.gender = event.target.value;
    console.log("Gender:", $NhanVien.gender);
});

document.getElementById("inputAddress").addEventListener("keyup", function(event) {
    $NhanVien.address = event.target.value;
    console.log("Address:", $NhanVien.address);
});

document.getElementById("employeeInformation").addEventListener("submit", function(event) {
    event.preventDefault();
    console.log("Dữ liệu gửi đi:", $NhanVien);
});
