(function dontGo($)
{
  $('.addpanier').click(function(event) {
    event.preventDefault();
    $.get($(this).attr('href'),{},function(data)
    {

       if(confirm(data.message + '. Voulez vous consulter votre panier ? '))
       {
         location.href = 'Panier.php';
       }else {
 $('.countcart').empty().append(data.count);


     }

    },'json');
    return false;
  });
  $('.deletepanier').click(function(event) {
    event.preventDefault();
    $.get($(this).attr('href'),{},function(data)
    {
     $('.countcart').empty().append(data.count);
     alert(data.message);

    },'json');
    return false;
  });

  $('.deleteCommande').click(function(event) {
    event.preventDefault();
    $.get($(this).attr('href'),{},function(data)
    {
     alert(data.message);
    },'json');


    return false;
  });
})(jQuery)
