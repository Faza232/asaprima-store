// Dropdown Kategori & SubKategori
$(document).ready(function () {
    $("#category_id").select2();
});
$(document).ready(function () {
    $("#subcategory_id").select2();
});

$(document).ready(function () {
    $("#category_id").on("change", function () {
        var category_id = $(this).val();
        // console.log(category_id);
        if (category_id) {
            $.ajax({
                url: "/subcategory/" + category_id,
                type: "GET",
                data: {
                    _token: "{{ csrf_token() }}",
                },
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    if (data) {
                        $("#subcategory_id").empty();
                        $("#subcategory_id").append(
                            '<option value="">Pilih Sub-Kategori</option>'
                        );
                        $.each(data, function (key, subcategory) {
                            $('select[name="subcategory_id"]').append(
                                '<option value="' +
                                    subcategory.id +
                                    '">' +
                                    subcategory.name +
                                    "</option>"
                            );
                        });
                    } else {
                        $("#subcategory_id").empty();
                    }
                },
            });
        } else {
            $("#subcategory").empty();
        }
    });
});
