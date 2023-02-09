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

// sweet alret on delete
$(document).on("submit", ".delete-btn", function (e) {
    e.preventDefault();
    var form = this;
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-outline-danger ms-1'
        },
        buttonsStyling: false
    }).then(function (result) {
        if (result.value) {
            form.submit();
        }
    });
});

// Confirm Delete (href)
$(document).on("click", ".confirm_delete", function (e) {
    e.preventDefault();
    var url = $(this).attr("href");

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-outline-danger ms-1'
        },
        buttonsStyling: false
    }).then(function (result) {
        if (result.value) {
            window.location = url;
        }
    });
});

$('#form').on('submit', function (e) {
    $('.form_btn').attr("disabled", "disabled");
});

$('.data-table').dataTable({
    responsive: true,
    "drawCallback": function (settings) {
        feather.replace();
    }
});
$(".only-table").dataTable({
    responsive: true,
    paging: false,
    info: false,
    searching: false,
    ordering:false,
    drawCallback: function (settings) {
        feather.replace();
    },
});
$(".select-2").select2();
