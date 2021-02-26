let isValid = false;
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
                console.log(resp);
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
            background: $('.inp_background').val(),
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

    update: (elm, id) => {
        $('.loading-page').removeClass('d-none');
        let data = {
            id: id,
            title: $('.inp_title').val(),
            related_product: $('#related_product').val(),
            background: $('.inp_background').val(),
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
                    window.location.href = `${Url.state}/${Promotion.setModule()}/edit/${resp}`;
                }
            });
        }
    }
};

$(function() {
    Promotion.read();
    $('.inp_startdate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('.inp_enddate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#related_product').select2();

    let promo_id = $('#promo_id').val();
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
});