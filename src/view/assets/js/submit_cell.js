document.addEventListener("DOMContentLoaded", function() {
    $("body").on("contextmenu", false);


    $('.cell').on('click', function() {
        let data = $(this).data();

        set_input_data_number(data.number);
        $('#submit-cell').submit();
    });

    $('.cell').on('contextmenu', function() {
        let data = $(this).data();
        $("input[name='action']").val('demine')

        set_input_data_number(data.number);
        $('#submit-cell').submit();
    });

    $('.flag-cell').on('contextmenu', function() {
        let data = $(this).data();
        $("input[name='action']").val('demine');

        set_input_data_number(data.number);
        $('#submit-cell').submit();
    });

    $('.difficult-js').on('click', function() {
        let data = $(this).data();
        $('input[name=difficult]').val(data.value);
        if (data.submit) {
            $('#resetGameForm').submit();
        } else {
            new bootstrap.Modal($('#resetGameDif')).toggle()
                // $('#resetGameDif').toggle();
                // $('#resetGameDif').modal();
        }
    });

    function set_input_data_number(number) {
        $('input[name=number]').val(number);
    }
});