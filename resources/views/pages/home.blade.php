<x-html title="Home" class="bg-body-tertiary">
    <x-slot name="head">
        {{--        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">--}}
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap"
              rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    </x-slot>
    <div class="container">
        @include('partials.box')
    </div>
    {{--    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>--}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        $('.editor_wrap').on('submit', function () {
            $.ajax({
                url: '/api/message/store',
                method: 'POST',
                data: {
                    user_id: '{{ $_COOKIE['guest_token'] }}',
                    message: $('#text_input').val()
                },
                success: function (data) {
                    $('#history').append(
                        '<dl class="msg-tile type-t role_v">' +
                        '<dt class="tile-avatar"></dt>' +
                        '<dd class="tile-body">' +
                        '<div class="tile-bubble">' +
                        '<div class="tile-txt tile-original">' + data.message + '</div><i class=""></i></div>' +
                        '<div class="tile-time">' + Date.now() + '</div>' +
                        '</dd>' +
                        '</dl>'
                    );
                }
            });

            return false;
        });

        $(window).on('load', function () {
            $.ajax({
                url: '/api/message/fetch/guest',
                method: 'POST',
                data: {
                    user_id: '{{ $_COOKIE['guest_token'] }}'
                },
                success: function (data) {
                    $.each(data.message.concat(data.created_at), function (index, value) {
                        $('#history').append(
                            '<dl class="msg-tile type-t role_v">' +
                            '<dt class="tile-avatar"></dt>' +
                            '<dd class="tile-body">' +
                            '<div class="tile-bubble">' +
                            '<div class="tile-txt tile-original">' + value.message + '</div><i class=""></i></div>' +
                            '<div class="tile-time">' + value.created_at + '</div>' +
                            '</dd>' +
                            '</dl>'
                        );
                    });
                }
            });

            return false;
        });

    </script>
</x-html>
