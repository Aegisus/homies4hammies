var img_num;
function idna5(el){
	img_num = $(el).closest('tr').index() + 1;
  $("#carosel_img div:nth-child("+ img_num +")").addClass('active');
}

$("#gallery-lightbox-carosel img").click(function(){
  // img_num = $(this).parents(':eq(1)').index()+1;
  // console.log($("#carosel_img > :nth-child("+ img_num +")"));
  // $("#carosel_img div:nth-child("+ img_num +")").addClass('active');
  // console.log(img_num);
});
$("button.close").click(function(){
  $("#carosel_img div:nth-child("+ img_num +")").removeClass('active');
  // console.log(img_num);
});
$('#caroselModal').on('hidden.bs.modal', function () {
  $("#carosel_img div:nth-child("+ img_num +")").removeClass('active');
})
$(".carousel-control-prev").click(function(){
  if(img_num > 1){
    --img_num;
  }else{
    img_num = $("#carosel_img div").length;
  }
});
$(".carousel-control-next").click(function(){
  if(img_num >= $("#carosel_img div").length){
    img_num = 1;
  }else{
    ++img_num;
  }
});