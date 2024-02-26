</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y') }} </strong>
    All rights reserved.
</footer>
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
<x-js-components />
<script>
    $(document).ready(function() {
        $('#project_type').on('change', function() {
            var type = $(this).val();
            if (type === "Vertical Type") {
                $('#for-length').removeClass('d-none')
                $('#budget').removeClass('d-none')
                $('#for-storey').addClass('d-none')
                $('#selected_category_val')
                    .empty()
                    .append('<option value="Kalsada">Kalsada</option>')
                    .append('<option value="Highway">Highway</option>')
                    .append('<option value="Bridge">Bridge</option>');
            } else {
                $('#budget').removeClass('d-none')
                $('#for-length').addClass('d-none')
                $('#for-storey').removeClass('d-none')
                $('#selected_category_val')
                    .empty()
                    .append('<option value="House">House</option>')
                    .append('<option value="Condominium">Condominium</option>')
                    .append('<option value="Apartment">Apartment</option>')
                    .append('<option value="Government Facilities">Government Facilities</option>');

                var maxStoreys = 100;

                $('#storey-dropdown').empty();

                for (var i = 1; i <= maxStoreys; i++) {
                    var optionText = i + ' Storey';
                    var optionValue = 'Storey ' + i;

                    $('#storey-dropdown').append('<option value="' + optionValue + '">' + optionText +
                        '</option>');
                }

            }
        });

        $('#projectMembersSelect').select2({
            placeholder: 'Select project members',
            width: "100%"
        });
        $('.summernote').summernote({
            height: 150,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript',
                    'subscript', 'clear'
                ]],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ol', 'ul', 'paragraph', 'height']],
                ['table', ['table']],
                ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
            ]
        })
        // var map = L.map('map', {
        //     zoomControl: false
        // }).setView([12.8797, 121.7740], 6);

        // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     attribution: '© OpenStreetMap contributors'
        // }).addTo(map);

        // var marker;
        // map.on('click', function(e) {
        //     document.getElementById('latitude').value = e.latlng.lat.toFixed(6);
        //     document.getElementById('longitude').value = e.latlng.lng.toFixed(6);
        //     if (marker) {
        //         map.removeLayer(marker);
        //     }

        //     marker = L.marker(e.latlng).addTo(map);
        // });


    });
</script>

@if (session('showModaladd'))
    <script>
        $(document).ready(function() {
            $('#addNewTask').modal('show');
        });
    </script>
@endif

</body>

</html>
