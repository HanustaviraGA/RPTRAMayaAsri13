ClassicEditor.create(document.querySelector("#isi"), {
    toolbar: {
        items: [
            '|',
            'heading',
            'bold',
            'italic',
            'link',
            'bulletedList',
            'numberedList',
            '|',
            'undo',
            'redo'
        ]
    },
    language: 'id',
    heading: {
        options: [{
            model: "paragraph",
            title: "Paragraph",
            class: "ck-heading_paragraph"
        },
        {
            model: "heading1",
            view: "h1",
            title: "Heading 1",
            class: "ck-heading_heading1"
        },
        {
            model: "heading2",
            view: "h2",
            title: "Heading 2",
            class: "ck-heading_heading2"
        }
        ]
    }
}).catch(error => {
    console.log(error);
});

function previewFile(input) {
    var file = $("#img").get(0).files[0];

    if (file) {
        var reader = new FileReader();

        reader.onload = function () {
            $("#new_img").show();
            $("#img_des").attr("src", reader.result);
            $("#img_des").show();
        }

        reader.readAsDataURL(file);
    }
}

$("#batal").on("click", function () {
    $(this).parent().hide();
    $("#img").val("");
})

$(".del").on("click", function () {
    nama = $(this).data('nama');
    id = $(this).data('id');
    img = $(this).data('img');

    swal({
        title: "Anda yakin ?",
        text: "Apa anda yakin ingin menghapus artikel \n\"" + nama + "\"",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            window.location.href = 'controller.php?id_artikel=' + id + '&img=' + img +
                '&aksi=hapus';
        }
    });
})