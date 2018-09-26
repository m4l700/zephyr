$(".widgetCol").on('click', function(e){
  //var myClass = $(this).attr("class");
  //console.log(myClass);
  console.log(this.class);
  var myClass = this.class;
  $( myClass ).toggleClass("shown");
})


$(".widgetCol").click(function(){
  var thisClass = $(this).attr("class");
  console.log(thisClass);
  $( thisClass ).toggleClass("shown");
})
