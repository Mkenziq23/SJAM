// route
var rProcessLogin = server + "auth/login/process";
var rMainApp = server + "app";
// vue object
var appLogin = new Vue({
    el: "#appLogin",
    data: {},
    methods: {
        loginAtc: function () {
            let username = document.querySelector("#txtUsername").value;
            let password = document.querySelector("#txtPassword").value;
            let ds = { username: username, password: password };
            axios
                .post("/auth/login/process", {
                    username: username,
                    password: password,
                })
                .then(function (response) {
                    let obj = response.data;
                    if (obj.status === "ACCESS_GRANTED") {
                        // Simpan token dalam cookie atau session
                        document.cookie = `api_token=${obj.token}; path=/`;
                        // Redirect ke halaman utama aplikasi
                        window.location.assign("/app");
                    } else {
                        // Tampilkan pesan kesalahan
                    }
                })
                .catch(function (error) {
                    console.error(error);
                });
        },
    },
});
// inisialisasi
document.querySelector("#txtUsername").focus();

function pesanUmumApp(icon, title, text) {
    Swal.fire({
        icon: icon,
        title: title,
        text: text,
    });
}
