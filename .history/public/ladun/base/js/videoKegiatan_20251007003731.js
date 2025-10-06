var rProsesTambahVideoKegiatan = server + "app/video-kegiatan/tambah";
var rProsesEditVideoKegiatan = server + "app/video-kegiatan/edit";
var rProsesHapusVideoKegiatan = server + "app/video-kegiatan/hapus";

var appKegiatan = new Vue({
    el: "#divVideoKegiatan",
    data: {
        editId: null,
    },
    methods: {
        tambahVideoKegiatanAtc() {
            $("#divDataVideoKegiatan").hide();
            $("#divTambahVideoKegiatan").show();
            document.querySelector("#txtNamaKegiatan").focus();
        },
        editVideoKegiatanAtc(id) {
            axios.get(`${server}app/video-kegiatan/${id}`).then(res => {
                const data = res.data;
                this.editId = id;
                $("#divDataVideoKegiatan").hide();
                $("#divEditVideoKegiatan").show();

                $("#txtEditNamaKegiatan").val(data.nama_kegiatan);
                $("#txtEditTanggalKegiatan").val(data.tanggal_kegiatan);
                $("#txtEditTempatKegiatan").val(data.tempat_kegiatan);
                $("#txtEditLinkVideo").val(data.link_video);
                $("#imgEditThumbnail").attr("src", `${server}storage/${data.image}`);
                updateEditVideoPreview();
            });
        },
        kembaliAtc() {
            $("#divTambahVideoKegiatan").hide();
            $("#divEditVideoKegiatan").hide();
            $("#divDataVideoKegiatan").show();
        },
        prosesTambahKegiatanAtc() {
            let formData = new FormData();
            formData.append("nama", $("#txtNamaKegiatan").val());
            formData.append("tgl", $("#txtTanggalKegiatan").val());
            formData.append("tempat", $("#txtTempatKegiatan").val());
            formData.append("linkVideo", $("#txtLinkVideo").val());
            let file = $("#txtThumbnailVideoKegiatan")[0].files[0];
            if(file) formData.append("image", file);

            axios.post(rProsesTambahVideoKegiatan, formData, { headers:{'Content-Type':'multipart/form-data'} })
                .then(res => { pesanUmumApp("success","Sukses",res.data.message); load_page(rVideoKegiatan,"Video Kegiatan"); })
                .catch(err => { pesanUmumApp("error","Error", err.response.data.message); });
        },
        prosesEditKegiatanAtc() {
            let formData = new FormData();
            formData.append("id", this.editId);
            formData.append("nama", $("#txtEditNamaKegiatan").val());
            formData.append("tgl", $("#txtEditTanggalKegiatan").val());
            formData.append("tempat", $("#txtEditTempatKegiatan").val());
            formData.append("linkVideo", $("#txtEditLinkVideo").val());
            let file = $("#txtEditThumbnailVideoKegiatan")[0].files[0];
            if(file) formData.append("image", file);

            axios.post(rProsesEditVideoKegiatan, formData, { headers:{'Content-Type':'multipart/form-data'} })
                .then(res => { pesanUmumApp("success","Sukses",res.data.message); load_page(rVideoKegiatan,"Video Kegiatan"); })
                .catch(err => { pesanUmumApp("error","Error", err.response.data.message); });
        },
        hapusAtc(id) {
            confirmQuest("warning","Konfirmasi","Hapus data video kegiatan?",function(){
                axios.post(rProsesHapusVideoKegiatan,{id:id}).then(res=>{
                    pesanUmumApp("success","Sukses","Berhasil menghapus data video kegiatan");
                    load_page(rVideoKegiatan,"Video Kegiatan");
                });
            });
        }
    }
});

function previewImage() {
    const file = document.querySelector("#txtThumbnailVideoKegiatan").files[0];
    const preview = document.querySelector("#videoThumbnailPreview");
    if(file){
        const reader = new FileReader();
        reader.onloadend = () => preview.src = reader.result;
        reader.readAsDataURL(file);
    } else preview.src = "";
}

function updateVideoPreview() {
    const url = $("#txtLinkVideo").val();
    const iframe = document.getElementById("youtubeIframe");
    const videoPreview = document.getElementById("videoPreview");
    const id = extractYouTubeVideoID(url);
    if(id){ iframe.src=`https://www.youtube.com/embed/${id}`; videoPreview.style.display="block"; }
    else videoPreview.style.display="none";
}

function extractYouTubeVideoID(url){
    const regex = /(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))([\w-]{11})/;
    const match = url.match(regex);
    return match ? match[1] : null;
}


function updateEditVideoPreview() {
    const url = $("#txtEditLinkVideo").val();
    const iframe = document.getElementById("editYoutubeIframe");
    const videoPreview = document.getElementById("editVideoPreview");
    const id = extractYouTubeVideoID(url);
    if(id){ iframe.src=`https://www.youtube.com/embed/${id}`; videoPreview.style.display="block"; }
    else videoPreview.style.display="none";
}
