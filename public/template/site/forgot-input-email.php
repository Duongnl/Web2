<div id="content">
  <div class="forgot_pass">
    <section>
      <form>
        <p class="tieude"> Forgot password </p>
        <div class="input_Register">
          <ion-icon name="mail-outline"></ion-icon>
          <input id="ip_user" type="email" value="" placeholder="Email" required>
          <!-- <label for ="">Email</label> -->
        </div>
        <label> </label>
        <button class="btn-register">
          <p>Forgot password </p>
        </button>
      </form>
    </section>
  </div>
</div>
<script>
window.onload = function() {
  document.getElementsById("ip_user").value = "";
};
</script>

</html>