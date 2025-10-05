document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formPendaftaran');
    const submitBtn = form.querySelector('button[type="submit"]');
    const btnText = submitBtn.innerHTML;

    form.addEventListener('submit', function (e) {
        e.preventDefault(); // cegah reload halaman

        // Tambahkan spinner
        submitBtn.disabled = true;
        submitBtn.innerHTML = `
            <span class="spinner-border spinner-border-sm me-2" role="status"></span>
            Memproses...
        `;

        let formData = new FormData(form);

        fetch("/pendaftaran/store", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = btnText;

            if(data.success){
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: data.message,
                    confirmButtonText: 'OK'
                });
                form.reset();
                // tetap di halaman yang sama, tidak ada query string
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: data.message
                });
            }
        })
        .catch(err => {
            console.error(err);
            submitBtn.disabled = false;
            submitBtn.innerHTML = btnText;

            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Terjadi kesalahan pada server.'
            });
        });
    });
});



/* ========================================
   Penilaian / Rating
======================================== */
document.addEventListener("DOMContentLoaded", function() {
    // Star rating
    const stars = document.querySelectorAll('#ratingStars .star');
    const ratingValue = document.getElementById('ratingValue');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const value = star.dataset.value;
            ratingValue.value = value;
            stars.forEach((s, i) => {
                s.innerHTML = i < value ? '<i class="mdi mdi-star fs-3 text-warning"></i>' : '<i class="mdi mdi-star-outline fs-3 text-warning"></i>';
            });
        });
    });

    // Submit form via AJAX
    const ratingForm = document.getElementById('ratingForm');
    ratingForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        fetch('{{ route("ratings.store") }}', {
            method: 'POST',
            body: formData,
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
        })
        .then(res => res.json())
        .then(data => {
            Swal.fire({
                icon: 'success',
                title: 'Terima Kasih!',
                text: data.message || 'Penilaian berhasil dikirim!'
            }).then(() => location.reload());
        })
        .catch(err => {
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: 'Terjadi kesalahan. Silahkan coba lagi.'
            });
        });
    });
});