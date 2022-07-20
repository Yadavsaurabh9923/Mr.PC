function updatecarttotal() {
    totalproducts=document.getElementsByClassName('cartrow')
    // var totalprice = 0
    totalquantity = 0
    subtotal = 0
    tax = 0

    for (var i=0; i<totalproducts.length;i++){
        var cartrow = totalproducts[i]

        var productprice = cartrow.getElementsByClassName('productprice')[0]
        var price = parseFloat(productprice.innerText.replace('₹',''))
        var productquantity = cartrow.getElementsByClassName('quantity')[0]
        var quantity = productquantity.value
        
        cartrow.getElementsByClassName('pprice')[0].innerHTML = '₹'+ price*quantity + '.00'
        
        // console.log(quantity)
        totalquantity = totalquantity + parseInt(quantity)

        document.getElementById('totalquantity').innerHTML = totalquantity  
        // console.log(test)
        subtotal= subtotal + (price * quantity)
        document.getElementById('totalsubtotal').innerHTML = '₹'+subtotal+'.00'
        
        tax = (subtotal/100)*18
        document.getElementById('tax').innerHTML = '₹'+parseFloat(tax).toFixed(2);

        document.getElementById('totalamount').innerHTML = '₹'+subtotal+'.00'

    }
    
    // document.getElementsByClassName('totalquantity').innerText = totalquantity
}

function changeinput(event){
    var input = event.target
    updatecarttotal()
}


function checkinput(){
    var quantityinputs = document.getElementsByClassName('quantity')
    for (var i=0; i<quantityinputs.length;i++){ 
        var input = quantityinputs[i]

        input.addEventListener('change',changeinput)
}
}

function encryption(){
    var baseString1 = subtotal.toString();
    var encodedString1 = window.btoa( baseString1 );

    var baseString2 = totalquantity.toString();
    var encodedString2 = window.btoa( baseString2 );

    var baseString3 = tax.toString();
    var encodedString3 = window.btoa( baseString3 );

    location.href = "http://localhost/Website/Homepage/Products/Cartpage/Checkoutpage/checkoutpage.php?value1="+encodedString1+"&value2="+encodedString2+"&value3="+encodedString3;

}


updatecarttotal()
checkinput()


function checkcoupon(){
    var coupon = document.getElementById("couponcode").value;
    coupon = coupon.toUpperCase();
    if(coupon=="MRPC10"){
        var discount=(subtotal/100)*10
        discount = parseFloat(discount).toFixed(2)
        
        var total = subtotal - discount

        document.getElementById('totalprice').innerHTML = 'Total'+'( Discount of 10% Applied )'
        document.getElementById('totalamount').innerHTML = '₹'+total+'.00'
    }
    else{
        alert('Invalid Coupon')    }

}