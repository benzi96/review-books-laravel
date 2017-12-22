<script src="//code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
<script src="{{ url('js/medium-editor.js') }}"></script>
<script src="{{ url('js/medium-editor-insert.js') }}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script type="text/javascript">
    // initializing editors
var titleEditor = new MediumEditor('.title-editable', {
    buttonLabels: 'fontawesome'
});
var bodyEditor = new MediumEditor('.body-editable', {
    buttonLabels: 'fontawesome'
});
var imageEditor = new MediumEditor('.image-editable', {
    buttonLabels: 'fontawesome',
    placeholder: ''
});
$(function () {
    $('.body-editable').mediumInsert({
        editor: bodyEditor,
        images: true,
        imagesUploadScript: "{{ URL::to('upload') }}"
    });
    if ($('#hideEditor').length) {
        $('.body-editable').mediumInsert('disable');
        bodyEditor.deactivate();
        titleEditor.deactivate();
        imageEditor.deactivate();
    }
});
$(function () {
    $('.image-editable').mediumInsert({
        editor: imageEditor,
        images: true,
        imagesUploadScript: "{{ URL::to('upload') }}"
    });
    if ($('#hideEditor').length) {
        $('.image-editable').mediumInsert('disable');
        bodyEditor.deactivate();
        titleEditor.deactivate();
        imageEditor.deactivate();
    }
});
// hiding messages
$('.error').hide().empty();
$('.success').hide().empty();


// create post
$('body').on('click', '#form-submit', function(e){
    e.preventDefault();
    var postTitle = titleEditor.serialize();
    var postContent = bodyEditor.serialize();
    var postImage = imageEditor.serialize();
    var imagediv = postImage['post-image']['value'];
    var urls = "<?php echo action('PostsController@store'); ?>";
    var imagepost = $(imagediv).find("img").attr("src");
        
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url : urls,
        data: { title: postTitle['post-title']['value'], body: postContent['post-body']['value'],image: imagepost },
        success: function(data) {
            if(data.success === false)
            {
                $('.error').append(data.message);
                $('.error').show();
            } else {
                $('.success').append(data.message);
                $('.success').show();
                setTimeout(function() {
                    window.location.href = "<?php echo action('PostsController@index'); ?>";
                }, 2000);
            }
        },
        error: function(xhr, textStatus, thrownError) {
            alert('Bị lỗi...');
        }
    });
    return false;
});

// update post
$('body').on('click', '#form-update', function(e){
    e.preventDefault();
    var postTitle = titleEditor.serialize();
    var postContent = bodyEditor.serialize();
    var postImage = imageEditor.serialize();
    var imagediv = postImage['post-image']['value'];
    var imagepost = $(imagediv).find("img").attr("src");
    $.ajax({
        type: 'PUT',
        dataType: 'json',
        url : "{{ action('PostsController@update', array(Request::segment(3))) }}",
        data: { title: postTitle['post-title']['value'], body: postContent['post-body']['value'], image: imagepost },
        success: function(data) {
            if(data.success === false)
            {
                $('.error').append(data.message);
                $('.error').show();
            } else {
                $('.success').append(data.message);
                $('.success').show();
                setTimeout(function() {
                    window.location.href = "{{ action('PostsController@index') }}";
                }, 2000);
            }
        },
        error: function(xhr, textStatus, thrownError) {
            alert('Bị lỗi...');
        }
    });
    return false;
});
</script>