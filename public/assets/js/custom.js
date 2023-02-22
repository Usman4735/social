$(document).ready(function () {
    $(".select-2").select2({
        width: "100%",
    });

    $(document).on("click ", ".modal_popup", function (e) {
        e.preventDefault();
        $("#modal").modal("show");
        let url = $(this).attr("url");
        let title = $(this).attr("title");
        let size = $(this).attr("size");
        $(this).prop("disabled", true);
        $("#modal .modal-title").html(title);
        $("#modal .modal-dialog").addClass(size);
        $.ajax({
            url: url,
            method: "GET",
            success: function (data) {
                $("#modal .modal-body").html(data);
                $(".modal_popup").removeAttr("disabled");
                $("#modal").modal("show");
            },
        });
    });

    // Confirm Delete (href)
    $(document).on("click", ".confirm_delete", function (e) {
        e.preventDefault();
        var url = $(this).attr("href");
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = url;
                }
            });
    });

    //MODAL(call by ajax)
    $(document).on("click ", ".modal_popup", function (e) {
        e.preventDefault();
        $("#modal").modal("show");
        let url = $(this).attr("url");
        let title = $(this).attr("title");
        let size = $(this).attr("size");
        $(this).prop("disabled", true);
        $("#modal .modal-title").html(title);
        $("#modal .modal-dialog").addClass(size);
        $.ajax({
            url: url,
            method: "GET",
            success: function (data) {
                $("#modal .modal-body").html(data);
                $(".modal_popup").removeAttr("disabled");
                $("#modal").modal("show");
            },
        });
    });

    $("#subscribe").on("click", function () {
        var email = $("#subscribe_email").val();
        var url = "subscribe" + "/" + email;
        if (email != "") {
            $.ajax({
                url: url,
                method: "GET",
                success: function (data) {
                },
            });
        } else {
            alert("Please Enter Email!");
        }
    });

    $('#form').on('submit', function (e) {
        $('.form_btn').attr("disabled", "disabled");
    });
});
