$(function() {

  var inforGenerals = [
    "Name", "Avatar", "Icon",
    "Trademarks", "Library", "Price", "Gift",
    "Discount", "Active", "Hot",
    "Screen", "HDH", "CPU", "RAM", "Image_hot",
    "InternalMemory", "Description", "Carousel",
    "Installment"
  ];
  var inforMobiles = [
    "RearCamera", "FrontCamera", "MemoryStick",
    "SIM", "Battery"
  ];
  var inforTablets = [
    "RearCamera", "FrontCamera", "PortConnect",
    "SIM", "Size"
  ];
  var inforLaptops = [
    "GraphicCard", "PortConnect", "Design",
    "Size", "LaunchTime"
  ];
  var inforPC_Printer = [
    "GraphicCard", "PortConnect", "OpticalDrive",
    "Name", "Avatar",
    "Avatar", "Price", "Discount",
    "GraphicCard", "PortConnect", "OpticalDrive",
    "MachineType", "Function", "Wattage",
    "PrintSpeed", "PrintingLife", "PrintQuality",
    "FirstPage", "InkTypes", "InternalMemory",
    "PortConnect", "Trademarks",
  ];
  var inforInkTypes = [
    "Name", "Avatar",
    "Avatar", "Price", "Discount",
    "WhereProduction", "Trademarks",
    "PrinterCompatibility", "MaxPrinterPage"
  ];
  var inforFWatchs = [
    "Name", "Trademarks", "Icon", "Library",
    "Avatar", "Price", "Discount", "Gift",
    "Hot", "Active", "FaceDiameter",
    "FaceMaterial", "FrameMaterial", "WireMaterial",
    "WireWidth", "Utilities", "Waterproof",
    "BatteryLifeTime", "ObjectUser", "Description"
  ];
  var inforSWatchs = [
    "Name", "Trademarks", "Icon", "Library", "Carousel",
    "Avatar", "Price", "Discount", "Gift",
    "Hot", "Active", "Screen", "GraphicCard", "HDH", "FaceDiameter",
    "FaceMaterial", "PortConnect", "Utilities",
    "BatteryLifeTime", "Description",
  ];
  $("#categoryId").change(function() {
    var categoryId = $(this).val();
    $.post("./Ajax/ViewTrademark", { id: categoryId }, function(data) {
      var text = "";
      var data = JSON.parse(data);
      for (var item in data) {
        text += "<option value='" + data[item]["id"] + "'>" + data[item]["name"] + "</option>";
      }
      $("#Trademarks").html(text);
    });
    // $(this).parent().nextAll().hide();
    $(this).parent().nextAll().removeClass('d-block');
    $(this).parent().nextAll().addClass('d-none');
    switch (categoryId) {
      case "1":
        inforGenerals.forEach(function(currentValue) {
          var temp = "#" + currentValue;
          // $(temp).parent().show();
          $(temp).parent().addClass('d-block');
          $(temp).parent().removeClass('d-none');
        })
        inforMobiles.forEach(function(currentValue) {
          var temp = "#" + currentValue;
          // $(temp).parent().show();
          $(temp).parent().addClass('d-block');
          $(temp).parent().removeClass('d-none');
        })
        break;
      case "2":
        inforGenerals.forEach(function(currentValue) {
          var temp = "#" + currentValue;
          // $(temp).parent().show();
          $(temp).parent().addClass('d-block');
          $(temp).parent().removeClass('d-none');
        })
        inforLaptops.forEach(function(currentValue) {
          var temp = "#" + currentValue;
          // $(temp).parent().show();
          $(temp).parent().addClass('d-block');
          $(temp).parent().removeClass('d-none');
        })
        break;
      case "3":
        inforGenerals.forEach(function(currentValue) {
          var temp = "#" + currentValue;
          // $(temp).parent().show();
          $(temp).parent().addClass('d-block');
          $(temp).parent().removeClass('d-none');
        })
        inforTablets.forEach(function(currentValue) {
          var temp = "#" + currentValue;
          // $(temp).parent().show();
          $(temp).parent().addClass('d-block');
          $(temp).parent().removeClass('d-none');
        })
        break;
      case "4":
        // inforGenerals.forEach(function(currentValue){
        //   var temp = "#"+ currentValue;
        //   // $(temp).parent().show();
        //   $(temp).parent().addClass('d-block');
        //   $(temp).parent().removeClass('d-none');
        // })
        // inforTablets.forEach(function(currentValue){
        //   var temp = "#"+ currentValue;
        //   // $(temp).parent().show();
        //   $(temp).parent().addClass('d-block');
        //   $(temp).parent().removeClass('d-none');
        // })
        // break;
        break;
      case "5":
        inforFWatchs.forEach(function(currentValue) {
          var temp = "#" + currentValue;
          // $(temp).parent().show();
          $(temp).parent().addClass('d-block');
          $(temp).parent().removeClass('d-none');
        })
        break;
      case "6":
        inforSWatchs.forEach(function(currentValue) {
          var temp = "#" + currentValue;
          // $(temp).parent().show();
          $(temp).parent().addClass('d-block');
          $(temp).parent().removeClass('d-none');
        })
        break;
      case "7":
        inforPC_Printer.forEach(function(currentValue) {
          var temp = "#" + currentValue;
          // $(temp).parent().show();
          $(temp).parent().addClass('d-block');
          $(temp).parent().removeClass('d-none');
        })
        break;
      default:
        break;
    }
  });

  // $("#Avatar").change(function() {
  // 	var file = this.files[0];
  // 	var fileType = file.type;
  // 	var fileSize = file.size;
  // 	var checkType = /(jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF)$/i;
  // 	$("#pathAvatar").val($(this).val());
  // 	if(!checkType.exec(fileType)){
  // 		$("#messageAvatar").addClass('text-danger');
  // 		$("#messageAvatar").html("Chỉ upload file có định dạng: jpg, jpeg, png, gif");
  // 		this.value = '';

  // 		$("#submitProduct").prop("disabled", true);
  // 		return false;
  // 	}
  // 	if(fileSize > 2*1024*1024){
  // 		$("#messageAvatar").addClass('text-danger');
  // 		$("#messageAvatar").html("Vui lòng chọn file dưới 2MB");
  // 		this.value = '';
  // 		$("#submitProduct").prop("disabled", true);
  // 		return false;
  // 	}else {
  // 		$("#submitProduct").prop("disabled", false);
  // 		$("#messageAvatar").addClass('text-success');
  // 		$("#messageAvatar").html("File hợp lệ");
  // 	}		
  // });
  // $("#Library").change(function () {
  // 	var result = true;
  // 	var file = this.files;
  // 	for (var i = 0; i < file["length"]; i++) {
  // 		var fileType = file[i].type;
  // 		var fileSize = file[i].size;
  // 		var checkType = /(jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF)$/i;
  // 		$("#pathLibrary").val($(this).val());
  // 		if(!checkType.exec(fileType)){
  // 			$("#messageLibrary").addClass('text-danger');
  // 			$("#messageLibrary").html("Chỉ upload file có định dạng: jpg, jpeg, png, gif");
  // 			result = false;
  // 			$("#submitProduct").prop("disabled", true);
  // 			break;
  // 		}
  // 		if(fileSize > 2*1024*1024){
  // 			$("#messageLibrary").addClass('text-danger');
  // 			$("#messageLibrary").html("Vui lòng chọn những file dưới 2MB");
  // 			result = false;
  // 			$("#submitProduct").prop("disabled", true);
  // 			break;
  // 		}	
  // 	}
  // 	if (result == true) {
  // 		$("#submitProduct").prop("disabled", false);
  // 		$("#messageLibrary").removeClass('text-danger');
  // 		$("#messageLibrary").addClass('text-success');
  // 		$("#messageLibrary").html("File hợp lệ");
  // 	};
  // })
  // show views img


  $("#ImageTrademark").change(function() {
    var link = $(this).val();
    $("#uploadFile").val(link);
  });

  var sync1 = $("#sync1");
  var sync2 = $("#sync2");
  sync1.owlCarousel({
      nav: true,
      items: 1,
      dots: false,
      autoplayHoverPause: true,
      autoplay: true,
      autoplayTimeout: 5000,
      rewind: true,
      startPosition: 0,
      responsiveRefreshRate: 200,
    }).on('changed.owl.carousel', syncPosition)
    .on("click", ".owl-nav", function(el) {
      // body...
    });

  // $(".home-banner").mouseenter( function () {  
  //   $("#sync1 .owl-nav").removeClass("disabled");
  // }).mouseleave( function () {
  //   $("#sync1 .owl-nav").addClass("disabled");
  // })

  $(".home-banner").mouseenter(function() {
    $("#sync1 .owl-nav > *").css("display", "block");
  }).mouseleave(function() {
    $("#sync1 .owl-nav > *").css("display", "none");
  })

  $(".banner").mouseenter(function() {
    $(".banner .owl-nav > *").css("display", "block");
  }).mouseleave(function() {
    $(".banner .owl-nav > *").css("display", "none");
  })

  sync2.on('initialized.owl.carousel', function() {
    sync2.find(".owl-item").eq(0).addClass("synced");
  }).owlCarousel({
    nav: false,
    items: 5,
    dots: false,
    slideBy: 5,
    rewind: true,
    responsiveRefreshRate: 100,
  }).on("click", ".owl-item", function(el) {
    el.preventDefault();
    var number = $(this).index();
    sync1.data('owl.carousel').to(number, 300, true);

  });

  function syncPosition(el) {
    var count = el.item.count - 1;
    // var current = Math.round(el.item.index - (el.item.count/2));
    //console.log("current before if: " + el.item.index);
    var current = el.item.index;
    // if(current < 0) {
    //   current = count;
    // }
    // if(current > count) {
    //   current = 0;
    // }
    // console.log("current afrer if: " + current);

    $("#sync2")
      .find(".owl-item")
      .removeClass("synced")
      .eq(current)
      .addClass("synced");

    if ($("#sync2").data("owl.carousel") !== undefined) {
      var lenghtOption = sync2.find('.owl-item').length;
      var listObj = sync2.find('.owl-item.active');
      var listIndex = [];
      for (var i = 0; i < 5; i++) {
        listIndex[i] = listObj.eq(i).index();
      };
      center(current, listIndex, lenghtOption);
    }
  }

  function center(number, array, end) {
    var found = false;
    var num = number;
    var listIndex = array;
    for (var i in listIndex) {
      if (num === listIndex[i]) {
        var found = true;
      }
    }
    if (found === false) {
      if (num > listIndex[listIndex.length - 1]) {
        if (num === 7) {
          sync2.data('owl.carousel').to(end - listIndex.length, 100, true);
        } else {
          sync2.data('owl.carousel').to(num - listIndex.length + 2, 100, true);
        }
        // console.log("current out ListIndex: th1");
      } else {
        if (num - 1 === -1) {
          num = 0;

        }
        sync2.data('owl.carousel').to(num, 100, true);
        // console.log("current out ListIndex: th2");
      }
    } else if (num === listIndex[listIndex.length - 1]) {
      // console.log("current == ListIndex end");
      if (num === end - 1) {
        sync2.data('owl.carousel').to(listIndex[1] - 1, 100, true);
      } else {
        sync2.data('owl.carousel').to(listIndex[1], 100, true);
      };

    } else if (num === listIndex[0]) {
      if (num === 0) {
        sync2.data('owl.carousel').to(0, 100, true);
      } else {
        sync2.data('owl.carousel').to(num - 1, 100, true);
      };
      // console.log("current == ListIndex star");
    } else {
      // console.log("k làm gì cả");
    }
  }

  // carousel prd
  $("#owl-promo, .acc, .swatch, .fwatch, #owl-promo-old, #owl-laptop,.slide-product").owlCarousel({
    items: 5,
    nav: true,
    dots: false,
    slideBy: 5,
    rewind: true,
    responsiveRefreshRate: 200,
  });
  // // slide owl-home
  $("#owl-home, #owl-detail").owlCarousel({
    items: 1,
    nav: true,
    dots: true,
    rewind: true,
    autoplayHoverPause: true,
    autoplay: true,
    autoplayTimeout: 5000,
    responsiveRefreshRate: 200,
  });

  $(".owl-watch").owlCarousel({
    items: 4,
    nav: true,
    dots: false,
    rewind: true,
    responsiveRefreshRate: 200,
  });
  $(".owl-watch-couple").owlCarousel({
    items: 3,
    nav: true,
    dots: false,
    rewind: true,
    responsiveRefreshRate: 200,
  });

  $("#owl-detail").mouseenter(function() {
    $("#owl-detail .owl-nav").css("display", "block");
  }).mouseleave(function() {
    $("#owl-detail .owl-nav").css("display", "none");
  })

  //  show filter-feature
  $(".js-filter-feature").click(function() {
    $(".js-content-sort").css("display", "none");
    $(this).next().slideToggle(500, "linear");
  });

  //close content-feature
  $(".closefeature").click(function() {
    $(this).parent().slideUp(500, "linear");
  });
  //  show filter-feature- more
  $(".filter-feature-more").click(function() {
    $(this).css("display", "none");
    $(this).next().slideToggle(500, "linear");
  });

  //mobile-sort
  $(".filter-trademark > a").click(function() {
    if ($(this).hasClass('check')) {
      $(this).removeClass("check");
      console.log("xóa");
    } else {
      $(this).addClass("check");
      console.log("thêm");
    };
  });

  $(".js-sort").click(function() {
    $(".js-content-feature").css("display", "none");
    $(this).next().slideToggle(500, "linear");
  });

  $(".js-closefilter").click(function() {
    $(this).parent().slideUp(500, "linear");
  });

  //shơ nội dung khi chọn trong vipservices
  $(".js-show-vipservices").change(function() {
    var show_more = $(this).parent().parent().next();
    $(show_more).slideToggle(500, "linear");
  });
  //  chọn màu sản phẩm (detail)
  $(".js-chosse-color").change(function() {
    var option = $(this).parent().parent().parent();
    if ($(this).prop("checked") == true) {
      $(option).addClass("check");
    } else {
      $(option).removeClass("check");
    }
  });
  // xem thêm bài viết trong detail
  $(".js-read-more").click(function() {
    $(this).prev().css("height", "auto");
    $(this).css("display", "none");
  });
  // chọn màu khi đặt hàng
  $(".js-cart-color").click(function() {
    $(this).next().slideToggle("slow");
  });
  //  thay đỏi kết quae sau khi chọn màu đặt hàng
  // $(".js-color-item").click(function () {

  // });
  // số lượng(quantity) khi order
  $(".js-change-quantity").click(function() {
    var current = $(this).attr("change");
    switch (current) {
      case "abate":
        {
          var quantity = $(this).next().text();
          if (quantity == "1") {
            $(this).next().text(1);
          } else if (quantity == "2") {
            $(this).next().text(Number(quantity) - 1);
            $(this).removeClass("active");
          } else {
            $(this).next().text(Number(quantity) - 1);
            $(this).addClass("active");
          }
          var currentId = $(this).next().attr('data-id');
          $.ajax({
            url: "./Cart/UpdateQuantity",
            method: "post",
            data: {
              "id": Number(currentId),
              "quantity": Number($(this).next().text()),
            },
            success: function(data) {
              window.location.reload(true);
            }
          });
          break;
        }
      case "augment":
        {
          var quantity = $(this).prev().text();
          if (quantity == "5") {
            $(this).prev().text(5);
          } else {
            $(this).prev().text(Number(quantity) + 1);
            $(this).prev().prev().addClass("active");
          }
          var currentId = $(this).prev().attr('data-id');
          $.ajax({
            url: "./Cart/UpdateQuantity",
            method: "post",
            data: {
              "id": Number(currentId),
              "quantity": Number($(this).prev().text()),
            },
            success: function(data) {
              window.location.reload(true);
            }
          });
          break;
        }
    }
  });
  // Xóa sản phẩm
  $(".js-delete").click(function(event) {
    var productId = $(this).attr("data-id");
    $.ajax({
      url: "./Cart/DeleteItemCart",
      method: "post",
      data: {
        "id": Number(productId),
      },
      success: function(data) {}
    });
  });
  $(".buy-now").click(function() {
    var productId = $(this).attr("data-id");
    console.log(productId);
    $.ajax({
      url: "./Cart/AddToCart/" + productId,
      method: "post",
      data: {
        "id": Number(productId),
      },
      success: function(data) {

      }
    });
  })
  $("#pay-offline").click(function(event) {
    // chưa validate form
    $.ajax({
      url: "./Cart/Order",
      method: "post",
      data: $("#form-order").serialize(),
      success: function(data) {
        data = JSON.parse(data);
        if (data == true) {
          alert("Bạn đã đặt hàng thành công! Sẽ có Nhân viên liện hệ xác nhận đơn hàng");
        } else {
          alert("Bạn đã đặt hàng thất bại!");
        }
        window.location.reload(true);

      }
    });
  });
  // update acitve order
  $("#js-update-active").change(function() {
    alert("hello");
  })


  // add text counpon-code
  $("#js-text-code").click(function() {
    $(this).next().slideToggle(500, "linear");
  });

  // cart address
  $(".js-change-address").change(function() {
    var checked = $(this).prop("checked");
    var name = $(this).attr("data-name");
    $(".js-received-market").toggle(0, "linear");
    $(".js-delivery-address").toggle(0, "linear");
  });

  // phụ kiện show -accessorys
  $(".js-view-more-accessorys").click(function() {
    $(".js-show-accessory").show();
    $(".js-view-more-accessorys").hide();
  });

  // Laptop news-post
  $(".js-show-content").click(function() {
    $(".js-show-content").removeClass("tab-active");
    $(this).addClass("tab-active");
    var obj = $(this).attr("data-id");
    if (obj == "1") {
      $(".js-video").show();
      $(".js-news").hide();
      $(".js-tutorial").hide();
    } else if (obj == "2") {
      $(".js-news").show();
      $(".js-video").hide();
      $(".js-tutorial").hide();
    } else if (obj == "3") {
      $(".js-tutorial").show();
      $(".js-video").hide();
      $(".js-news").hide();
    }
  });

  //  tabs in fwatch
  $(".tab-watch button").click(function() {
    if (!$(this).hasClass('current')) {
      $(".tab-watch button").removeClass('current');
      $(this).addClass("current");
      $(".tab-watch + div a b").text($(this).text());
      $(".navigat ~ .contents").removeClass('current');
      $("#" + $(this).data("tab")).addClass("current");
    }
  })



  // show footer link
  var toggle = false;
  $("#showmore").click(function() {
    var links = document.getElementsByClassName("footer-link");
    var i = 0;
    if (!toggle) {
      for (i = 0; i < links.length; i++) {
        links[i].style.display = "block";
      }
      toggle = true;
      this.innerHTML = "Ẩn bớt " + '<i class="fa fa-caret-up"></i>';

    } else {
      for (i = 0; i < links.length; i++) {
        links[i].style.display = "none";
      }
      toggle = false;
      this.innerHTML = "Xem thêm " + '<i class="fa fa-caret-down"></i>';
    }
  });

  // view-more-mobile
  $("#trademark-more").click(function() {
    $(this).remove();
    $(".name-trandemark").show();
    $(".filter-trademark a:nth-child(8)").css("border-top", "1px solid #eee");
  });

  // dánh giá
  $(".show-input").click(function() {
    var nameClass = $(this).attr("class");
    if (nameClass === "show-input") {
      $(this).addClass("closebtt");
      $(this).text("Đóng lại");
      $(".input").fadeIn();
    } else {
      $(this).removeClass("closebtt");
      $(this).text("Gửi đánh giá của bạn");
      $(".input").fadeOut();
    }
  })

  $("#s1, #s2, #s3, #s4, #s5").mouseenter(function() {
    var evaluate = ["Không thích", "Tạm được", "Bình thường", "Rất tốt", "Tuyệt vời quá"];
    $(this).prevAll().addClass('voted');
    $(this).addClass('voted');
    $(this).nextAll().removeClass('voted')
    var index = $(this).index();
    $(".lsStar").removeClass("hide");
    $(".lsStar").text(evaluate[index]);
  }).mouseleave(function() {
    var evaluate = ["Không thích", "Tạm được", "Bình thường", "Rất tốt", "Tuyệt vời quá"];
    var value = $("#hdfStar").val();
    if (value != 0) {
      for (var i = 1; i < 6; i++) {
        if (i <= value) {
          $("#s" + i).addClass("voted");
        } else {
          $("#s" + i).removeClass("voted");
        }
      }
      $(".lsStar").text(evaluate[value - 1]);
    } else {
      $(this).parent().children().removeClass('voted');
      $(".lsStar").addClass("hide");
    };
  }).click(function() {
    var currentIndex = $(this).index();
    $("#hdfStar").val(currentIndex + 1);
    $(".write-comment.hide").removeClass("hide");
  })

  $(".write > textarea").keyup(function() {
    var countTxt = $.trim($(this).val()).length;
    if (countTxt != 0 && countTxt < 80) {
      $(".ckeckWrite").text(countTxt + " ký tự (tối thiểu 80)")
    } else {
      $(".ckeckWrite").text("");
    }
  });


  // Search product of custumer
  $("#js-search").keyup(function() {
    var keyword = $.trim($(this).val());
    if (keyword.length > 1) {
      $.ajax({
        url: "./Ajax/Search/" + keyword,
        method: "post",
        // data: $("#search").serialize(),
        success: function(data) {
          data = JSON.parse(data);
          if (data == false) {
            $("#js-wrap-suggestion").hide();
          } else {
            var _html = "";
            var index = 1;
            for (var item in data) {
              _html += "<li>";
              _html += '<a href="' + data[item]["slug"] + '/Detail/' + data[item]["id"] + '">';
              _html += '<img src="public/images/avatar' + data[item]["image"] + '" alt="">';
              _html += '<div class="item-suggestion-infor">';
              _html += '<h3>' + data[item]["name"] + '</h3>';
              // _html += '<h6 class="text-promo">Hàng sắp về</h6>';
              _html += '<div class="product-price">';
              if (data[item]["discount"] != 0) {
                var discount = FormatCurrency(data[item]["price"], data[item]["discount"]);
                var price = FormatCurrency(data[item]["price"]);
                _html += '<strong>' + discount + '₫</strong>';
                _html += '<span>' + price + '₫</span>';
                _html += '<i>-' + data[item]["discount"] + '%</i>';
              } else {
                var price = FormatCurrency(data[item]["price"]);
                _html += '<strong>' + price + '₫</strong>';
              }
              _html += '</div>';
              _html += '</div>';
              if (data[item]["gift"] != "") {
                var gift = FormatCurrency(data[item]["gift"]);
                _html += '<p>Quà <b>' + gift + '₫</b></p>';
              };
              _html += '</a>';
              _html += '</li>';
              console.log(index);
              if (index == 7) {
                break;
              };
              index++;
            }
            $("#js-wrap-suggestion").html(_html);
            $("#js-wrap-suggestion").show();
          }
        }
      });
    } else {
      $("#js-wrap-suggestion").html("");
      $("#js-wrap-suggestion").hide();
    };
  });
  // Lazyloading image
  if ('loading' in HTMLImageElement.prototype) {
    const images = document.querySelectorAll("img.lazyload");
    images.forEach(img => {
      img.src = img.dataset.src;
    });
  } else {
    // import Lazysize
    let script = document.createElement("script");
    script.async = true;
    script.src =
      "../js/lazysizes.min.js";
    document.body.appendChild(script);
  }
});
// admin logout
function Logout() {
  var result = confirm("Bạn có thực sự muốn đăng xuất khỏi trang quản trị?");
  if (result) {
    $.post("./Admin/LogOut/", {}, function(data) {});
  };

}

