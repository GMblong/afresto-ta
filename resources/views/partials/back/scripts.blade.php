<script src="{{ asset('theme/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('theme/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('theme/src/assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('theme/src/assets/js/app.min.js') }}"></script>
<script src="{{ asset('theme/src/assets/libs/simplebar/dist/simplebar.js') }}"></script>
<script src="{{ asset('theme/src/assets/js/dashboard.js') }}"></script>
<!-- Quill library Text Editor -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });
</script>
{{-- DataTables --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script
    src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.1/fh-3.3.2/kt-2.9.0/r-2.4.1/sc-2.1.1/sr-1.2.2/datatables.min.js">
</script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true // Tambahkan properti responsive           
        });
        $('#viewTables').on('show.bs.modal', function(event) {
            var modal = $(event.relatedTarget).data('bs-target'); // Get target modal ID
            $(modal).modal('show'); // Show the target modal
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#viewTables').DataTable({
            dom: '<"d-flex justify-content-between mb-3"Bfr>t',
            buttons: [
            {
                extend: 'excel',
                text: '<i class="far fa-file-excel"></i> Excel',
                className: 'btn btn-success me-2',
                exportOptions: {
                    columns: ':visible:not(.no-export)' // Mengabaikan kolom yang memiliki kelas .no-export
                },
            },
            {
                extend: 'print',
                text: '<i class="fas fa-file-pdf"></i>     PDF',
                className: 'btn btn-danger',
                exportOptions: {
                    columns: ':visible:not(.no-export)' // Mengabaikan kolom yang memiliki kelas .no-export
                },
                customize: function(win) {
                // Add custom styles
                $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '12px');

                    // Apply additional styles
                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css({
                            'font-size': 'inherit',
                            'font-family': 'Times New Roman, serif'
                        });
                }
            }
        ],
            responsive: true,
            language: {
                search: '<i class="fas fa-search"></i>',
                searchPlaceholder: "Cari...",
                lengthMenu: "_MENU_ data per halaman",
                paginate: {
                    first: '<i class="fas fa-angle-double-left"></i>',
                    last: '<i class="fas fa-angle-double-right"></i>',
                    previous: '<i class="fas fa-chevron-left"></i>',
                    next: '<i class="fas fa-chevron-right"></i>'
                }
            },
            columnDefs: [
                { targets: 0, orderable: false }, // Membuat kolom nomor urut tidak bisa diurutkan
                { targets: '_all', className: 'text-left' } // Mengatur seluruh kolom menjadi tengah (text-center)
            ]
        });
    });
</script>



