<script>
    let timerInterval;
    Swal.fire({
        title: "{{ $title }}",
        icon: "{{ $icon }}",
        html: "{!! $message !!}",
        showConfirmButton: false,
        allowOutsideClick: false,
        allowEscapeKey: false,
        timer: 2000,
        timerProgressBar: false,
        // didOpen: () => {
        //     // Swal.showLoading();
        //     const timer = Swal.getPopup().querySelector("b");
        //     timerInterval = setInterval(() => {
        //         timer.textContent = `${Swal.getTimerLeft()}`;
        //     }, 100);
        // },
        willClose: () => {
            clearInterval(timerInterval);
        }
    }).then((result) => {

    });
</script>
