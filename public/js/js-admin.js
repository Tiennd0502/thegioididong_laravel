$(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('[data-toggle="tooltip"]').tooltip();

  // change category ==> change brand
  $("#js-category-id").on('change', function() {
    let category_id = $(this).val();
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "http://127.0.0.1:8000/admin/product/getBrand/" + category_id,
      success: function(response) {
        // console.log(response);
        let _html = `<option value="" selected>Xem tất cả các thương hiệu</option>`;
        let items = response;
        for (const key in items) {
          _html += "<option value='" + items[key]["id"] + "' >" + items[key]["name"] + "</option>";
        }
        $("#js-brand-id").html(_html);
      }
    });
  });

  // $('#parentId').on('change', function() {

  //     let parentId = $(this).val();
  //     if (parentId == 0) {
  //         $('#icon').parent().show();
  //         $('#image').parent().css('display', 'none');
  //         $('#delete_img').attr('src', '');

  //     } else {
  //         $('#image').parent().css('display', 'block');
  //         $('#icon').parent().hide();
  //         $('#icon').val('');
  //     }
  // });

  $(".js-image-item").on('change', function() {
    if ($(this).val() != '') {
      $(this).parent().prev('li.img-box').addClass('d-none');
      // nó thay dổi
      // lấy data-edit truỳen cho input
      // chi tiết
      // let parent = $(this).parent().prev('li.img-box');
      // let iconClose = parent.children('.icon-close');
      // let link = iconClose.data('edit');
      // let inputLink = parent.children('input');
      // inputLink.val(link);
      // console.log(inputLink.val());
      // cách ngắn nhất
      $(this).parent().prev('li.img-box').children('input').val($(this).parent().prev('li.img-box').children('.icon-close').data('edit'));
      // console.log($(this).parent().prev('li.img-box').children('input').val());

      let fileSelected = this.files;
      if (fileSelected.length > 0) {
        let fileToLoad = fileSelected[0];
        let fileReader = new FileReader();
        let img = $(this).next().next();
        fileReader.onload = function(fileLoaderEvent) {
          let srcData = fileLoaderEvent.target.result;
          img.attr('src', srcData);
        }
        fileReader.readAsDataURL(fileToLoad);
      }
      $(this).parent().removeClass('d-none');
    }
  });
  $('.icon-close').on('click', function() {
    $(this).parent().addClass('d-none');

    $(this).next().attr('src', '');
    if ($(this).is('[data-edit]')) {
      $(this).prev('input').val($(this).data('edit'))
    }
    console.log('hello 1');
  });
  // insert-img
  $('.js-insert-attach').on('click', function() {
    let insertNames = $(this).data('name');
    let lasting = $('#attach-view-' + insertNames + ' li').last().prev().find('input[type="file"]').val();
    if (lasting != "") {
      let date = new Date();
      let time = date.getTime();
      let _html = '<li class="img-box d-none" id="' + insertNames + time + '">';
      _html += '<input type="file" name="' + insertNames + '[]" multiple="multiple" class="form-control showImage d-none" data-time="' + time + '" data-name="' + insertNames + '" >';
      _html += '<input type="hidden" name="delete_' + insertNames + '[]">';
      _html += '<span class="icon-close" data-id="' + insertNames + time + '">';
      _html += '<i class="fas fa-times-circle"></i></span>';
      _html += '</li>';
      let insertAttach = $("#insert-attach-" + insertNames);
      insertAttach.before(_html);
      $('#attach-view-' + insertNames + ' li').last().prev().find('input[type="file"]').click();
    } else {

      if (lasting == "") {
        $('#attach-view-' + insertNames + ' li').last().prev().find('input[type="file"]').click();
      };
    };

    $('.showImage').on('change', function() {
      if (lasting != '') {
        let insertNames = $(this).data('name');
        let time = $(this).data('time');
        let fileSelected = this.files;
        let length = fileSelected.length;
        for (const key in fileSelected) {
          if (key == 0) {
            let fileToLoad = fileSelected[key];
            let fileReader = new FileReader();
            fileReader.onload = function(fileLoaderEvent) {
              let srcData = fileLoaderEvent.target.result;
              let newImg = document.createElement("img");
              newImg.src = srcData;
              $("#" + insertNames + time).append(newImg.outerHTML);
            }
            fileReader.readAsDataURL(fileToLoad);
            if (length == 1) {
              break;
            }
          } else {
            let lastModified = fileSelected[key]['lastModified'];
            let _html = '<li class="img-box " id="' + insertNames + lastModified + '">';
            _html += '<span class="icon-close" data-key="' + key + '" data-parent="' + insertNames + time + '">';
            _html += '<i class="fas fa-times-circle"></i></span>';
            _html += '</li>';
            let insertAttach = $("#insert-attach-" + insertNames);
            insertAttach.before(_html);
            let fileToLoad = fileSelected[key];
            let fileReader = new FileReader();
            fileReader.onload = function(fileLoaderEvent) {
              let srcData = fileLoaderEvent.target.result;
              let newImg = document.createElement("img");
              newImg.src = srcData;
              $("#" + insertNames + lastModified).append(newImg.outerHTML);
            }
            fileReader.readAsDataURL(fileToLoad);
            if (key == length - 1) {
              break;
            }
          }
        }
        $(this).parent().removeClass('d-none');
      }
      $('.icon-close').off('click').on('click', function() {
        console.log("hello 1233");
        if ($(this).is('[data-key]') && $(this).is('[data-parent]')) {
          let key = $(this).data('key');
          let parent = $(this).data('parent');
          if ($('#' + parent).length) {
            let rootDel = $('#' + parent).children('input[type=hidden]:first');
            let rootFile = $('#' + parent).children('input[type=file]:first')[0].files;
            console.log(rootFile);
            if (rootDel.val() == '') {
              rootDel.val(rootFile[key].name);
            } else {
              rootDel.val(rootDel.val() + ',' + rootFile[key].name);
            }
            $(this).parent().remove();
            let arrDeleteRoot = rootDel.val().split(',');
            if (arrDeleteRoot.length == rootFile.length) {
              console.log('hủy toàn bộ với click k file');
              $('#' + parent).remove();
            }
            console.log(rootDel.val());
          }
        } else {
          if ($(this).is('[data-id]')) {
            let id = $(this).data('id');
            if ($('#' + id).length) {
              let checkFiles = $('#' + id + ' > input:first')[0].files;
              let deleteName = $(this).prev('input[type=hidden]');
              if (checkFiles.length == 1) {
                $(this).parent().remove();
              } else {
                if (deleteName.val() == '') {
                  deleteName.val(checkFiles[0].name);
                } else {
                  deleteName.val(deleteName.val() + ',' + checkFiles[0].name);
                }
                $(this).parent().addClass('d-none');
                // kiểm tra khi hủy file các file đã chọn 
                let arrDelete = deleteName.val().split(',');
                if (arrDelete.length == checkFiles.length) {
                  console.log('hủy toàn bộ với click có file');
                  $(this).parent().remove();
                }
              }
            }
          }
        }

      })
    });


  });


  // js-filter product
  // $("#js-search").on('click', function() {
  //   let position = $(this).data('position');
  //   $.ajax({
  //     type: 'POST',
  //     url: '/searchProduct',
  //     data: $("#js-ajax-filter").serialize(),
  //     success: function(response) {
  //       if (position == 'filter-admin') {
  //         console.log(response);
  //         let items = response;
  //         let _html = '';
  //         for (const key in items) {
  //           _html += FilterAdminPrd(items[key]);
  //         }
  //         $("#js-list").html(_html);
  //       }
  //     }
  //   });
  // });

  // const FilterAdminPrd = (item) => {
  //   let _html = `
  //     <tr>
  //       <td><input type="checkbox" name="select[]"></td>
  //       <td><img src="public/images/products'.${item['image']}" alt="IMG"></td>
  //       <td style="max-width: 400px;">${item['name']}</td>
  //       <td>${item['price']}</td>
  //       <td class="text-center">${item['view']}</td>
  //       <td><a class="btn btn-outline-success" href="product/${item['id']}">Xem chi tiết</a></td>
  //       <td>
  //         <a class="btn btn-outline-success" href="product/${item['id']}/copy">Copy</a>
  //         <a class="btn btn-outline-primary" href="product/${item['id']}/edit">Sửa</a>
  //         <form action="product/${item['id']}" method="DELETE" class="d-inline-block">
  //           <button class="btn btn-outline-danger">Xóa</button>
  //         </form>
  //       </td>
  //     </tr>`;
  //   return _html;
  // }
});