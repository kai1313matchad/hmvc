let isValid = false;
let recovering_id = $('#recovering_id').val();
let Recovering = {
    setModule: () => {
        return "recovering"
    },

    setValidation: () => {
        if ($('.inp_title').val() == '') {
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
            url: `${Url.state}/${Recovering.setModule()}/read`,
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
            description: $('#description').val(),
        }

        isValid = Recovering.setValidation();

        let formData = new FormData();
        formData.append("data", JSON.stringify(data));

        if (isValid) {
            console.log('Url', `${Url.state}/${Recovering.setModule()}/create`);
            $.ajax({
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                dataType: "JSON",
                url: `${Url.state}/${Recovering.setModule()}/create`,
                success: function(resp) {
                    window.location.href = `${Url.state}/${Recovering.setModule()}/edit/${resp}`;
                }
            });
        }
    },

    createImg: () => {
        var previewNode = document.querySelector("#template");
        previewNode.id = "";
        var previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);
        
        var myDropzone = new Dropzone("#bg_img", {
            url: `${Url.state}/${Recovering.setModule()}/createImg/${recovering_id}`,
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

    update: (elm, id) => {
        $('.loading-page').removeClass('d-none');
        let data = {
            id: id,
            title: $('.inp_title').val(),
            description: $('#description').val(),
        }

        isValid = Recovering.setValidation();

        let formData = new FormData();
        formData.append("data", JSON.stringify(data));

        if (isValid) {
            console.log('Url', `${Url.state}/${Recovering.setModule()}/update`);
            $.ajax({
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                dataType: "JSON",
                url: `${Url.state}/${Recovering.setModule()}/update`,
                success: function(resp) {
                    window.location.href = `${Url.state}/${Recovering.setModule()}`;
                }
            });
        }
    }
};

$(function() {
    Recovering.read();

    $('#description').summernote({
        placeholder: 'Description Content Here',
        height: 200
    });
    // $('#description').summernote('fontName', 'Times New Roman');

    console.log("Tes", window.location.pathname.split("/")[3]);
    if (window.location.pathname.split("/")[3] == "edit") {
        Recovering.createImg();
    };
});