// hàm xử lý kiểu tiền tệ 
function FormatCurrency(olded, discount = 0) {
  var result = "";
  if (discount != 0) {
    var number = olded * (100 - discount) / 100;
  } else {
    var number = olded;
  }
  number = number.toString(10);
  var index = 0;
  for (var i = number.length - 1; i >= 0; i--) {
    if (index < 3) {
      result += "0";
    } else if (index == 3 || index == 6) {
      result += "." + number[i];
    } else if (index == 4 && number[i + 1] > 5) {
      result += number[i] + 1;
    } else {
      result += number[i];
    };
    index++;
  };
  result = result.split("").reverse().join("");
  // console.log(result);
  return result;
}


// them 1 img
function AttachImg(el, insertNames) {
  var lasting = jQuery('#attach-view-' + insertNames + ' li').last().prev().find('input[type="file"]').val();
  if (lasting != "") {
    var date = new Date();
    var time = date.getTime();
    var _html = '<li class="img-box d-none" id="' + insertNames + time + '">';
    _html += '<input type="file" name="' + insertNames + '" class="form-control d-none" onchange="ShowImg(this,\'' + time + '\',\'' + insertNames + '\')" >';
    _html += '<span class="icon-close" onclick="DelImgs(this)">';
    _html += '<i class="fas fa-times-circle"></i></span>';
    _html += '</li>';
    var inserAttach = $("#insert-attach-" + insertNames);
    inserAttach.before(_html);
    jQuery('#attach-view-' + insertNames + ' li').last().prev().find('input[type="file"]').click();
  } else {
    if (lasting == "") {
      jQuery('#attach-view-' + insertNames + ' li').last().prev().find('input[type="file"]').click();
    };
  }
}

