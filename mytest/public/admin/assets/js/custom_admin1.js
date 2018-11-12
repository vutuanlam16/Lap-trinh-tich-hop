
$(document).ready(function(){
  // add product for order 
  $(document).on("click", ".add-order", function() {
    var idtran =  $('.idtran').val();
    var quantity = $('.qty-order').val();
    var product = $('.pro-order').val();
    $.ajax({
      type: "POST",
      url: BASE_URL + 'admin/transaction/add_order/',
      data: {'qty':quantity , 'pro':product , 'idtran':idtran},
      async: true,
      success: function (result) {
         // $(".haha").html(data);
         if(!result.error){
          alert("Thêm mới thành công");
          location.reload();
        }
        else{
         alert("Lỗi!");
       }
     }
   })  
  });


  // $(document).on("change", ".qty-edit", function() {
  //   var id = $('.qty_edit').val();
  //   var quantity = $('.qtyy_'+id).val();
  //   $.ajax({
  //     type: "POST",
  //     url: BASE_URL + 'admin/transaction/edit_ajax/',
  //     data: {'id':id , 'quantity':quantity},
  //     async: true,
  //     success: function (result) {
  //        if(!result.error){
  //         $("span.subtotal_edit_" + id).html(result);
  //       }
  //       else{
  //        alert("Lỗi!");
  //      }
  //    }
  //  })  
  // });


});
