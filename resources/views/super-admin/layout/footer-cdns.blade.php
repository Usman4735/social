{{-- BEGIN: Vendor JS --}}
<script src="{{ asset('backend-assets/vendors/js/vendors.min.js') }}"></script>
{{-- END: Vendor JS --}}

{{-- BEGIN: Datatables --}}
<script src="{{ asset('backend-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('backend-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('backend-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
<script src="{{ asset('backend-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{ asset('backend-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
<script src="{{ asset('backend-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
<script src="{{ asset('backend-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backend-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
<script src="{{ asset('backend-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
<script src="{{ asset('backend-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('backend-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>

<script src="{{ asset('backend-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('backend-assets/js/scripts/extensions/ext-component-sweet-alerts.js') }}"></script>
{{-- <script src="{{ asset('backend-assets/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script> --}}
{{-- <script src="{{ asset('backend-assets/js/scripts/forms/form-wizard.js') }}"></script> --}}
{{-- END: Datatables --}}

{{-- BEGIN: Page Vendor JS --}}
<script src="{{ asset('backend-assets/vendors/js/extensions/toastr.min.js') }}"></script>
<script src="{{asset('backend-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
{{-- <script src="{{asset('backend-assets/vendors/js/ckeditor/ckeditor.js')}}"></script> --}}
<script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>

{{-- END: Page Vendor JS --}}

{{-- BEGIN: Theme JS --}}
<script src="{{ asset('backend-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('backend-assets/js/core/app.js') }}"></script>
{{-- END: Theme JS --}}


{{-- BEGIN: Page JS --}}
<script src="{{asset('backend-assets/js/scripts/pages/app-chat.js')}}"></script>
<script src="{{ asset('backend-assets/js/scripts/forms/form-select2.js') }}"></script>
<script src="{{asset('backend-assets/js/scripts/extensions/ext-component-sweet-alerts.js')}}"></script>
<script src="{{asset('backend-assets/js/scripts/components/components-tooltips.js')}}"></script>
{{-- END: Page JS --}}

{{-- BEGIN: custom JS --}}

<script src="{{ asset('backend-assets/js/scripts/custom.js') }}"></script>
<script src="{{ asset('backend-assets/vendors/js/file-uploaders/dropzone.min.js') }}"></script>
<script src="{{ asset('backend-assets/js/scripts/forms/form-file-uploader.js') }}"></script>
<script src="{{ asset('backend-assets/js/scripts/pages/app-chat.js') }}"></script>

{{-- END: custom JS --}}
<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    });
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });

    let noti_interval = setInterval(function(){
        $.ajax({
            url:"{{url('sa1991as/fetch-notifications')}}",
            type: "POST",
            success:function(data){
                $(".notifications-list").html("");
                $(".notify-badge-notifications").html(data.length);
                if(data.length>0){
                data.map(notification => {
                    $('.notifications-list').append(`<a class="d-flex" href="${notification.action_url}"><div class="list-item d-flex align-items-start"><div class="flex-grow-1"><p class="mb-0 media-heading"><strong>${notification.title}</strong><span class="msg-time float-end text-secondary">${notification.last_seen}</span></p><small class="notification-text">${notification.message.length>35?notification.message.substr(0,35)+'...':notification.message}</small></div></div></a>`);
                });
                }else{
                    $(".notifications-list").append(`<div class="text-center pb-2 pt-2">No notification found</div>`);
                }
            }
        })
    },15000);
</script>
@yield('custom_scripts')