function ShowImg(el, time, insertNames) {
  var fileSelected = el.files;
  console.log(el);
  console.log(el.files);

  if (fileSelected.length > 0) {
    var fileToLoad = fileSelected[0];
    var fileReader = new FileReader();
    fileReader.onload = function(fileLoaderEvent) {
      var srcData = fileLoaderEvent.target.result;
      var newImg = document.createElement("img");
      newImg.src = srcData;
      $("#" + insertNames + time).append(newImg.outerHTML);
    }
    fileReader.readAsDataURL(fileToLoad);
  }
  $(el).parent().removeClass('d-none');
}

// thêm nhiều ảnh
function AttachImgs(el, insertNames) {
  var lasting = jQuery('#attach-view-' + insertNames + ' li').last().prev().find('input[type="file"]').val();
  if (lasting != "") {
    var date = new Date();
    var time = date.getTime();
    var _html = '<li class="img-box d-none" id="' + insertNames + time + '">';
    _html += '<input type="file" name="' + insertNames + '[]" class="form-control d-none" onchange="ShowImgs(this,\'' + time + '\',\'' + insertNames + '\')" >';
    _html += '<span class="icon-close" onclick="DelImgs(this)">';
    _html += '<i class="fas fa-times-circle"></i></span>';
    _html += '</li>';
    var inserAttach = $("#insert-attach-" + insertNames);
    inserAttach.before(_html);
    $('#attach-view-' + insertNames + ' li').last().prev().find('input[type="file"]').click();
  } else {
    if (lasting == "") {
      $('#attach-view-' + insertNames + ' li').last().prev().find('input[type="file"]').click();
    };
  }

}

