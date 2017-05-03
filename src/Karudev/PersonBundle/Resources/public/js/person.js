$(function(){
  
  $('#results').DataTable();
  
  $('form[name="choice"] input').click(function(){
      var data = $('form[name="choice"]').serializeArray();
      $.post(Routing.generate('karudev_persons_person_data'),data,function(html){
          $('#data').html(html);
           $('#results').DataTable();
      });
  });
   
});