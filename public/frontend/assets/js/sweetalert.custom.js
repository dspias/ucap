$(document).ready(function(){
    // for call this aciton add a attribute in anchor line name 'confirm'
    $('a.confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        const msg = $(this).attr('confirm');
        if (typeof msg !== 'undefined' && msg !== false) {
            Swal.fire({
                title: msg,
                text: null,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#f40808',
                cancelButtonColor: '#363636',
                cancelButtonText: 'No',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            })
        } else{
            window.location.href = url;
        }
    });
});