function ShowImgs(el, time, insertNames) {
  var fileSelected = el.files;
  if (fileSelected.length > 0) {
    var fileToLoad = fileSelected[0];
    var fileReader = new FileReader();
    fileReader.onload = function(fileLoaderEvent) {
      var srcData = fileLoaderEvent.target.result;
      var newImg = document.createElement("img");
      newImg.src = srcData;
      $("#" + insertNames + time).append(newImg.outerHTML);
    }
    fileReader.readAsDataURL(fileToLoad);
  }
  $(el).parent().removeClass('d-none');
}

function DelImgs(el) {
  $(el).parent().remove();
}
// Gọi ajax để xóa ảnh trên data
function DelDataImg(el, tableName, id, col, path) {
  var tableName = tableName;
  var id = id;
  var col = col;
  var path = path;
  $.post("./Ajax/DelProductImg", { tableName: tableName, id: id, col: col, path: path }, function(data) {
    // var data = JSON.parse(data);
    // alert(data);
  });
  $(el).parent().remove();
}
// Show attach trong bình luận
function ShowAttach(id) {
  $("#" + id).show();
}




// Gửi bình luận sản phẩm
function PostComment(id_form, id_textarea, box_error, box_infor) {
  var content = $.trim($("#" + id_textarea).val());
  if (content.length == 0) {
    $("#" + box_error).text("Vui lòng nhập nội dung bình luận.");
    $("#" + id_textarea).val("");
    $("#" + id_textarea).focus();
    return false;
  } else if (content.length < 20) {
    $("#" + box_error).text("Nội dung bình luận quá ngắn.");
    $("#" + id_textarea).val("");
    $("#" + id_textarea).focus();
    return false;
  } else {
    $("#" + box_error).text("");
  }
  $.ajax({
    url: "./Ajax/PostComment",
    method: "post",
    data: $("#" + id_form).serialize(),
    success: function(data) {
      if (data == "create_session") {
        createBoxInfor(box_infor, id_form);
      } else {
        if (data == "true") {
          alert("Bình luận của bạn sẽ được kiểm duyệt.");
        } else {
          alert(data);
          alert("bình luận thất bại.");
        }
        // alert("Bình luận của bạn sẽ được kiểm duyệt.");
        $("#content-comment").val("");
      }
    }
  });
}
//  Tạo box lấy thông tin ng bình luận
function createBoxInfor(box_infor, id_form) {
  var _html = '<div class="ajax-comment">';
  _html += '<div class="load-comment">';
  _html += '<div class="wrap-popup">';
  _html += '<div class="titlebar">';
  _html += '<strong>Nhập thông tin</strong>';
  _html += '<a href="javascript:CmtClosePop();"><i class="fas fa-times-octagon"></i></a>';
  _html += '</div>';
  _html += '<div class="form-info">';
  _html += '<input type="text" name="name" placeholder="Họ tên (bắt buộc)" id="nameCmt">';
  _html += '<input type="text" name="email" placeholder="Email (để nhận phản hồi qua mail)" id="emailCmt">';
  _html += '<input type="text" name="phone" placeholder="Số điện thoại (để nhận phản hồi qua Zalo)" id="phoneCmt">';
  _html += '<span id="js-inforCmtMessage" style="display:block; color: #d0021b;width: 100%; margin-bottom: 0.75rem"></span>'
  _html += '<button type="button" onclick="CmtConfirmCustumer(' + "'" + id_form + "'" + ');">Bình luận</button>';
  _html += '</div>';
  _html += '</div>';
  _html += '</div>';
  _html += '</div>';
  $("#" + box_infor).html(_html);
}
// Đóng box ajaxcomment
function CmtClosePop() {
  $(".ajax-comment").hide();
}
// Lưu vào data nếu chưa có session
function CmtConfirmCustumer(id_form) {
  var nameCmt = $.trim($("#nameCmt").val());
  var emailCmt = $.trim($("#emailCmt").val());
  var phoneCmt = $.trim($("#phoneCmt").val());
  if (nameCmt.length == 0) {
    $("#js-inforCmtMessage").text("Vui lòng nhập họ và tên.");
    $("#nameCmt").val("");
    $("#nameCmt").css("border-color", "#d0021b");
    $("#nameCmt").focus();
    return false;
  } else {
    $("#js-inforCmtMessage").text("");
    $("#nameCmt").css("border-color", "#ddd");
  };
  if (emailCmt.length == 0) {
    $("#js-inforCmtMessage").text("Vui lòng nhập đúng email.");
    $("#emailCmt").val("");
    $("#emailCmt").css("border-color", "#d0021b");
    $("#emailCmt").focus();
    return false;
  } else {
    $("#js-inforCmtMessage").text("");
    $("#emailCmt").css("border-color", "#ddd");
  };
  if (phoneCmt.length != 10) {
    $("#js-inforCmtMessage").text("Vui lòng nhập đúng số điện thoại.");
    $("#phoneCmt").val("");
    $("#phoneCmt").css("border-color", "#d0021b");
    $("#phoneCmt").focus();
    return false;
  } else {
    $("#js-inforCmtMessage").text("");
    $("#phoneCmt").css("border-color", "#ddd");
  };
  $.ajax({
    url: "./Ajax/CreateCustumerCmt",
    method: "post",
    data: $("#" + id_form).serialize(),
    success: function(data) {
      alert("Bình luận của bạn sẽ được kiểm duyệt.");
      CmtClosePop();
      $("#box-infor").html("");
      $("#content-comment").val("");
      // if (data == "true") {
      //   $("#box-infor").html("");
      // }  
    }
  });

}



