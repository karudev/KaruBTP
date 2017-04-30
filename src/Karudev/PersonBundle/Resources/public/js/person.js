$(function(){
  
  $("form[name='search_person']").submit(function(e){
      e.preventDefault();
      
      $.post(Routing.generate('karudev_persons_person_search'),$(this).serializeArray(),function(){
          
      });
  });
   
});