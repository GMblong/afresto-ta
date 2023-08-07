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
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script
    src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.1/fh-3.3.2/kt-2.9.0/r-2.4.1/sc-2.1.1/sr-1.2.2/datatables.min.js">
</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#viewTables').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'pdf', 'excel', 'print'
            ]
        });
    });
</script>

