// $('.carousel').carousel({
//   interval: 500
// })

 $(document).ready(function() {
  $(function() {
    var header = $(".header-navbar");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 200) {
            header.removeClass('header-navbar').addClass("header-alt");
        } else {
            header.removeClass("header-alt").addClass('header-navbar');
        }
    });
});


  var counters = $(".count");
  var countersQuantity = counters.length;
  var counter = [];

  for (i = 0; i < countersQuantity; i++) {
    counter[i] = parseInt(counters[i].innerHTML);
  }

  var count = function(start, value, id) {
    var localStart = start;
    setInterval(function() {
      if (localStart < value) {
        localStart++;
        counters[id].innerHTML = localStart;
      }
    }, 40);
  }

  for (j = 0; j < countersQuantity; j++) {
    count(0, counter[j], j);
  }
});


function formvalidation()
{
    var email =document.getElementById("useremail").value;
    var password =document.getElementById("userpassword").value;
    if (email == "") {
        document.getElementById("emailError").innerHTML = " **Email is Required";
        return false;
    }
    if (password == "") {
        document.getElementById("passwordError").innerHTML = " **Password is Required";
        return false;
    }

}



