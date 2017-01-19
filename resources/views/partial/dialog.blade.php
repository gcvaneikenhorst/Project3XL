<script src="{{ asset('/js/modernizr.custom.js') }}"></script>
<script src="{{ asset('/js/classie.js') }}"></script>
<script src="{{ asset('/js/dialogFx.js') }}"></script>

<script>
    var dlg1, dlg2, dlg3;
    var dialogs = {};
    $(document).ready(function() {

        @foreach($items as $key => $selector)

        dialogs['{{ $key+1 }}'] = new DialogFx(document.getElementById('{{ $selector }}'));
        $('#{{ $selector }}').find('[toggle]').on('click', function() {
            dialogs['{{ $key+1 }}'].toggle();
            console.log('toggle_self');

            if($(this).attr('toggle') != '') {
                dialogs[$(this).attr('toggle')].toggle();
                console.log('toggle_to');
            }
        });

        @endforeach

        $('{{ $start_selector }}').on('click', function() {
            dialogs[1].toggle();
        });
    });
</script>