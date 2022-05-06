// $(window).scroll(function () {
//   var sticky = $('header'),
//       scroll = $(window).scrollTop();
//   if (scroll >= 50) sticky.addClass('stickyHeader');
//   else sticky.removeClass('stickyHeader');
// });

// $(document).ready(function() {
//     $('#example').DataTable();
// } );

// $(document).ready(function() {
//     $('#example1').DataTable();
// } );


// $('#example').DataTable({
//   language: {
//     paginate: {
//       next: '<i class="fal fa-angle-right"></i>',
//       previous: '<i class="fal fa-angle-left"></i>'
//     }
//   }
// });

$(document).ready(function () {
  $("#sidebarCollapse").on("click", function () {
    $("#sidebar").toggleClass("active");
    $(".sidebar-overlay").toggleClass("active");
  });
  $(".sidebar-overlay").on("click", function () {
    $("#sidebar").removeClass("active");
    $(".sidebar-overlay").removeClass("active");
  });
});
$(window).scroll(function () {
  var sticky = $("header"),
    scroll = $(window).scrollTop();
  if (scroll >= 50) sticky.addClass("stickyHeader");
  else sticky.removeClass("stickyHeader");
});
// if ($("#metismenu")) {
//   $("#metismenu").metisMenu();
// }


function increaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('number').value = value;
}

function decreaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById('number').value = value;
}

// $(document).ready(function() {
//     var dataTable = $('#example1').dataTable();
//     $("#searchbox").keyup(function() {
//         dataTable.fnFilter(this.value);
//     });    
// });

