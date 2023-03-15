let data = "";

$("#editBtn").click(function (e) {
    e.preventDefault();

    let str = {
        nickname: $("#editForm #nickname").val(),
        email: $("#editForm #email").val(),
        password: $("#editForm #password").val(),
        newPassword: $("#editForm #newPassword").val(),
    };

    let avatar = document.getElementById("avatar").files[0];
    let banner = document.getElementById("banner").files[0];

    if (avatar !== undefined && banner !== undefined) {
        let fileType = avatar["type"];
        let validImageTypes = ["image/jpeg", "image/png"];

        if ($.inArray(fileType, validImageTypes) < 0) {
            console.log("Le fichier joint n'est pas de type jpeg ou png");
            return;
        }

        let firstReader = new FileReader();

        firstReader.readAsDataURL(avatar);
        firstReader.addEventListener("load", () => {
            avatarData = firstReader.result;

            let fileType = banner["type"];
            let validImageTypes = ["image/jpeg", "image/png"];

            if ($.inArray(fileType, validImageTypes) < 0) {
                console.log("Le fichier joint n'est pas de type jpeg ou png");
                return;
            }

            let reader = new FileReader();

            reader.readAsDataURL(banner);
            reader.addEventListener("load", () => {
                bannerData = reader.result;

                data = { str, avatar: avatarData, banner: bannerData };
                myAjax(data);
            });
        });
    } else if (banner !== undefined) {
        let fileType = banner["type"];
        let validImageTypes = ["image/jpeg", "image/png"];

        if ($.inArray(fileType, validImageTypes) < 0) {
            console.log("Le fichier joint n'est pas de type jpeg ou png");
            return;
        }

        let reader = new FileReader();

        reader.readAsDataURL(banner);
        reader.addEventListener("load", () => {
            data = { str, banner: reader.result };
            myAjax(data);
        });
    } else if (avatar !== undefined) {
        let fileType = avatar["type"];
        let validImageTypes = ["image/jpeg", "image/png"];

        if ($.inArray(fileType, validImageTypes) < 0) {
            console.log("Le fichier joint n'est pas de type jpeg ou png");
            return;
        }

        let reader = new FileReader();

        reader.readAsDataURL(avatar);
        reader.addEventListener("load", () => {
            data = { str, avatar: reader.result };
            myAjax(data);
        });
    } else {
        data = str;
        myAjax(data);
    }
});

function myAjax(data) {
    $.ajax({
        type: "post",
        url: "./AJAX/php/do.editUser.php",
        data: data,
        success: function (data) {
            location.reload();
            console.log(data);
        },
    });
}
