$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.btn-info').click(function() {
        if($(this).children('i').attr('id') == 'not-playing'){
            pause();
            stop($(this));
        } else {
            pause();
            play($(this));
        }
    });

    $('#close-sidebar').click(function() {
        close_sidebar();
    });

    $('#edit_audio').click(function(){
        let f = {
            id: $('#audio_id').val(),
            tagname: $('#etagname').val(),
            content: $('#eaudio_content').val(),
            category: $('#ecategory').val()
        };

        if(f.tagname == "" && f.content == ""){
            alert('Fields cannot be empty.');
            return false;
        }

        let form = new FormData();
        form.append('id', f.id);
        form.append('tagname', f.tagname);
        form.append('content', f.content);
        form.append('category', f.category);
        
        update(form);
    });

    function update(form){
        $.ajax({
            url: "/update",
            type: 'POST',
            data: form,
            processData: false, 
            contentType: false,
            success: function(result){
                location.reload();
            }
        });
    }

    function stop(element) {
        element.children('i').removeClass().addClass('fa fa-play').attr('id', 'playing');
        close_sidebar();
    }

    function pause() {
        $('.btn-info').each(function(){
            stop($(this))
        });
    }

    function play(element) {
        element.children('i').removeClass().addClass('fa fa-pause').attr('id', 'not-playing');
        $('.sidenav').css('width', '350px');
        selected(element);
    }

    function selected(element) {
        var x = JSON.parse(element.attr('data-info'));
        $('#now_playing').html(`Tag Name: ${x.tagname}<br>Content: ${x.content}<br>File: ${x.filename}`);
        $('#eaudio_content').val(x.content);
        $('#etagname').val(x.content);
        $('#ecategory').append(`<option value="${x.cat_id}" selected>${x.cat_id}</option>`);
        $('#audio_id').val(x.id);
    }

    function close_sidebar(){
        $('.sidenav').css('width', '0px');
    }
});