// Gửi đánh giá sản phẩm 
function InsertEvaluate() {
  var count = $.trim($("#js-content-evaluated").val());
  var name = $.trim($("#name").val());
  var phone = $.trim($("#phone").val());
  var email = $.trim($("#email").val());
  if ($("#hdfStar").val() == 0) {
    $("#js-error-message").text("Bạn chưa đánh giá điểm sao, vui lòng đánh giá.");
    return false;
  } else {
    $("#js-error-message").val("");
  }
  if (count == "") {
    $("#js-error-message").text("Vui lòng nhập nội dung đánh giá về sản phẩm.");
    $("#js-content-evaluated").val("");
    $("#js-content-evaluated").css("border", "1px solid #d0021b");
    $("#js-content-evaluated").focus();
    return false;
  } else {
    if (count.length < 80) {
      $("#js-error-message").text("Nội dung đánh giá quá ít. Vui lòng nhập thêm nội dung đánh giá về sản phẩm.");
      $("#js-content-evaluated").focus();
      $("#js-content-evaluated").css("border", "1px solid #d0021b");
      return false;
    } else {
      $("#js-content-evaluated").css("border", "none");
      $("#js-error-message").text("");
    }
  }
  if (name == "") {
    $("#js-error-message").text("Vui lòng nhập họ và tên.");
    $("#name").focus();
    $("#name").css("border-color", "#d0021b");
    return false;
  } else {
    $("#name").css("border-color", "#ddd");
    $("#js-error-message").text("");
  }
  if (phone == "") {
    $("#js-error-message").text("Vui lòng nhập số điện thoại.");
    $("#phone").focus();
    $("#phone").css("border-color", "#d0021b");
    return false;
  } else {
    if (phone.length != 10) {
      $("#js-error-message").text("Số điện thoại không hợp lệ.");
      alert("Số điện thoại không hợp lệ.");
      $("#phone").focus();
      return false;
    } else {
      $("#phone").css("border-color", "#ddd");
      $("#js-error-message").text("");
    };
  }

  $.ajax({
    url: "./Ajax/PostEvaluate",
    method: "post",
    data: $("#js-my-evaluate").serialize(),
    success: function(data) {
      jQuery("#js-reset-evaluate").click();
      $("#hdfStar").val("0");
      jQuery("#s5").mouseleave();
      jQuery(".show-input").click();
      alert(data);
    }
  });
}

function ShowReply(id, name) {
  $(".commemt-ask .comment-now").addClass('hide');
  $("#reply" + id).removeClass("hide");
  $("#content" + id).val("@" + name + ": ");
  $("#content" + id).focus();
}