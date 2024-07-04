<!-- Clients Start -->
<section class="section bg-light" id="penilaian">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="text-center mb-5">
                    <h4 class="text-uppercase mb-0">Penilaian Masyarakat</h4>
                    <p class="text-muted f-14">
                        Berikut adalah beberapa penilaian masyarakat terhadap {{ $setting->namaTahfiz }}.
                    </p>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="owl-carousel owl-theme">
                @foreach ($penilaianMasyarakat as $penilaian)
                    <div class="item">
                        <div class="testi-content text-center m-3 p-4 position-relative">
                            <div class="testi-icon"><i class="mdi mdi-format-quote-open"></i></div>
                            <img src="https://i.pravatar.cc/300" alt=""
                                class="img-fluid mx-auto d-block rounded-circle user-img">
                            <h5 class="title mb-1 mt-4">{{ $penilaian->name }}</h5>
                            <p class="text-muted mb-4 position-relative f-15">{{ $penilaian->reason }}.</p>
                            {{-- <p class="text-muted mb-2 f-15">Orang Tua Santri</p> --}}
                            <ul class="list-unstyled f-15 text-warning mb-0">
                                @for ($i = 0; $i < $penilaian->stars; $i++)
                                    <li class="list-inline-item mr-1"><i class="mdi mdi-star"></i></li>
                                @endfor
                                @for ($i = $penilaian->stars; $i < 5; $i++)
                                    <li class="list-inline-item mr-1"><i class="mdi mdi-star-outline"></i></li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                @endforeach
                <!-- owl item end -->
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="text-center mt-4">

                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ratingModal">
                    Berikan Penilaian / Ulasan Anda
                </button>
            </div>
        </div>
    </div>
</section>
<!-- Clients End -->

<!-- Rating Modal Start -->
<div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ratingModalLabel">Berikan Penilaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="ratingForm">
                    @csrf
                    <div class="form-group">
                        <label for="ratingName">Nama</label>
                        <input type="text" class="form-control" id="ratingName" name="name"
                            placeholder="Masukkan nama anda" required>
                    </div>
                    <div class="form-group">
                        <label for="ratingReason">Alasan Penilaian</label>
                        <textarea class="form-control" id="ratingReason" name="reason" rows="3" placeholder="Masukkan ulasan anda"
                            required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="ratingStars">Bintang</label>
                        <div id="ratingStars">
                            <span class="star" data-value="1"><i
                                    class="mdi mdi-star-outline fs-3 text-warning"></i></span>
                            <span class="star" data-value="2"><i
                                    class="mdi mdi-star-outline fs-3 text-warning"></i></span>
                            <span class="star" data-value="3"><i
                                    class="mdi mdi-star-outline fs-3 text-warning"></i></span>
                            <span class="star" data-value="4"><i
                                    class="mdi mdi-star-outline fs-3 text-warning"></i></span>
                            <span class="star" data-value="5"><i
                                    class="mdi mdi-star-outline fs-3 text-warning"></i></span>
                        </div>
                        <input type="hidden" id="ratingValue" name="stars" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Rating Modal End -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        // Star rating click event
        $('#ratingStars .star').on('click', function() {
            var value = $(this).data('value');
            $('#ratingValue').val(value);
            $('#ratingStars .star').each(function(index) {
                if (index < value) {
                    $(this).html('<i class="mdi mdi-star fs-3 text-warning"></i>');
                } else {
                    $(this).html('<i class="mdi mdi-star-outline fs-3 text-warning"></i>');
                }
            });
        });

        // Form submit event
        $('#ratingForm').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: '{{ route('ratings.store') }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#ratingModal').modal('hide');
                            location.reload();
                        }
                    });
                },
                error: function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred. Please try again.',
                    });
                }
            });
        });
    });
</script>
