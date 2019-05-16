if(document.readyState =='loading')
{
  document.addEventListener('DOMContentLoaded', ready)
}else {
  ready()
}

/*
function increaseValue() {
  var value = parseInt(document.getElementsByClassName('number').innerText, 10);
  value = isNaN(value) ? 0 : value;
  value++;
console.log(value);
  document.getElementsByClassName('number').Text=value;
}*/




function ready(){
console.log("here")

var removeCarteItemButton = document.getElementsByClassName("remove")
console.log(removeCarteItemButton)
for (var i=0 ; i < removeCarteItemButton.length ; i++ )
{
  var button = removeCarteItemButton[i]
  button.addEventListener("click", removeCarteItem )
}

var quantityInputs= document.getElementsByClassName("quantity")

for (var i=0 ; i < quantityInputs.length ; i++ )
{
  var input = quantityInputs[i]

  input.addEventListener("change", function(event){
    var input = event.target
    console.log(event.target)
var quantityInputsverif2= document.getElementsByClassName("quantityVrif").value
var verif=Number(event.target.previousElementSibling.value)
console.log(verif)
    console.log(input.value)
    if(isNaN(input.value) || input.value <= 0 || input.value > verif )
    {
      input.value=1
    }
    updateCartTotal()
  } );
}

}



function removeCarteItem(event)
{
  var buttonClicked = event.target
  buttonClicked.parentElement.parentElement.remove()
  updateCartTotal()

}

function updateCartTotal(){

  var carteItemContainer = document.getElementsByClassName("cart-item")[0]
  var cartRows = carteItemContainer.getElementsByClassName("cart-row")
  var total = 0
  for (var i=0 ; i < cartRows.length ; i++ )
  {
    var cartRow = cartRows[i]
    console.log("dkhal 1")
    var priceElement = cartRow.getElementsByClassName("priceCart")[0]
    var quantityElement = cartRow.getElementsByClassName("quantity")[0]
    var price = priceElement.innerText.replace(' TND','')
    var quantity = quantityElement.value
    console.log(price*quantity)
    total = total + (price*quantity)
    console.log(total);

  }
  total = Math.round(total * 100) / 100
  document.getElementsByClassName("total")[0].innerText = total + ' TND'

}
