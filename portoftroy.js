//Voor als de gebruiker wilt inloggen, verschijnt er een pop up
document.getElementById("knop").addEventListener("click", function(){
    document.querySelector(".popuplogin").style.display= "flex";
})

document.querySelector(".popupsluit").addEventListener("click", function(){
    document.querySelector(".popuplogin").style.display="none";})

//Hier ben ik nog aan het werken, de bedoeling is dat ik twee formulieren aan 1 knop kan verbinden
function verstuurFormulier(){
    document.forms[0].submit();
        document.forms[1].submit();
   

}

//Zoekfunctie voor de administratie pagina
//Maakt het makkelijker om reservaties te vinden
function zoekFunctie() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("mijnInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("reservatieTabel");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}


$(document).ready(function(){
    $('.search').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('#reservatieTabel tbody tr').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
});