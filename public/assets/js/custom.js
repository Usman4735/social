$(window).scroll(function () {
    var sticky = $(".navbar"),
        scroll = $(window).scrollTop();

    if (scroll >= 40) {
        sticky.addClass("sticky-top");
    } else {
        sticky.removeClass("sticky-top");
    }
});
var btn = $("#backToTop");

$(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
        btn.addClass("show");
    } else {
        btn.removeClass("show");
    }
});

btn.on("click", function (e) {
    e.preventDefault();
    $("html, body").animate({ scrollTop: 0 }, "600");
});
$(document).ready(function () {
     $(".select-2").select2({
         width: "100%",
     });

    $(".accordion a").click(function () {
        $(this).toggleClass("active");
        $(this).next(".content").slideToggle(400);
    });
    $("#myTable").DataTable({
        responsive: true,
        autoWidth: true,
        order: [[0, "desc"]],
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


    $(".icon-trigger").click(function (e) {
        e.preventDefault();
        $(this).toggleClass("close-icon");
        $(this).parent().find(".icons").toggleClass("icon-triggred");
    });


    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this)
            .siblings(".custom-file-label")
            .addClass("selected")
            .html(fileName);
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
    $("#country_name").on("click", function () {
        $("#exampleModal").modal("show");
    });

    $("#selected_country").on("change", function () {
        $("#country_form").submit();
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
    $(".notificationlink").on("click", function (e) {
        e.preventDefault();
        $(".notifications").toggle();
    });
    $('#form').on('submit', function (e) {
        $('.form_btn').attr("disabled", "disabled");
    });
});
