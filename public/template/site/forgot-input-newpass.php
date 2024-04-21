<div id="content">
  <div class="repass">
    <section>
      <form>
        <h1>Repassword</h1>
        <div class="input_login">
          <ion-icon name="mail-outline"></ion-icon>
          <input id="ip_user" type="email" placeholder='User' required>
          <!-- <label for="">User</label> -->
        </div>
        <div class="input_login">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <input type="password" value="" placeholder="Password" required>
          <!-- <label for="">Password</label> -->

        </div>
        <div class="input_login">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <input type="password" value="" placeholder="Re-Password" required>
          <!-- <label for="">Re-Password</label> -->
        </div>
        <button class="btn-login"><a href="#">Save</a></button>
      </form>
    </section>
  </div>
</div>
<script>
console.log(document.getElementById('ip_user').value = 1);
window.onload = function() {
  document.getElementById('ip_user').value = "";

};
</script>

</html>