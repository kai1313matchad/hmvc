let isValid = false;
let promo_id = $('#promo_id').val();
let Promotion = {
    setModule: () => {
        return "promotions"
    },

    setValidation: () => {
        if ($('.inp_title').val() == '') {
            isValid = false;
        } else if ($('.inp_background').val() == '') {
            isValid = false;
        } else if ($('.inp_startdate').val() == '') {
            isValid = false;
        } else if ($('.inp_enddate').val() == '') {
            isValid = false;
        } else {
            isValid = true;
        }

        return isValid;
    },

    read: () => {
        $('.loading-page').removeClass('d-none');
        $.ajax({
            type: "GET",
            cache: false,
            contentType: false,
            processData: false,
            dataType: "html",
            url: `${Url.state}/${Promotion.setModule()}/read`,
            success: function(resp) {
                $('.loading-page').addClass('d-none');
                $('#tbcontent').html(resp)
            }
        });
    },

    create: () => {
        $('.loading-page').removeClass('d-none');
        let data = {
            title: $('.inp_title').val(),
            related_product: $('#related_product').val(),
            city: $('#inp_city').val(),
            startdate: $('.inp_startdate').val(),
            enddate: $('.inp_enddate').val(),
        }

        isValid = Promotion.setValidation();

        let formData = new FormData();
        formData.append("data", JSON.stringify(data));

        if (isValid) {
            console.log('Url', `${Url.state}/${Promotion.setModule()}/create`);
            $.ajax({
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                dataType: "JSON",
                url: `${Url.state}/${Promotion.setModule()}/create`,
                success: function(resp) {
                    window.location.href = `${Url.state}/${Promotion.setModule()}/edit/${resp}`;
                }
            });
        }
    },

    createBgImg: () => {
        var previewNode = document.querySelector("#template");
        previewNode.id = "";
        var previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);
        
        var myDropzone = new Dropzone("#bg_img", {
            url: `${Url.state}/${Promotion.setModule()}/createBgImg/${promo_id}`,
            previewTemplate: previewTemplate,
            previewsContainer: "#previews",
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        });

        myDropzone.on("addedfile", function(file) {
            console.log(file);
        });

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            window.location.reload();
        });
    },

    createBadgeImg: () => {
        var previewNodeBadge = document.querySelector("#template-badge");
        previewNodeBadge.id = "";
        var previewTemplate = previewNodeBadge.parentNode.innerHTML;
        previewNodeBadge.parentNode.removeChild(previewNodeBadge);
        
        var myDropzoneBadge = new Dropzone("#bg_img_badge", {
            url: `${Url.state}/${Promotion.setModule()}/createBadgeImg/${promo_id}`,
            previewTemplate: previewTemplate,
            previewsContainer: "#previews-badge",
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        });

        myDropzoneBadge.on("addedfile", function(file) {
            console.log(file);
        });

        // Hide the total progress bar when nothing's uploading anymore
        myDropzoneBadge.on("queuecomplete", function(progress) {
            window.location.reload();
        });
    },

    update: (elm, id) => {
        $('.loading-page').removeClass('d-none');
        let data = {
            id: id,
            title: $('.inp_title').val(),
            related_product: $('#related_product').val(),
            city: $('#inp_city').val(),
            startdate: $('.inp_startdate').val(),
            enddate: $('.inp_enddate').val(),
        }

        isValid = Promotion.setValidation();

        let formData = new FormData();
        formData.append("data", JSON.stringify(data));

        if (isValid) {
            console.log('Url', `${Url.state}/${Promotion.setModule()}/update`);
            $.ajax({
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                dataType: "JSON",
                url: `${Url.state}/${Promotion.setModule()}/update`,
                success: function(resp) {
                    window.location.href = `${Url.state}/${Promotion.setModule()}`;
                }
            });
        }
    }
};

$(function() {
    Promotion.read();
    let disableDate = [];
    // console.log($('.disable-date').attr('date'));
    let array_date = $('.disable-date');
    array_date.each(function() {
        console.log($(this).val());
        disableDate.push($(this).val());
    });

    console.log(disableDate);

    $('.inp_startdate').datetimepicker({
        format: 'YYYY-MM-DD',
        disabledDates: disableDate
    });
    $('.inp_enddate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#related_product').select2();
    $('#inp_city').select2();

    console.log(window.location.pathname.split("/")[3]);
    if (window.location.pathname.split("/")[3] == "edit") {
        Promotion.createBgImg();
        Promotion.createBadgeImg();
    };
});