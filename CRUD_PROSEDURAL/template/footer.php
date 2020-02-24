</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    $(() => {

        $(".custom-file-input ").on('change', function() {
            const filename = $(this).val().split('\\').pop();
            $(this).siblings().addClass('selected').html(filename);
        });
    });
</script>