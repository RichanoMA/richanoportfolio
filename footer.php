<div class="footer">
<div class="footer_container">
        <div class="footer_left-col">
          <img src="../IMG/logo3.png" alt="" class="footer_logo">
          <div class="footer_social-media">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
          </div>
          <p class="footer_rights-text">© 2020 Gemaakt door Richano Mac Andrew.</p>
        </div>

        <div class="footer_right-col">
          <h1>Onze Nieuwsbrief</h1>
          <div class="footer_border"></div>
          <p>Wilt u op de hoogte zijn van onze meest voordelige acties? Abonneer nu!</p>
          <form action="" class="footer_newsletter-form">
            <input type="text" class="footer_txtb" placeholder="Voer uw email in">
            <input type="submit" class="footer_btn" value="Verstuur">
          </form>
        </div>
      </div>
</div>
<script type="text/javascript" src="../JS/portoftroy.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
$(document).ready(function(){
    $('.mijnInput').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('#reservatieTabel tbody tr:not(:first-child)').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
});
</script>
</body>

</html>
</html>