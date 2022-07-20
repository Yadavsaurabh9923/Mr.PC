// Add active class to the current list tem (highlight it)

var checkoutList = document.getElementById("checkoutList");
var checkoutItems = checkoutList.getElementsByClassName("step-checkout_item");
for (var i = 0; i < checkoutItems.length; i++) {
  checkoutItems[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}


$('#radioApple').click(function() {
  if($('#radioApple').is(':checked')) 
  { 
    // alert(document.getElementById('homeaddress').innerText);
    var str = document.getElementById('homeaddress').innerText;
    var str_array = str.split(',');

    for(var i = 0; i < str_array.length; i++) {
      str_array[i] = str_array[i].replace(/^\s*/, "").replace(/\s*$/, "");
      }
    
    document.getElementById('addl1').value=str_array[0];
    document.getElementById('addl2').value=str_array[1];
    document.getElementById('dist').value=str_array[2];
    document.getElementById('state').value=str_array[3];
    document.getElementById('country').value=str_array[4];
    document.getElementById('pincode').value=str_array[5];
  }
});

$('#radioBanana').click(function() {
  if($('#radioBanana').is(':checked')) 
  { 
    // alert(document.getElementById('homeaddress').innerText);
    var str = document.getElementById('officeaddress').innerText;
    var str_array = str.split(',');

    for(var i = 0; i < str_array.length; i++) {
      str_array[i] = str_array[i].replace(/^\s*/, "").replace(/\s*$/, "");
      }
    
    document.getElementById('addl1').value=str_array[0];
    document.getElementById('addl2').value=str_array[1];
    document.getElementById('dist').value=str_array[2];
    document.getElementById('state').value=str_array[3];
    document.getElementById('country').value=str_array[4];
    document.getElementById('pincode').value=str_array[5];
  }
});