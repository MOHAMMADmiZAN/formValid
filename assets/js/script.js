
/*
$('.confirmDelete').click(
    function () {
        let id = $(this).attr('data-id');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Your Data has been deleted!", {
                        icon: "success",
                    });
                    setTimeout(function () {
                        window.location.href = "userDelete.php?deletedId=" + id;
                    },1500)
                } else {
                    swal("Your Data Will be safe!");
                }
            });
    }
)*/
